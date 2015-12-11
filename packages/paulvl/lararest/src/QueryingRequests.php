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

        $queryBuilder = new $modelClass;

        if( count($parameters = $request->all()) > 0 )
        {
            $handledRequestParameters = $this->handleRequestParameters($parameters);

            if( isset($handledRequestParameters['queries']) )
            {
                foreach($handledRequestParameters['queries'] as $query)
                {
                    $queryBuilder = $this->handleQuery($queryBuilder, $query);
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

                    return $queryBuilder = $queryBuilder->paginate($handledRequestParameters['pagination']['paginate'])->setPath( $this->getUrlParameters($request) );
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

        $queryParametersNumber = count($queryArray);

        if($queryParametersNumber >= 1)
        {
            $firstQueryParameter = strtolower( $queryArray[0] );

            if($queryParametersNumber == 1)
            {
                switch($firstQueryParameter)
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

            if($queryParametersNumber == 2)
            {
                switch($firstQueryParameter)
                {
                    case in_array($firstQueryParameter, ['=', '<', '>', '<=', '>=', '<>', 'like']):
                        return $queryBuilder->where($queryColumn, $firstQueryParameter, $queryArray[1]);
                        break;
                    case "notnull":
                        return $queryBuilder->whereNotNull($queryColumn);
                        break;
                }
            }

            if($queryParametersNumber == 3)
            {
                switch($firstQueryParameter)
                {
                    case 'between':
                        return $queryBuilder->whereBetween($queryColumn, $firstQueryParameter, [$queryArray[1],$queryArray[2]]);
                        break;
                    case "notbetween":
                        return $queryBuilder->whereNotBetween($queryColumn, $firstQueryParameter, [$queryArray[1],$queryArray[2]]);
                        break;
                }
            }

            if( in_array($firstQueryParameter, ['in', 'notin']) )
            {
                $inOrNotInArray = $queryArray;
                unset( $inOrNotInArray[0] );

                switch($firstQueryParameter)
                {
                    case 'in':
                        return $queryBuilder->whereIn($queryColumn, $firstQueryParameter, $inOrNotInArray);
                        break;
                    case "notin":
                        return $queryBuilder->whereNotIn($queryColumn, $firstQueryParameter, $inOrNotInArray);
                        break;
                }
            }
        }

        return $queryBuilder;
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

    protected function getUrlParameters(Request $request)
    {
       return $this->remove_page_parameter( $this->getFullUrl(), $request );
    }

    protected function remove_page_parameter($url, Request $request)
    {
        if( $request->has("page") )
        {
            $page = $request->get("page");

            $pageStrings= [
                "?page=" . $page,
                "?page=" . $page . ",",
                "&page=" . $page,
                "&page=" . $page . ","
            ];

            foreach($pageStrings as $pageString) {
                $url = str_replace($pageString, "", $url);
            }
        }

        return $url;
    }

    protected function getFullUrl()
    {
        return url().$_SERVER['REQUEST_URI'];
    }

    protected function buildPaginationUrl(array $paginate, Request $request)
    {
        if( $paginate["current_page"] > 0 )
        {
            $currentPage = $paginate["current_page"];
            $lastPage = $paginate["last_page"];

            $previousUrl = $currentPage == 1 ? null : $this->getUrlParameters($request) . "?page= " . ($currentPage - 1) ;
            $paginate["prev_page_url"] = $previousUrl;

            $nextUrl = ($currentPage + 1) >= $lastPage ? null : $this->getUrlParameters($request) . "?page= " . ($currentPage + 1) ;
            $paginate["next_page_url"] = $nextUrl;
        }

        return $paginate;
    }

}