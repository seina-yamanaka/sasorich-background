<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Event;
use DB;

class MemberController extends Controller
{
    public function sanka($event_id){
        //var_dump($event_id);exit;
        $user_id = \Auth::user()->id;
        if(DB::select("select * from event_user where user_id = $user_id and event_id = $event_id" )){
            DB::delete("delete from event_user where `user_id` = $user_id and `event_id` = $event_id");
        }else{
        $a = Event::find($event_id);
        $a->users()->attach($user_id);
        }
        return redirect('/');
    }
    
    public function unsanka($event_id){
        $user_id = \Auth::user()->id;
        DB::delete("delete * from event_user where user_id = $user_id and event_id = $event_id");
        return redirect('/');
    }
}