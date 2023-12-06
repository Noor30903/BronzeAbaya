<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\ColorModel;
use App\Models\SubCategoryModel;
use App\Models\ProductColorModel;
use App\Models\OrderModel;
use App\Models\ProductImageModel;

//use Str;
//use Auth;

class OrderManagementController extends Controller
{
    public function list()
    {
        $data['getRecord']= OrderModel::getAllRecord();
        $data['header_title']= 'Product';
        return view('admin.orders.list',$data);
    }
    

    public function edit($product_id)
    {
        $order = OrderModel::getSingle($product_id);
        if(!empty($order))
        {
            $data['getCategory'] = CategoryModel::getRecordActive();
            $data['getColor'] = ColorModel::getRecordActive();
            $data['product'] = $order;
            $data['getSubCategory'] = SubCategoryModel::getRecordCategory($order->category_id);
            $data['header_title']= 'Edit Product';
            return view('admin.orders.edit', $data);
        }
        else
        {
            abort(404);
        }
    }

    public function update($product_id, Request $request) 
    {
        
        //dd($request->all());
        $order = OrderModel::getSingle($product_id);

        if(!empty($order))
        {

            $order->title = trim($request->title);
            $order->category_id = trim($request->category_id);
            $order->sub_category_id = trim($request->sub_category_id);
            $order->price = trim($request->price);
            $order->short_description = trim($request->short_description);
            $order->description = trim($request->description);
            $order->status = trim($request->status);
            $order->save();

            return redirect()->back()->with('success', "Order successfully updated");
        }
         else
        { 
            abort(404);
        }
    }


           //ProductColorModel::DeleteRecord($product->id);
            //dd($request->color_id);
           // if(!empty($request->color_id))
           // {
              //  foreach($request->color_id as $color_id)
              //  {
                //    $color = new ProductColorModel;
               //     $color->color_id = $color_id;
                 //   $color->product_id = $product_id;
                 //   $color->save();
               // }
          //  }

            //if(!empty($request->file('image')))
            //{
              //  foreach($request->file('image') as $value)
               // {
                 //   if($value->isValid())
                 //   {
                  //      $ext = $value->getClientOriginalExtension();
                   //     $randomStr = $product->id.Str::random(20);
                   //     $filename = strtolower ($randomStr).'.'.$ext;
                   //     $value->move('upload/product/', $filename);

                   //     $imageupload = new ProductImageModel;
                    //    $imageupload->image_name = $filename;
                    //    $imageupload->image_extention = $ext;
                    //    $imageupload->product_id = $product->id;
                    //    $imageupload->save();

                   // }
               // }
           // }
            
         //   return redirect()->back()->with('success', "Product successfully updated");
      //  }
       // else
        //{ 
         //   abort(404);
      //  }
 //   } 


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


