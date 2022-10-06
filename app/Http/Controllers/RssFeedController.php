<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\RssFeed;
use Auth;

use Illuminate\Http\Request;

class RssFeedController extends Controller
{
    public function registerForm(){
        return view('pages/register');
    }

    public function save(Request $request){

        $rss = new RssFeed;
        $rss->user_id = auth()->user()->id;
;       $rss->url= $request->url;

        $rss->save();

        $request->session()->flash('registered', 1);
        return redirect('login');
    }

    public function list(){
        $sites = RssFeed::get();

        return view('pages/dashboard', ['sites'=>$sites]);
    }
}
