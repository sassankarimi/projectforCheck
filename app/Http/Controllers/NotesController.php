<?php

namespace App\Http\Controllers;

use App\Card;
use App\Note;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Authenticatable;


class NotesController extends Controller
{
    public function store(Request $request, Card $card)
    {

        $this->validate($request,['body'=>'required|min:6' ]);
         $note=new Note($request->all());
         $note->user_id=7;
         $card->notes()->save($note);
//         $request->session()->flash('flash_message','what time is it in your world?');
        flash('what time is it in your world?!','danger');
        // return $card;
         return back();
         //return \Redirect::to('wss.card_show');
//        $cardItem = Card::find($id);
//        $result = $cardItem->notes()->create(['body' => $request->input('body')]);
        //dd($result);
    }
    public function  edit(Note $note)
    {
         //auth()->loginUsingId(7);
        //auth()->logout();
//        if(Gate::denies('edit_note',$note))
//        {
//            abort('404','Not Access for you');
//        }
        //$this->authorize('edit_note',$note);
       return view('notes.edit',compact('note'));
    }
    public function  update(Request $request,Note $note)
    {
        $this->validate($request,['text'=>'required' ]);
      // $note= new Note();
        $note->body=$request->text;
        $note->update($request->all());
        return back();
    }
}
