<?php

namespace App\Http\Controllers;

use App\Card;
use App\Events\UserWasBanned;
use App\Note;
use App\User;
use Illuminate\Support\Facades\DB;

class CardsController extends Controller
{


    /**
     * CardsController constructor.
     */
    public function __construct()
    {
         $this->middleware('MustBeConfirm');
    }

    public function index()
{
    $cards = DB::transaction(function () {

        //
    });

   //$cards = new Card;

    $cards= Card::all();
       // return DB::table('cards')->where('title','=','mqeDkonBltXK')->pluck('id');
    return view('cards.index',compact('cards'));
}
    public function show(Card $card)
    {
     // auth()->loginUsingId(10);
        auth()->logout();
       $card->load('notes.user');
        // $card=Card::with('notes')->get();
         //return $card;
        return view('cards.show',compact('card'));
    }

    public function ship($userId)
    {
        $user = User::find($userId);

        // Order shipment logic...

        event(new UserWasBanned($user));
    }
}
