@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            </div>
                        @endif

                        <h1>{{$comment->title}}</h1>
                        <p>{{$comment->content}}</p>
                        <p>
                            @if($comment->user)
                                Utilisateur: {{$comment->user->name}}
                            @else
                                Pas d'utilisateur
                            @endif
                        </p>
                        <a href="{{route('article.index')}}">Retour</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
