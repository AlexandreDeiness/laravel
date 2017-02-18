@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        <form method="POST" action="{{route('article.store')}}">
                            {{csrf_field()}}
                            <p>
                                <input required type="text" name="title">
                            </p>
                            <p>
                                <textarea name="content" id="" cols="30" rows="10"></textarea>
                            </p>
                            <br/>
                            <input type="file">
                            <br/>
                            <input type="submit" value="Envoyer">

                        @include('messages.errors')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
