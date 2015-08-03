<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\Admin\ClubRequest;
use App\Http\Controllers\Controller;

use App\Club;
use App\Pic;

class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
            $clubs = Club::all();
            $pics = Pic::lists('path','id')->toArray();
            return view('admin.club.index',compact('clubs','pics'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(ClubRequest $request)
    {
            $club = new Club;
            $club->name = $request->name;
            $club->logo_id = $request->logo_id;
            $club->fan_pic_id = $request->fan_pic_id;

            $club->save();

            return redirect('/admin/club');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
            $club = Club::findOrFail($id);
            $pics = Pic::lists('path','id')->toArray();

            return view('admin.club.edit',compact('club','pics'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(ClubRequest $request, $id)
    {
            $club = Club::findOrFail($id);

            $club->name = $request->name;
            $club->logo_id = $request->logo_id;
            $club->fan_pic_id = $request->fan_pic_id;

            $club->save();

            return redirect('/admin/club');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
            $club = Club::findOrFail($id);
            $club->delete();

            return redirect('/admin/club');
    }
}
