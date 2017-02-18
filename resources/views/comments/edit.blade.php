@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        <form method="POST" action="{{route('comment.update', [$comment->id])}}">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="PUT">
                            <input required type="text" value="{{$comment->title}}" name="title">
                            <textarea name="content" id="" cols="30" rows="10">
                                {{$comment->content}}
                            </textarea>
                            <input type="submit" value="Envoyer">
                        </form>


                        <form method="POST" action="{{route('comment.destroy', [$comment->id])}}">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="submit" value="Supprimer">
                        </form>

                        @include('messages.errors')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
