@extends('layouts.app')
@section('content')
    <!-- single article show -->
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $article->title }}</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif


                        <div class="col-6 col-lg-4">
                            <h2>{{$article->title}}</h2>
                            <p> This One's Content {{$article->description}}</p>

                            <?php
                            $user = DB::table('users')->find($article->user_id);
                            ?>

                            <p>'created by' {{$user->name}}</p>
                            <p>people who saw that article : {{$article->views_number}}</p>

                            @foreach(explode(' ',$article->image_name) as $img)
                                <img width="300" src="../../uploads/{{$img}}">
                            @endforeach

                        <!-- Delete and Edit Buttons appears only for admins -->

                            @if(auth()->user()->is_admin)
                                <a href="/view/{{$article->id}}/delete">
                                    <button type="button" class="btn btn-sm btn-danger">Delete</button>
                                </a>
                                <a href="/view/{{$article->id}}/edit">
                                    <button type="button" class="btn btn-sm btn-info">Edit</button>
                                </a>

                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop