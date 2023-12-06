<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\ColorModel;
use App\Models\SubCategoryModel;
use App\Models\ProductColorModel;

use App\Models\ProductImageModel;

use Str;
use Auth;

class OrderManagementController extends Controller
{
    public function list()
    {
        $data['getRecord']= ProductModel::getRecord();
        $data['header_title']= 'Product';
        return view('admin.product.list',$data);
    }
    

    public function edit($product_id)
    {
        $product = ProductModel::getSingle($product_id);
        if(!empty($product))
        {
            $data['getCategory'] = CategoryModel::getRecordActive();
            $data['getColor'] = ColorModel::getRecordActive();
            $data['product'] = $product;
            $data['getSubCategory'] = SubCategoryModel::getRecordCategory($product->category_id);
            $data['header_title']= 'Edit Product';
            return view('admin.product.edit',$data);
        }
    }

    public function update($product_id, Request $request) 
    {
        
        //dd($request->all());
        $product = ProductModel::getSingle($product_id);
        if(!empty($product))
        {

            $product->title = trim($request->title);
            $product->category_id = trim($request->category_id);
            $product->sub_category_id = trim($request->sub_category_id);
            $product->price = trim($request->price);
            $product->short_description = trim($request->short_description);
            $product->description = trim($request->description);
            $product->status = trim($request->status);
            $product->save();

            ProductColorModel::DeleteRecord($product->id);
            //dd($request->color_id);
            if(!empty($request->color_id))
            {
                foreach($request->color_id as $color_id)
                {
                    $color = new ProductColorModel;
                    $color->color_id = $color_id;
                    $color->product_id = $product_id;
                    $color->save();
                }
            }

            if(!empty($request->file('image')))
            {
                foreach($request->file('image') as $value)
                {
                    if($value->isValid())
                    {
                        $ext = $value->getClientOriginalExtension();
                        $randomStr = $product->id.Str::random(20);
                        $filename = strtolower ($randomStr).'.'.$ext;
                        $value->move('upload/product/', $filename);

                        $imageupload = new ProductImageModel;
                        $imageupload->image_name = $filename;
                        $imageupload->image_extention = $ext;
                        $imageupload->product_id = $product->id;
                        $imageupload->save();

                    }
                }
            }
            
            return redirect()->back()->with('success', "Product successfully updated");
        }
        else
        { 
            abort(404);
        }
    } 

    public function image_delete($id)
    {
        $image = ProductImageModel::getSingle($id);
        if(!empty($image->getLogo()))
        {
            unlink('upload/product/'.$image->image_name);
        }
        $image->delete();

        return redirect()->back()->with('success', "Product Image successfully Deleted");
    }

    public function product_image_sortable(Request $request)
    {
        if(!empty($request->photo_id))
        {
            $i = 1;
            foreach($request->photo_id as $photo_id)
            {
                $image = ProductImageModel::getSingle($photo_id);
                $image->order_by = $i;
                $image->save();

                $i++;
            }
        }

        $json['success'] = true;
        echo json_encode($json);
    }

}


