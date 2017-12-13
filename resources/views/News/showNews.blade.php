@extends('layouts.app')

@section('content')
    <!-- all news show -->
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">News</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        @foreach($news as $snew)
                            <div class="col-6 col-lg-4">
                                <h2>{{$snew->title}}</h2>
                                <p> This One's Content {{$snew->description}}</p>

                                <?php
                                $user = DB::table('users')->find($snew->user_id);
                                ?>

                                <p>'created by' {{$user->name}}</p>
                                <p><a class="btn btn-secondary" href="/view/{{$snew->id}}" role="button">View details
                                        &raquo;</a></p>
                            </div>
                        @endforeach
                        {{ $news->links() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
