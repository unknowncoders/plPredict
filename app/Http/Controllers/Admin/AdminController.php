<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\Admin;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
            $admins = Admin::all();
            return view('admin.admin.index',compact('admins'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
            $this->validate($request,['username'=>'required']);

            $username = $request->username;

            $user = User::where('username',$username)->first();

            if(!$user){ return redirect('/admin/admin')->withErrors('Username not found'); }

            if($user->isAdmin()){ return redirect('/admin/admin')->withErrors('User is already an admin'); }

            $admin = new Admin;

            $user->admin()->save($admin);

            return redirect('/admin/admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
