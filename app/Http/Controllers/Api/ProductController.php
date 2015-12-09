<?php

namespace Faztor\Http\Controllers\Api;

use Faztor\OrderState;
use Faztor\Product;
use Illuminate\Http\Request;

//use Faztor\Http\Requests;
//use Faztor\Http\Controllers\Controller;
use LaraRest\RestApiController as Controller;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->model = OrderState::class;
        //$this->model = Product::class;
    }

    /*
    public function getIndex($id = null)
    {
        return 'GET ' . $id;
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
    */
}
