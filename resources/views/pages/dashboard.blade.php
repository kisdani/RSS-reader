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
                                <label for="rssUrl">Sites</label>
                                <input type="url" class="form-control" name="url" id="rssUrl" placeholder="Site Url" required>
                            </div><br>
                            <button type="submit" class="btn btn-primary gap-2 d-md-flex justify-content-md-end">Submit</button>
                        </form>
                    </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Site Name</th>
                        <th scope="col" colspan="2">Site Url</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($sites as $site)
                        <tr>
                            <td class="align-middle">{{$site->name}}</td>
                            <td class="align-middle">{{$site->url}}</td>
                            <td class="text-center">
                                <form method="POST" action="{{url('delete/'.$site->id)}}">
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
