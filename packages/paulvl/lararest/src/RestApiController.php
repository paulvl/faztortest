<?php

namespace LaraRest;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as IlluminateController;
use Illuminate\Support\Collection;

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

            if($queryResult instanceof Collection )
                return $queryResult->toArray();

            return $queryResult;
        }

        return "solo un recurso";

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