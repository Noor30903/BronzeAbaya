<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderModel;
use App\Models\AddressModel;
use App\Models\User;
use Auth;
use Hash;

class DashboardController extends Controller
{

    public function list()
    {
        $user = Auth::user();
        $orders = OrderModel::getRecord();
        $address = AddressModel::where('user_id', Auth::id())->first();
        $data = [
            'user' => $user,
            'orders' => $orders,
            'address' => $address,
            'header_title' => 'Account'
        ];
        
        return view('account.list',$data);
    }
    public function edit(Request $request)
    {
        $user = Auth::user();
    
        // Check if the current password field is not empty
        if (!empty($request->currentpass)) {
            // Verify current password
            if (!Hash::check($request->currentpass, $user->password)) {
                return back()->with('error', "Current password is incorrect.");
            }
        
            // Check if new password and confirm new password match
            if ($request->newpass !== $request->confirmnewpass) {
                return back()->with('error', "New Password and Confirm New Password do not match.");
            }
        
            // Update the password
            $user->password = Hash::make($request->newpass);
            $user->save();
        
            return back()->with('success', 'Password updated successfully.');
        }
    
        // If the current password field is empty, no password change is required
        // Here you can update other user details if needed
    
        return back()->with('success', 'Profile updated successfully.');
    }

    
}
