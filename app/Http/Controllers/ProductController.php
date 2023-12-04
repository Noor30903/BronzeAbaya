<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryModel;
use App\Models\SubCategoryModel;
use App\Models\ProductModel;
use App\Models\ProductSizeModel;
use App\Models\ProductImageModel;

class ProductController extends Controller
{
    public function getCategory($slug, $subslug = '')
    {

        $getCategory= CategoryModel::getSingleSlug($slug);
        $getSubCategory= SubCategoryModel::getSingleSlug($subslug);

        if(!empty($getCategory) && !empty($getSubCategory))
        {
            $data['meta_title'] = $getSubCategory-> meta_title;
            $data['meta_keywords'] = $getSubCategory-> meta_keywords;
            $data['meta_description'] = $getSubCategory-> meta_description;

            $data['getSubCategory']= $getSubCategory;
            $data['getCategory']= $getCategory;

            $data['getProduct']=ProductModel::getProduct($getCategory->id , $getSubCategory->id);

            return view('product.list',$data);
        }
        else if(!empty($getCategory))
        {
            $data['getCategory']= $getCategory;

            $data['meta_title'] = $getCategory-> meta_title;
            $data['meta_keywords'] = $getCategory-> meta_keywords;
            $data['meta_description'] = $getCategory-> meta_description;

            $data['getProduct']=ProductModel::getProduct($getCategory->id);
            return view('product.list',$data);
        }

        else 
        {
            abort(404);
        }
    }
    public function show(Request $request)
    {
        $data = [];
        $data['header_title'] = 'Shop';

        $categorySlug = $request->input('category');
        $subCategorySlug = $request->input('subcategory');

        if ($categorySlug) {
            $category = CategoryModel::where('slug', $categorySlug)->firstOrFail();
            $data['getProduct'] = ProductModel::getProduct($category->id, null);
            $data['getCategory'] = $category;
        } elseif ($subCategorySlug) {
            $subCategory = SubCategoryModel::where('slug', $subCategorySlug)->firstOrFail();
            $data['getProduct'] = ProductModel::getProduct(null, $subCategory->id);
            $data['getSubCategory'] = $subCategory;
        } else {
            $data['getProduct'] = ProductModel::getRecord(); // Fetches all products
        }

        return view('product.list', $data);
    }


    public function show_item($id)
    {
        $data = [];
        $data['header_title'] = 'Item';
        $data['getProduct'] = ProductModel::getSingle($id);
        $data['getsizeRecord'] = ProductSizeModel::getsizeRecord();
        $data['getimageRecord'] = ProductImageModel::getimageRecord($id);

        return view('item.list', $data);
    }
}
