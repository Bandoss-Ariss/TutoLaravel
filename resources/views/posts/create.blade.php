@extends('layout')
@section('content')
<h1 class="text-center">
Nouvelle publication
</h1>
<form method="POST" action="/post">
@csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Titre</label>
    <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Auteur</label>
    <input type="text" name="author" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div></br>
  <div class="form-group ">
    <label for="exampleInputPassword1">Contenu</label>
    <textarea class="form-control" name="content"></textarea >
  </div>
  <button type="submit" class="btn btn-primary">Publier</button>
</form>
@endsection