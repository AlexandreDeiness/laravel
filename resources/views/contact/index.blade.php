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
                        <form method="POST" action="{{-- route('contact.store') --}}">
                            {{csrf_field()}}
                            <input class="form-control" type="text" name="title" placeholder="Titre">
                            <br/>
                            <textarea class="form-control col-md-8" name="body" id="" cols="30" rows="10" placeholder="Contactez nous !"></textarea>
                            <br/>
                            <input class="btn btn-success btn-block" type="submit" value="Envoyer">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
