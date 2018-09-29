<?php
/**
 * Created by PhpStorm.
 * User: Sassan
 * Date: 9/18/2018
 * Time: 11:14 AM
 */

namespace App\Http\Controllers\Traits;


use App\Banner;
use Illuminate\Http\Request;

trait AuthorizeUsers
{
    protected function userCreatebanner($request)
    {
        return Banner::where([
            'zip' => $request->zip,
            'street' => $request->street,
            'user_id' => auth()->user()->id,
        ])->exists();
    }

    protected function unAuthorized(Request $request)
    {
        if ($request->ajax())
            return response(['message' => 'Nope!'], 503);
            flash()->error('Nope!!');
            return back();
    }



}