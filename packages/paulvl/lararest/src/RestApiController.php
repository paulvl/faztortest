<?php

namespace LaraRest;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Routing\Controller as IlluminateController;
use Illuminate\Support\Collection;
use Roids\Database\Eloquent\Model;

abstract class RestApiController extends IlluminateController
{
    use ValidateRequests, QueryingRequests;

    protected $model;
    protected $creationRules;
    protected $updateRules;

    public function getIndex(Request $request, $id = null)
    {
        if( method_exists($this,'index') )
        {
            return $this->index($request, $id);
        }

        $responseData = array();

        if( is_null($id) )
        {
            $queryResult = $this->validateQuery($request, $this->model);
        }
        else {
            $modelClass = $this->model;
            $queryResult = $modelClass::where($modelClass::getPrimaryKeyName(), $id)->first();

            if($queryResult instanceof Model) {
                $queryResult = $queryResult->toArray();
            }
            else {
                $queryResult = null;
            }

            $responseData = ["data" => $queryResult];

            if( is_null($queryResult) )
            {
                $responseData = $this->setMessage($responseData, $this->getIndexMessage404());
                return responseJsonNotFound($responseData);
            }else{
                $responseData = $this->setMessage($responseData, $this->getIndexMessage200());
                return responseJsonOk($responseData);
            }
        }

        if($queryResult instanceof Collection ) {
            $responseData = ["data" => $queryResult->toArray()];
        }

        if($queryResult instanceof LengthAwarePaginator ) {
            $responseData = $queryResult->toArray();
            $responseData = $this->buildPaginationUrl($responseData, $request);
        }

        if( count( $responseData['data'] ) < 1 )
        {
            $responseData['data'] = null;
            $responseData = $this->setMessage($responseData, $this->getIndexMessage404());
        }
        else {
            $responseData = $this->setMessage($responseData, $this->getIndexMessage200());
        }

        return responseJsonOk($responseData);
    }

    public function postIndex(Request $request)
    {
        if( method_exists($this,'store') )
        {
            return $this->store($request);
        }
    }

    public function putIndex(Request $request, $id)
    {
        if( method_exists($this,'update') )
        {
            return $this->update($request, $id);
        }
    }

    public function deleteIndex($id)
    {
        if( method_exists($this,'destroy') )
        {
            return $this->destroy($id);
        }
    }

    protected function setMessage($response, $message)
    {
        return array_merge(['message' => $message], $response);
    }

    protected function getIndexMessage200()
    {
        return isset($this->indexMessage200) ? $this->indexMessage200 : 'All records has been found successfully';
    }

    protected function getIndexMessage404()
    {
        return isset($this->indexMessage404) ? $this->indexMessage404 : 'Record not found';
    }

    protected function getCreateMessage200()
    {
        return isset($this->createMessage200) ? $this->createMessage200 : 'Record created successfully';
    }

    protected function getCreateMessage404()
    {
        return isset($this->createMessage404) ? $this->createMessage404 : 'Record cannot be created';
    }
}