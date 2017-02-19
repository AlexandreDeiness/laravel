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
                                @include('articles.share', ['url' => 'http://www.google.fr'])
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
    <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
    <script>

        var popupSize = {
            width: 780,
            height: 550
        };

        $(document).on('click', '.social-buttons > a', function(e){

            var
                    verticalPos = Math.floor(($(window).width() - popupSize.width) / 2),
                    horisontalPos = Math.floor(($(window).height() - popupSize.height) / 2);

            var popup = window.open($(this).prop('href'), 'social',
                    'width='+popupSize.width+',height='+popupSize.height+
                    ',left='+verticalPos+',top='+horisontalPos+
                    ',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1');

            if (popup) {
                popup.focus();
                e.preventDefault();
            }

        });
    </script>
@endsection
