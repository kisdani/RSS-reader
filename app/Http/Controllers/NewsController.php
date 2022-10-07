<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RssFeed;
use FeedReader;

class NewsController extends Controller
{
    public function list(){

        $news = RssFeed::all();
        $newsUrls = $news;

        $rssChanels=[];
        foreach($newsUrls as $newsUrl){
            array_push($rssChanels,$newsUrl->url);
        }

        return view('pages/news', ['sites'=>$rssChanels]);
    }
}
