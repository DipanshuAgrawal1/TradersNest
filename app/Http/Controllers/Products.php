<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Products extends Controller
{
    public function getAllProducts(Request $request){
        $data = DB::table('products')->get();
        return $data;
    }
}
