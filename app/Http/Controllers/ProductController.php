<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryModel;
use App\Models\SubCategoryModel;



class ProductController extends Controller
{
    public function getCategory($slug, $subslug = '')
    {

        $getCatagory= CategoryModel::getSingleSlug($slug);
        $getSubCatagory= SubCategoryModel::getSingleSlug($subslug);

        if(!empty($getCategory) && !empty($getSubCategory))
        {
            $data['getSubCatagory']= $getSubCatagory;
            $data['getCatagory']= $getCatagory;
            return view('product.list',$data);
        }
        else if(!empty($getCategory))
        {
            $data['getCatagory']= $getCatagory;
            return view('product.list',$data);
        }

        else 
        {
            abort(404);
        }
    }
}
