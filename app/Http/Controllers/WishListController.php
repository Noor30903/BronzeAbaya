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
    $request->validate([
        'quantity' => 'required|integer|min:1'
    ]);

    $WishListItem = WishListItemModel::find($id);
    if($WishListItem) {
        $WishListItem->product_quantity = $request->quantity;
        $WishListID = $WishListItem->lishlist_id;
        $WishList= WishListModel::find($WishListID);
        $WishList->totalcost = $request->total;
        $WishListItem->save();
        $WishList->save();

        return redirect()->back()->with('success', 'WishList updated successfully.');
    } else {
        return redirect()->back()->with('error', 'WishList item not found.');
    }
}

}

