@extends('master')
@section('content')
@if($illustrations)
  @foreach($illustrations as $illustration)
    <article class="d-flex d-flex flex-column align-items-center mt-2 mb-2 flex-wrap col-12 col-md-5 col-lg-3">
      <img class='imgIllustration m-3 w-100' src="{{$illustration->src}}" alt="{{$illustration->name}}">
      <article class="m-3">
        <p>{{$illustration->name}}</p>
        <p>{{$illustration->commentaire}}</p>
        <small>{{$illustration->post}}</small>
      </article>
    </article>
  @endforeach
@endif
<section class='col-12'>
  <h2>Ajouter nouvelles video</h2>
  <form enctype="multipart/form-data" class="d-flex flex-column align-items-center card" action="{{ route('illustration.newIllustration') }}" method="post">
    {{csrf_field()}}
    <label>nom de l'image</label>
    <input type="text" name="name" value="" placeholder="limité à 30 caractere">
    <label>commentaire(pas obligatoire)</label>
    <input type="text" name="commentaire" value="">
    <label>type de l'image</label>
    <select class="" name="typeImage">
      <option value="">Sélectionnez un type d'image'</option>
      <option value="illustration">Illustration</option>
      <option value="3D">3D</option>
      <option value="dessins">Dessin</option>
      <option value="photo">Photo</option>
    </select>
    <label>rentrez le fichier</label>
    <input type="file" name="srcImage" value="">
    <input type="submit" name="" value="rentrer Image">
  </form>
</section>
@stop
