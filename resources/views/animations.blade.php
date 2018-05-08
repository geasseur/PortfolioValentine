@extends('master')
@section('content')
@if($animations)
  @foreach($animations as $animation)
  <section>
    <article class="d-flex justify-content-around align-items-center mt-2 mb-2">
      <video preload="yes" type="video/mp4" controls='true' preload="metadata">
        <source src="{{$animation->src}}" type="video/mp4">
        <source src="{{$animation->src}}" type="video/webm">
      </video>
      <article class="ml-3 " class='informations'>
        <p>{{$animation->name}}</p>
        <p>{{$animation->type}}</p>
        <p>{{$animation->commentaire}}</p>
        <small>{{$animation->post}}</small>
      </article>
      <!-- form for update for admin -->
      <article class='edition' class=''>
        <form class='d-flex flex-column align-items-center' action="{{route('animation.update', ['id'=>$animation->idAnimation])}}" method="post">
          {{csrf_field()}}
          <label for="">nom</label>
          <input type="text" name="name" value="{{$animation->name}}">
          <label for="">commentaire</label>
          <input type="text" name="commentaire" value="{{$animation->commentaire}}">
          <input type="submit" name="" value="mettre à jour">
        </form>
      </article>
    </article>

    <!-- section for admin -->
    <article class="d-flex justify-content-around">

      <!-- form delete video pour admin -->
      <form class="" action="{{route('animation.deleteVideo', ['id'=>$animation->idAnimation])}}" method="post">
        {{csrf_field()}}
        <input type="text" name="src" value="{{$animation->src}}">
        <input type="submit" name="deleteVideo" value="Effacer">
      </form>

      <button class='editer' type="button" name="update">modifier</button>
    </article>
  </section>
  @endforeach
@endif
<section class='col-12'>
  <h2>Ajouter nouvelles video</h2>
  <form enctype="multipart/form-data" name='ajoutVideo' class="d-flex flex-column align-items-center card" action="{{ route('animations.newAnimation') }}" method="post">
    {{csrf_field()}}
    <label>nom de la video</label>
    <input type="text" name="name" value="" placeholder="limité à 30 caractere">
    <label>commentaire(pas obligatoire)</label>
    <input type="text" name="commentaire" value="">
    <label>type de la video</label>
    <select class="" name="typeVideo">
      <option value="">Sélectionnez un type de video</option>
      <option value="2D">2D</option>
      <option value="3D">3D</option>
      <option value="live">Live</option>
    </select>
    <label>rentrez le fichier</label>
    <input type="file" name="srcVideo" value="">
    <input type="submit" name="" value="rentrer video">
  </form>
</section>

@stop
