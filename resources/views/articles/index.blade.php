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

                        @forelse($articles as $article)
                            {{--<img src="{{asset($user->name)}}" alt="" width="300">--}}
                            <h1>{{ $article->title }}</h1>
                            <p>{{ $article->content }}</p>

                            @foreach ($article->likes as $user)
                                {{ $user->name }} likes this !
                            @endforeach

                            <p>
                                @if ($article->isLiked)
                                    <a href="{{ route('article.like', $article->id) }}">Unlike</a>
                                @else
                                    <a href="{{ route('article.like', $article->id) }}">Like</a>
                                @endif
                            </p>

                            <a href="{{route('article.show', ['id' => $article->id])}}">
                                Voir mon article
                            </a>
                        @empty
                            Rien du tout
                        @endforelse
                    </div>
                    <div class="text-center">
                        {{$articles->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
