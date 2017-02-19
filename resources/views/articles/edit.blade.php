@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Éditer l'article n°{{$article->id}}</div>

                    <div class="panel-body">
                        <form method="POST" action="{{route('article.update', [$article->id])}}">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="PUT">
                            <input class="form-control" required type="text" value="{{$article->title}}" name="title">
                            <br/>
                            <p>
                                <textarea class="form-control col-md-8" name="content" id="" cols="30" rows="10">{{$article->content}}</textarea>
                            </p>

                            <p>
                                <input class="btn btn-block" type="submit" value="Envoyer">
                            </p>
                        </form>
                    <br/>

                        <form method="POST" action="{{route('article.destroy', [$article->id])}}">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="DELETE">
                            <input class="btn btn-danger" type="submit" value="Supprimer">
                        </form>

                        @include('messages.errors')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
