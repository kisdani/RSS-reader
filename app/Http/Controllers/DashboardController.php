<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\RssFeed;
use Auth;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function registerForm(){
        return view('pages/register');
    }

    public function save(Request $request){
        try{
            $xml = simplexml_load_file($request->url);
            $siteName = $xml->xpath('channel/title');

            $rss = new RssFeed;
            $rss->user_id = auth()->user()->id;
            $rss->name = $siteName[0];
            $rss->url= $request->url;

            $rss->save();
        } catch (\Exception $e){
            $request->session()->flash('error','Invalid Rss Url!');
            return redirect('dashboard');
        }

        return redirect()->back();
    }

    public function list(){
       $feeds = RssFeed::where('user_id', auth()->user()->id)->get();

       return view('pages/dashboard', ['feeds'=>$feeds]);
    }

    public function delete($id){
        $feed = RssFeed::find($id);

        if($feed->user_id == auth()->user()->id){
            $feed->delete();
        }
        return redirect()->back();
    }
}
