<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RssFeed;
use FeedReader;

class NewsController extends Controller
{
    public function list(){

       $feeds = RssFeed::where('user_id', auth()->user()->id)->get();
       //Read each feed's items
       $entries = [];
       foreach($feeds as $feed) {
           $xml = simplexml_load_file($feed->url);
           $entries = array_merge($entries, $xml->xpath("//item"));
       }

       //Sort feed entries by pubDate
       usort($entries, function ($feed1, $feed2) {
           return strtotime($feed2->pubDate) - strtotime($feed1->pubDate);
       });

        return view('pages/news', ['entries'=>$entries]);
    }
}
