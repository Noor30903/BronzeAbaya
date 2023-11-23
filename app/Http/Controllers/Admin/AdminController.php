<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash; 
use App\Models\User;

class AdminController extends Controller
{
    public function list()
    {
        $data['getRecord']= User::getAdmin() ;
       $data['header_title']= 'Admin';
       return view('admin.admin.list',$data);
    }

    public function add()
    {
       $data['header_title']= 'Add New Admin';
       return view('admin.admin.add',$data);
    }

    public function insert(Request $request)
    {
        requist()->validate([
            'email' => 'required|email|uniqe:users'
        ]);

       $user = new User;
       $user->name = $request->name;
       $user->email = $request->email;
       $user->password = Hash::make($request->password);
       $user->is_admin = 1;
       $user->save();

       return redirect('admin/admin/list')->with('success',"Admin Successfully Created");
    }

    public function edit($id)
    {
        $data['getRecord']= User::getSignal($id);
        $data['header_title']= 'Edit Admin';
       return view('admin.admin.edit',$data);
    }

    public function update($id, Request $request)
    {

        requist()->validate([
            'email' => 'required|email|uniqe:users,email,'.$id
        ]);
        $user = User::getSignal($id) ;
       $user->name = $request->name;
       $user->email = $request->email;

       if(!empty($request->password))
       {
        $user->password = Hash::make($request->password);
       }

       $user->status = $request->status;
       $user->is_admin = 1;
       $user->save();

       return redirect('admin/admin/list')->with('success',"Admin Successfully Updated");
    }

    public function delete($id)
    {
        $user = User::getSignal($id);
        $user->is_delete = 1;
        $user->save();

       return redirect()->back()->with('success',"Admin Successfully Deleted");
    }

}