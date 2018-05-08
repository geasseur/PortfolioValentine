@extends('master')
@section('content')
<form action="" method="post" class='d-flex flex-column'>
  <input type="text" name="nom" value="" placeholder="votre nom">
  <input type="text" name="adresse" value="" placeholder="votre adresse mail">
  <input type="text" name="objet" value="" placeholder="l'objet de votre message">
  <textarea name="message" rows="8" cols="80"></textarea>
  <input type="submit" name="" value="envoyer">
</form>

@stop
