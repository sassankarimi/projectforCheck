<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Jobs\CompileReports;

class PagesController extends Controller
{
    public function home()
    {
        return view('pages.home');

    }
}
