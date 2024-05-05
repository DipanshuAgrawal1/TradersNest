<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Products extends Controller
{
    public function getAllProducts(Request $request){
        $data = DB::table('products')->get()->toArray();
        if(empty($data)){
            return response()->json([
                'message' => 'No products available in your database'
            ]);
        }
        return $data;
    }

}

