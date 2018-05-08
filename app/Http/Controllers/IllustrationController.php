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
     //dd($illustrations);
     //affichage de la vue avec envois des variables
     return view('illustrations', compact('illustrations'));
  }

  public function addIllustration(Request $request){
    //dd($_FILES['srcImage']);
    if (request('typeImage')=='dessin') {
      Storage::disk('illustration')->put(request('srcImage'), request('srcImage'));
    }
    elseif (request('typeImage')=='3D') {
      Storage::disk('illustration3D')->put(request('srcImage'), request('srcImage'));
    }
    elseif (request('typeImage')=='croquis') {
      Storage::disk('croquis')->put(request('srcImage'), request('srcImage'));
    }
    else {
      Storage::disk('photo')->put(request('srcImage'), request('srcImage'));
    }
    Illustration::create([
      'name'=>request('name'),
      'commentaire'=>request('commentaire'),
      'type'=>request('typeImage'),
      'src'=>'img/'.request('typeImage').'/'.request('srcImage'),
      'post'=>date('Y-m-d H-i-s'),
      'update'=>date('Y-m-d H-i-s')
    ]);
    return redirect()->action('IllustrationController@displayIllustrations');
  }
}
