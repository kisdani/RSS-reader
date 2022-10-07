@extends('layouts.app')

@section('content')

    <div class="container">

        @if(session()->get('error'))
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="alert alert-danger" role="alert">
                        {{ session()->get('error') }}
                    </div>
                </div>
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add Rss</div>
                    <div class="card-body">
                        <form method="POST" class="save">
                            @csrf
                            <div class="form-group">
                                <input type="url" class="form-control" name="url" id="rssUrl" placeholder="Site Rss Url..." required>
                            </div><br>
                            <div class="d-grid gap-2 col-2 mx-auto">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <table class="table table-striped rounded sites">
                    <thead>
                    <tr>
                        <th scope="col">Site Name</th>
                        <th scope="col" colspan="2">Site Url</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($feeds as $feed)
                        <tr>
                            <td class="align-middle">{{$feed->name}}</td>
                            <td class="align-middle">{{$feed->url}}</td>
                            <td class="text-center">
                                <form method="POST" action="{{url('delete/'.$feed->id)}}">
                                    @method('delete')
                                    @csrf
                                    <button type="subbmit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
         </div>

@endsection
