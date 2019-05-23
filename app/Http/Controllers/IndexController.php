<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Title;
class IndexController extends Controller
{
    /*
     * @content 前台首页
     *
     * */
    public function index()
    {
        $data = Title::get();
        return view('index/index',['data'=>$data]);
    }
    
    /*
     * @content 文章详情
     * 
     * */
    public function details()
    {
        return view('index/details');
    }
}
