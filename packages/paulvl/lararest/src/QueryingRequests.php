<?php

namespace LaraRest;

use Illuminate\Http\Request;

trait QueryingRequests
{
    public function validateQuery(Request $request, $modelClass)
    {
        if( count($parameters = $request->all()) > 0 )
        {
            $handledRequestParameters = $this->handleRequestParameters($parameters);

            foreach($handledRequestParameters['queries'] as $query)
            {

            }

            return 'aa';
        }

        $re = $modelClass::paginate(2);
        $re->setPath('custom/url');
        return $re;
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

        $queries = null;

        foreach($requestParameters as $key => $value)
        {
            $validatedQueryParameter = $this->validateQueryParameter($key, $value);

            if(! is_null($validatedQueryParameter) )
                array_push($queries, $validatedQueryParameter);
        }

        $queryParameters['queries'] = $queries;

        return $queryParameters;
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

    protected function validateQueryParameter($key, $value)
    {
        $explodedValue = explode(',', $value);
        $validatedParameter = null;

        switch( count($explodedValue) )
        {
            case 1:
                $explodedValue = $explodedValue;
                break;
            case 2:
                $explodedValue = $this->isLogicalOperator($explodedValue[0]) ? $explodedValue : null;
                break;
            case 3:
                $explodedValue = null;
                break;
            case 4:
                $explodedValue = $this->isLogicalOperator($explodedValue[0]) && $this->isLogicalOperator($explodedValue[2]) ? $explodedValue : null;
                break;
            default:
                $explodedValue = null;
                break;
        }

        if(! is_null($explodedValue) )
        {
            $validatedParameter = [
                'column'    => $key,
                'query'     => $explodedValue
            ];
        }

        return $validatedParameter;
    }

    protected function isLogicalOperator($value)
    {
        return in_array($value, ['<','>','<=','>=']);
    }

}