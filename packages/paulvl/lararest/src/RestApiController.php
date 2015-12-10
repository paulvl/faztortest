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
                $queryResult = array();
            }

            $queryResult = ["data" => $queryResult];
        }

        if($queryResult instanceof Collection ) {
            $queryResult = ["data" => $queryResult->toArray()];
        }

        if($queryResult instanceof LengthAwarePaginator ) {
            $queryResult = $queryResult->toArray();
        }

        return $queryResult;

    }

    public function postIndex(Request $request)
    {
        //
    }

    public function putIndex(Request $request, $id)
    {
        //
    }

    public function deleteIndex($id)
    {
        //
    }
}