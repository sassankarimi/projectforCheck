<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function index()
    {
        $SortBy=\Request::get('SortBy');
        $Direction=\Request::get('Direction');
        $params=compact('SortBy','Direction');
        //<editor-fold desc="Description">
        if ($this->isSortable($params))
        {
            $users = $this->setData($params);
        }
        else{$users=User::paginate(20);}
        //</editor-fold>

        return view('user.table',compact('users'));

    }

    private function isSortable($params)
    {
        return $params['SortBy'] && $params['Direction'];
    }

    private function setData($params)
    {
        $users = User::orderBy($params['SortBy'], $params['Direction'])->paginate(50);
        return $users;
    }


}
