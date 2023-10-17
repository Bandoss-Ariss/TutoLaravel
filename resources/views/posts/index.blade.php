@extends('layout')
@section('content')
    <div style="display:flex">
      <h1 class="text-center mr-5">Liste des publications</h1>
    <button class="btn btn-primary">
    <a href="{{ route('post.create') }}" @class([
                    'link-white' => true
                ])>
    Publier
    </a>
    </button>
    </div>
    <table class="table table-striped mt-5">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Titre</th>
            <th scope="col">Auteur</th>
            <th scope="col">Contenu</th>
            <th scope="col">Date</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @for ($i = 0; $i < $count; $i++)
            <tr>
                <td>
                {{$posts[$i]->id}}
                </td>
                <td>
                @php
                    $isLinkWhite = false
                @endphp
                <a href="{{ route('post.show',['id'=>$posts[$i]->id]) }}" @class([
                    'link-white' => $isLinkWhite
                ])>
                {{$posts[$i]->title}}                </a></td>
                <td>{{$posts[$i]->author}}</td>
                <td>{{$posts[$i]->content}}</td>
                <td>{{$posts[$i]->date}}</td>
                <td >
                <button class="btn btn-danger">
                <a href="{{route("post.delete",["id"=>$posts[$i]->id]) }}" @class([
                    'link-white' => true
                ])>Supprimer</a>
                </button></td>
            </tr>
          @endfor
        </tbody>
      </table>
@endsection
