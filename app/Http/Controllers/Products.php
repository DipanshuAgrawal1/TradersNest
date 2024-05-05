<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Products extends Controller
{
    public function getAllProducts(Request $request){
        $limit = isset($request['limit']) ? $request['limit'] : 20;
        $data = DB::table('products')->select('*')
                                     ->limit($limit)
                                     ->get()
                                     ->toArray();
        if(empty($data)){
            return response()->json([
                'message' => 'No products available in your database'
            ],500);
        }
        return $data;
    }
    public function getProductByName(Request $request){
        $limit = isset($request['limit']) ? $request['limit'] : 20;
        $name = $request->input('product_name');
        $data = DB::table('products')->where("name","like","%$name%")
                                     ->limit($limit)
                                     ->get()
                                     ->toArray();
        if(empty($data)){
            return response()->json([
                'message' => 'No product found with the given name'
            ],500);
        }
        return $data;
    }
    public  function getById(Request $request){
        $limit = isset($request['limit']) ? $request['limit'] : 20;
        $id = (int)$request->input('id');
        $data = DB::table('products')->where('id',$id)
                                     ->limit($limit)
                                     ->get()
                                     ->toArray();
        if(empty($data)){
             return response()->json([
                'message' => 'No product found with the given id'
            ],500);
        }
        return response()->json($data,200);
    }
    public function getProductByPrice(Request $request){
        $limit = isset($request['limit']) ? $request['limit'] : 20;
        $sort = $request->input('sort') ?? 'desc';
        $data = DB::table('products')->orderBy('price',$sort)->limit($limit)->get()->toArray();
        if(empty($data)){
             return response()->json([
                'message' => 'No products available in database'
            ],500);
        }
        return response()->json($data,200);
    }
    public function getProductsByCategory(Request $request){
         $limit = isset($request['limit']) ? $request['limit'] : 20;
         if(!isset($request['category'])) {
            return response()->json([
                'message' => 'No category provided'
            ],500);
         }
        $category = $request['category'];
        $data = DB::table('products')->where('category_id',$category)
                                    ->limit($limit)
                                    ->get()
                                    ->toArray();
        if(empty($data)){
             return response()->json([
                'message' => 'No products available in database for the given category'
            ],500);
        }
        return response()->json($data,200);

    }

}

