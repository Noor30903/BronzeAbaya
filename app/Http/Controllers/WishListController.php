<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WishListItemModel;
use App\Models\WishListModel;
use App\Models\ProductModel;
use Auth;
class WishListController extends Controller
{
   
    public function list()
    {
        $WishListItem = WishListItemModel::getRecord();
        foreach ($WishListItem as $item) {
            $productImage = ProductModel::getImageSingle($item->product_id);
            $item->productImage = $productImage ? $productImage->getLogo() : 'path/to/default/image.jpg'; // Replace with your default image path
        }

        $data = [
            'getRecord' => $WishListItem,
            'header_title' => 'Wish List'
        ];
    
        return view('wishlist.list', $data);

        
    }

    public function insert($productid)
    {
        if(!empty(Auth::check()))
		{
            
		
            $user_id = Auth::user()->id;
            $wishList = WishListModel::where('user_id', $user_id)->first();
    
            if (!$wishList) {
                $wishList = new WishListModel;
                $wishList->user_id = $user_id;
                $wishList->save();
            }
    
            $WishListItem = new WishListItemModel;
            $WishListItem->wishlist_id = $wishList->id;
            $WishListItem->product_id = $productid;
    
            $wishList->save();
            $WishListItem->save();
    
            return redirect('product/list')->with('success', "Product added to Wishlist successfully");
        }else{
            return redirect('admin');
        }

    }

    public function delete($id)
    {

        WishListItemModel::DeleteRecord($id);

        return redirect()->back()->with('success',"Item Successfully Deleted");
    }

}

