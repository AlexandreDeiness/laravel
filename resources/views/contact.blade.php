@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Contact</div>

                    <div class="panel-body">
                        @if(count($errors) > 0)
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        {{--<form method="post" action="{{ route('contact.store') }}">--}}
                            {{--{{csrf_field()}}--}}
                            {{--<input type="text" name="title" placeholder="Titre">--}}
                            {{--<br/>--}}
                            {{--<textarea name="body" id="" cols="30" rows="10"></textarea>--}}
                            {{--<br/>--}}
                            {{--<input type="submit" value="Envoyer">--}}
                        {{--</form>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
