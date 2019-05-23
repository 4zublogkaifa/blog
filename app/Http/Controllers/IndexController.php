<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    /*
     * @content 前台首页
     *
     * */
    public function index()
    {
        return view('index/index');
    }
}
