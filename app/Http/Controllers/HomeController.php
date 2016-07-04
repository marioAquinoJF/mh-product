<?php

namespace Satelite\Http\Controllers;

use Illuminate\Http\Request;
use Satelite\Http\Requests;
use Satelite\Entities\Products\Product;

class HomeController extends Controller
{
    public function index()
    {
        var_dump(new Product());
        return view("welcome");
    }
}
