@extends('layout')
@section('content')

 <h1 class="text-center">{{ $post->title }}</h1>
 @php
 $date = strtotime($post->created_at);
@endphp
 <h6>Publié par: {{ $post->author }} le {{ date('Y-m-d',$date) }}</h6>
 <p class='text-center'> {{ $post->content }}</p>


@endsection