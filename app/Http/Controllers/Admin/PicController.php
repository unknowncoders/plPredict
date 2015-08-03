<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\Admin\PicRequest;
use App\Http\Controllers\Controller;
use App\Pic;

class PicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
            $pics = Pic::all();
            return view('admin.pic.index',compact('pics'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(PicRequest $request)
    {
            $pic = new Pic(['path'=>$request->path]);
            $pic->save();
            return redirect('/admin/pic');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
            $pic = Pic::findOrFail($id);

            return view('admin.pic.edit',compact('pic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(PicRequest $request, $id)
    {
            $pic = Pic::findOrFail($id);
            $pic->path = $request->path;
            $pic->save();

            return redirect('/admin/pic');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
            $pic = Pic::findOrFail($id);
            $pic->delete();

            return redirect('/admin/pic');
    }
}
