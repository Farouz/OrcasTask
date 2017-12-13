@extends('layouts.app')
@section('content')

    <!-- Edit News Page -->
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit News</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="panel-body">
                            <form method="post" action="/view/{{$article->id}}/update" class="form-horizontal"
                                  enctype="multipart/form-data">
                                {{csrf_field()}}
                                <label for="title" class="col-md-4 control-label">News Title</label>
                                <input name="title" id="title" type="text" class="form-control" placeholder="News Title"
                                       required autofocus>

                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

                                <label for="description" class="col-md-4 control-label">News description</label>
                                <input name="description" id="description" type="text" class="form-control"
                                       placeholder="News description" required autofocus>

                                <label for="image">News Image</label>
                                <input type="file" id="image" name="images[]" required multiple>

                                <button type="submit" class="btn btn-primary center-block">Update</button>
                            </form>
                            @if(count($errors))
                                <div class="form-group">
                                    <div class="alert alert-error">
                                        <ul>
                                            @foreach($errors->all() as $error )
                                                <li> {{$error}} </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop