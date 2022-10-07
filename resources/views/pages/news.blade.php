@extends('layouts.app')

@section('content')
    <div class="container">
    <?php
    //Feed URLs

    $feeds = $sites;

    //Read each feed's items
    $entries = array();
    foreach($feeds as $feed) {
        $xml = simplexml_load_file($feed);
        $entries = array_merge($entries, $xml->xpath("//item"));
    }

    //Sort feed entries by pubDate
    usort($entries, function ($feed1, $feed2) {
        return strtotime($feed2->pubDate) - strtotime($feed1->pubDate);
    });

    ?>

    <?php
        //Print all the entries
        foreach($entries as $entry){
        ?>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <h5 class="card-header"><?= parse_url($entry->link)['host'] ?></h5>
                        <div class="card-body">
                            <h5 class="card-title"><?= $entry->title ?></h5>
                            <p class="card-text"><?= $entry->description ?></p>
                            <p>
                                <i><?= strftime('%m/%d/%Y %I:%M %p', strtotime($entry->pubDate)) ?></i>
                            </p>
                            <a href="<?= $entry->link ?>" class="btn btn-primary">Go to page</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>


    <!--
        /// HIBA OLDAL ///

        <div class="d-flex align-items-center justify-content-center vh-100">
            <div class="text-center">
                <h1 class="display-1 fw-bold">404</h1>
                <p class="fs-3"> <span class="text-danger">Opps!</span> Page not found.</p>
                <p class="lead">
                    The page you’re looking for doesn’t exist.
                  </p>
                <a href="index.html" class="btn btn-primary">Go Home</a>
            </div>
        </div>


      -->


@endsection
