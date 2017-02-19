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

                        <h1>{{$article->title}}</h1>
                        <p>{{$article->content}}</p>
                        <p>
                            @if($article->user)
                                Utilisateur: {{$article->user->name}}
                            @else
                                Pas d'utilisateur
                            @endif
                        </p>

                        <p>
                            <a href="{{route('article.edit', [$article->id])}}">Modifier l'article</a>
                        </p>

                        <p>
                            <a href="{{route('article.index')}}">Retour</a>
                        </p>

                        <h1>Commentaires</h1>
                            <div class="comments">
                                <ul class="list-group">
                                    @foreach($article->comments as $comment)
                                        <li class=""list-group-item>
                                            <strong>
                                                {{ $comment->created_at->diffForHumans() }}: &nbsp;
                                            </strong>
                                            {{ $comment->body }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <hr/>

                            <div class="card">
                                <div class="card-block">

                                    {{ method_field('PATCH') }}

                                    <form method="POST" action="/article/{{$article->id}}/comments">

                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <textarea name="body" placeholder="Écrivez votre commentaire" class="form-control" id="" cols="30" rows="10"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Ajouter un commentaire</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        {{--@forelse($comments as $comment)--}}
                            {{--<h1>{{ $comment->title }}</h1>--}}
                            {{--<p>{{ $comment->content }}</p>--}}
                        {{--@empty--}}
                            {{--Aucun commentaire--}}
                        {{--@endforelse--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
