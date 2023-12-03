<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WishListItemModel;
use App\Models\WishListModel;

class WishListController extends Controller
{
    public function list()
    {
        $data['getRecord']= WishListItemModel::getRecord();
        $data['header_title']= 'WishList';
        return view('wishwist.list',$data);
        
    }

    public function update(Request $request, $id)
    {
    
        $WishListItem = WishListItemModel::find($id);
        if($WishListItem) {
        
            $WishListID = $WishListItem->wishlist_id;
            $WishList= WishListModel::find($WishListID);
            $WishListItem->save();
            $WishList->save();
        
            return redirect()->back()->with('success', 'WishList updated successfully.');
        } else {
            return redirect()->back()->with('error', 'WishList item not found.');
        }
    }

}

