<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use App\Illustration;

class IllustrationController extends Controller
{
  public function displayIllustrations(){
     $illustrations = DB::table('illustrations')->get();
     return view('illustrations', compact('illustrations'));
  }

  public function addIllustration(Request $request){
    //dd($request->srcImage->getClientOriginalName());
    $name = $request->srcImage->getClientOriginalName();
    $type = request('typeImage');
    if (request('typeImage')=='illustration') {
      Storage::disk('illustration')->put($name, request('srcImage'));
      //récupération du nom aléatoire du fichier image pour le remplacer par le bon nom
      $nomPif = scandir('img/illustrations/'.$type.'/'.$name.'/');
      rename('img/illustrations/'.$type.'/'.$name.'/'.$nomPif[2], 'img/illustrations/'.$type.'/'.$name.'/'.$name);
    }
    elseif (request('typeImage')=='3D') {
      Storage::disk('illustration3D')->put($name, request('srcImage'));
      //récupération du nom aléatoire du fichier image pour le remplacer par le bon nom
      $nomPif = scandir('img/illustrations/'.$type.'/'.$name.'/');
      rename('img/illustrations/'.$type.'/'.$name.'/'.$nomPif[2], 'img/illustrations/'.$type.'/'.$name.'/'.$name);
    }
    elseif (request('typeImage')=='dessins') {
      Storage::disk('dessin')->put($name, request('srcImage'));
      //récupération du nom aléatoire du fichier image pour le remplacer par le bon nom
      $nomPif = scandir('img/illustrations/'.$type.'/'.$name.'/');
      rename('img/illustrations/'.$type.'/'.$name.'/'.$nomPif[2], 'img/illustrations/'.$type.'/'.$name.'/'.$name);
    }
    else {
      Storage::disk('photo')->put($name, request('srcImage'));
      //récupération du nom aléatoire du fichier image pour le remplacer par le bon nom
      $nomPif = scandir('img/illustrations/'.$type.'/'.$name.'/');
      rename('img/illustrations/'.$type.'/'.$name.'/'.$nomPif[2], 'img/illustrations/'.$type.'/'.$name.'/'.$name);
    }
    Illustration::create([
      'name'=>request('name'),
      'commentaire'=>request('commentaire'),
      'type'=>request('typeImage'),
      'src'=>'img/illustrations/'.$type.'/'.$name.'/'.$name,
      'post'=>date('Y-m-d H-i-s'),
      'update'=>date('Y-m-d H-i-s')
    ]);
    return redirect()->route('illustrations.display');
  }
}
