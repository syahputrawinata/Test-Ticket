@extends('layout.template')

@section('content')
<div class="jumbotron py-4 px-5">
    @if(Session::get('failed'))
    <div class="alert alert-danger">{{ Session::get('failed') }}</div> 
    @endif
    <h1 class="display-4">
        @if(Auth::check())
        Selamat Datang! {{Auth::User()->name}}!
        @else
        Selamat Datang!
        @endif
    </h1>
    <hr class="my-4">
    <p>aplikasi di gunakan untuk pengaduan ticket</p>
</div>
@endsection