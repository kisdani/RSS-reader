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

        $xml = simplexml_load_file($request->url);
        $siteName = $xml->xpath('channel/title');

        $rss = new RssFeed;
        $rss->user_id = auth()->user()->id;
        $rss->name = $siteName[0];
;       $rss->url= $request->url;

        $rss->save();

        return redirect()->back();
    }

    public function list(){
       $sites = RssFeed::get();

        if($sites!=""){
            return view('pages/dashboard', ['sites'=>$sites]);
        }else{
            return view('pages/dashboard');
        }
    }

    public function delete($id){
        RssFeed::find($id)->delete();
        return redirect()->back();
    }
}
