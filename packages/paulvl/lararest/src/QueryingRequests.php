<?php

namespace LaraRest;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

trait QueryingRequests
{
    public function validateQuery(Request $request)
    {
        $modelClass = $this->model;

        //$queryBuilder = DB::table( $modelClass::getTableName() );
        $queryBuilder = new $modelClass;

        if( count($parameters = $request->all()) > 0 )
        {
            $handledRequestParameters = $this->handleRequestParameters($parameters);

            if( isset($handledRequestParameters['queries']) )
            {
                foreach($handledRequestParameters['queries'] as $query)
                {

                }
            }

            if( isset($handledRequestParameters['take']) ) {
                $queryBuilder = $queryBuilder->take($handledRequestParameters['take']);
            }
            else {
                if( isset($handledRequestParameters['pagination']) ) {
                    $currentPage = $handledRequestParameters['pagination']['page'];

                    Paginator::currentPageResolver(function() use ($currentPage) {
                        return $currentPage;
                    });

                    return $queryBuilder = $queryBuilder->paginate($handledRequestParameters['pagination']['paginate']);
                }
            }

        }

        return $queryBuilder->get();
    }

    protected function handleRequestParameters(array $requestParameters)
    {
        $queryParameters = array();

        if( isset($requestParameters['paginate']) )
        {
            $paginateValue = $requestParameters['paginate'];
            $pageValue = isset($requestParameters['page']) ? $requestParameters['page']: $requestParameters['page'] = 1;
            $paginateIntValue = $this->validateInteger($paginateValue);
            $pageIntValue = $this->validateInteger($pageValue);

            if(! is_null($paginateIntValue) && ! is_null($pageIntValue) )
            {
                $queryParameters['pagination'] = [
                    'paginate' => $paginateIntValue,
                    'page' => $pageIntValue
                ];
            }

            unset($requestParameters['paginate']);
            unset($requestParameters['page']);
        }

        if( isset($requestParameters['take']) )
        {
            $takeIntValue = $this->validateInteger($requestParameters['take']);

            if(! is_null($takeIntValue) )
            {
                $queryParameters['take'] = $takeIntValue;
                if( isset($queryParameters['pagination']) )
                    unset($queryParameters['pagination']);
            }

            unset($requestParameters['take']);
        }

        $requestParameters = $this->validateQueryColumnExistence($requestParameters);

        $queries = array();

        foreach($requestParameters as $key => $value)
        {
            $validatedQueryParameter = $this->getQueryParameters($key, $value);

            if(is_array($validatedQueryParameter) )
                array_push($queries, $validatedQueryParameter);
        }

        if( emptyArray($queries) )
            $queryParameters['queries'] = $queries;

        return $queryParameters;
    }

    protected function handleQuery($queryBuilder, $query)
    {
        $queryColumn = $query['column'];
        $queryArray = $query['query'];

        $queryParamentersNumber = count($queryArray);

        if($queryParamentersNumber == 1)
        {
            switch($queryArray[0])
            {
                case "null":
                    return $queryBuilder->whereNull($queryColumn);
                    break;
                case "notnull":
                    return $queryBuilder->whereNotNull($queryColumn);
                    break;
                default:
                    return $queryBuilder->where($queryColumn, $queryArray[0]);
                    break;
            }
        }

        if($queryParamentersNumber == 2)
        {
            switch($queryArray[0])
            {
                case in_array($queryArray[0], ['=', '<', '>', '<=', '>=', '<>', 'like']):
                    return $queryBuilder->where($queryColumn, $queryArray[0], $queryArray[1]);
                    break;
                case "notnull":
                    return $queryBuilder->whereNotNull($queryColumn);
                    break;
                default:
                    return $queryBuilder->where($queryColumn, $queryArray[0]);
                    break;
            }
        }
    }

    protected function validateInteger($value)
    {
        if($value == 0)
            return 0;

        $intValue = intval($value);

        if($intValue === 0) {
            return null;
        }
        else {
            return $intValue;
        }

    }

    protected function getQueryParameters($key, $value)
    {
        $explodedValue = explode(',', $value);

        return [
            'column'    => $key,
            'query'     => $explodedValue
        ];
    }

    protected function validateQueryColumnExistence(array $requestParameters)
    {
        $modelClass = $this->model;

        $tableColumns = $modelClass::getTableColumnNames();

        foreach($requestParameters as $requestParameter => $value)
        {
            if(! in_array($requestParameter, $tableColumns) )
                unset($requestParameters[$requestParameter]);
        }

        return $requestParameters;
    }

    protected function isSqlOperator($value)
    {
        return in_array($value, ['=', '<', '>', '<=', '>=', '<>', 'like', "in", "notin", "between", "notbetween", "null", "notnull"]);
    }

}