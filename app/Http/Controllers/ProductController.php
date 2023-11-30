<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryModel;
use App\Models\SubCategoryModel;
use App\Models\ProductModel;



class ProductController extends Controller
{
    public function getCategory($slug, $subslug = '')
    {

        $getCatagory= CategoryModel::getSingleSlug($slug);
        $getSubCatagory= SubCategoryModel::getSingleSlug($subslug);

        if(!empty($getCategory) && !empty($getSubCategory))
        {
            $data['meta_title'] = $getSubCategory-> meta_title;
            $data['meta_keywords'] = $getSubCategory-> meta_keywords;
            $data['meta_description'] = $getSubCategory-> meta_description;

            $data['getSubCatagory']= $getSubCatagory;
            $data['getCatagory']= $getCatagory;

            $data['getroduct']=ProductModel::getroduct($getCatagory->id , $getSubCategory->id);

            return view('product.list',$data);
        }
        else if(!empty($getCategory))
        {
            $data['getCatagory']= $getCatagory;

            $data['meta_title'] = $getCatagory-> meta_title;
            $data['meta_keywords'] = $getCatagory-> meta_keywords;
            $data['meta_description'] = $getCatagory-> meta_description;

            $data['getroduct']=ProductModel::getroduct($getCatagory->id);
            return view('product.list',$data);
        }

        else 
        {
            abort(404);
        }
    }
}
