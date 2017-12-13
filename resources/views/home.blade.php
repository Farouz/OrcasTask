@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <!-- links for admins -->
                        @if(auth()->user()->is_admin)
                            <a href="/addNews" > <strong> <p>Add News</p></strong></a>
                            <a href="/show">  <strong><p>Show News</p></strong></a>
                            <!--admin links end -->
                        @else
                            <a href="/show">  <strong><p>Show News</p></strong></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
