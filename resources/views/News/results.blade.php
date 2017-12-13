@extends('layouts.app')
@section('content')
    <!-- all results page  -->
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Ssearch results</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        @foreach($results as $result)
                            <div class="col-6 col-lg-4">
                                <h2>{{$result->title}}</h2>
                                <p> This One's Content {{$result->description}}</p>

                                <?php
                                $user = DB::table('users')->find($result->user_id);
                                ?>

                                <p>'created by' {{$user->name}}</p>
                                <p><a class="btn btn-secondary" href="/view/{{$result->id}}" role="button">View details
                                        &raquo;</a></p>
                            </div>
                        @endforeach


                    </div>

                </div>
            </div>
        </div>
    </div>
@stop