<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Models\ProductImageModel;

class HomeController extends Controller
{
    public function home()
    {

        $products = ProductModel::getProduct(9, null);
        $productsWithImages = [];

        foreach ($products as $product) {
            $images = ProductImageModel::getimageRecord($product->id);
            $product->images = $images->take(2); // Assuming getimageRecord returns a collection
            $productsWithImages[] = $product;
        }

        $data = [
            'getProduct' => $productsWithImages,
            'meta_title' => 'E-commerce',
            'meta_keywords' => '',
            'meta_description' => '',
        ];

        return view('home', $data);
    }
}
