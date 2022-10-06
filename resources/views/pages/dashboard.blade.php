@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add Rss</div>
                    <div class="card-body">
                        <form method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputPassword1">URL</label>
                                <input type="url" class="form-control" name="url" id="exampleInputPassword1" placeholder="Site Url">
                            </div><br>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">User</th>
                        <th scope="col">Url</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($sites as $site)
                        <tr>
                            <td>{{$site->user_id}}</td>
                            <td>{{$site->url}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
         </div>

@endsection
