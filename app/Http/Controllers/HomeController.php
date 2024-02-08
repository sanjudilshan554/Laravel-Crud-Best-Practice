<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('pagers.home.index');
    }

    public function relate(){
       // $response['Products']=product::get();
        $response['categories']=category::get();
        return view('pagers.relationship.relation')->with($response);
    }
}
