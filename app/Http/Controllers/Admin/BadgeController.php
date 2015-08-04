<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\Admin\BadgeRequest;
use App\Http\Controllers\Controller;

use App\Badge;

class BadgeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
            $badges = Badge::all();

            return view('admin.badge.index',compact('badges'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
            $badge = new Badge;
            $badge->name = $request->name;
            $badge->description = $request->description;
            $badge->icon_path = $request->icon_path;

            $badge->save();

            return redirect('/admin/badge');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
            $badge = Badge::findOrFail($id);

            return view('admin.badge.edit',compact('badge'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(BadgeRequest $request, $id)
    {
            $badge = Badge::findOrFail($id);

            $badge->name = $request->name;
            $badge->description = $request->description;

            $badge->save();

            return redirect('/admin/badge');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
            $badge = Badge::findOrFail($id);
            $badge->delete();

            return redirect('/admin/badge');
    }
}
