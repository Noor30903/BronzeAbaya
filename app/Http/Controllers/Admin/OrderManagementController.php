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
        $data['header_title']= 'Orders';
        return view('admin.dashboard',$data);
    }

    public function update($id, Request $request) 
    {
        $order = OrderModel::getSingle($id);

        if(!empty($order))
        {
            $order->status = trim($request->status);
            $order->save();

            return redirect()->back()->with('success', "Order successfully updated");
        }
         else
        { 
            abort(404);
        }
    }
}


