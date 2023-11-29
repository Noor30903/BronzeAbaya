<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryModel;


class ProductController extends Controller
{
    public function getCategory($slug)
    {
        $getCatagory= CategoryModel::getSingleSlug($slug);
        if(!empty($getCatagory)){
            $data['getCatagory']= $getCatagory;
            return view('product.list',$data);

        }
        else 
        {
            abort(404);
        }
    }
}
