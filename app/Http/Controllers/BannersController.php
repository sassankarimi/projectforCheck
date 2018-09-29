<?php

namespace App\Http\Controllers;

use App\Banner;
//use App\Http\Controllers\Traits\AuthorizeUsers;
use App\Http\Requests\BannerRequest;
use App\Http\Requests\ChangeBannerRequest;
use App\Photo;
use Illuminate\Http\Request;


class BannersController extends Controller
{
    //use AuthorizeUsers;
    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        flash('hamin!', 'are hamin', 'success', 'flash_message_overlay');
        return view('banners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerRequest $request)
    {

        $banner = auth()->user()->publish(
            new Banner($request->all())
        );
        return redirect(path_banner($banner));

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($zip, $street)
    {

        $banner = Banner::LocatedAt($zip, $street);
        return view('banners.show', compact('banner'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



}
