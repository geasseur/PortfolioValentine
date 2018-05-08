<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Animation;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class animationController extends Controller
{
  public function displayAnimations(){
     $animations = DB::table('animations')->get();
     //affichage de la vue avec envois des variables
     return view('animations', compact('animations'));
  }

  public function addAnimation(Request $request){
    //recupération du nom du fichier
    $name = $request->srcVideo->getClientOriginalName();
    $type = request('typeVideo');
    if ($type=='2D') {
      Storage::disk('animations2D')->put($name, request('srcVideo'));
      //récupération du nom aléatoire du fichier vidéo pour le remplacer par le bon nom
      $nomPif = scandir('video/'.$type.'/'.$name.'/');
      rename('video/'.$type.'/'.$name.'/'.$nomPif[2], 'video/'.$type.'/'.$name.'/'.$name);
    }
    elseif (request('typeVideo')=='3D') {
      Storage::disk('animations3D')->put($name, request('srcVideo'));
      //récupération du nom aléatoire du fichier vidéo pour le remplacer par le bon nom
      $nomPif = scandir('video/'.$type.'/'.$name.'/');
      rename('video/'.$type.'/'.$name.'/'.$nomPif[2], 'video/'.$type.'/'.$name.'/'.$name);
    }
    else {
      Storage::disk('animationsLive')->put($name, request('srcVideo'));
      //récupération du nom aléatoire du fichier vidéo pour le remplacer par le bon nom
      $nomPif = scandir('video/'.$type.'/'.$name.'/');
      rename('video/'.$type.'/'.$name.'/'.$nomPif[2], 'video/'.$type.'/'.$name.'/'.$name);
    }
    Animation::create([
      'name'=>request('name'),
      'commentaire'=>request('commentaire'),
      'type'=>$type,
      'src'=>'video/'.$type.'/'.$name.'/'.$name,
      'post'=>date('Y-m-d H-i-s'),
      'update'=>date('Y-m-d H-i-s')
    ]);
    return redirect()->route('animations.display');
  }

    //test delete avec formRequest
  public function deleteAnimation($id){
    $dir = pathinfo(request('src'));
    $objects = scandir($dir['dirname']);
    unlink(request('src'));
    rmdir($dir['dirname']);
    DB::table('animations')->where('idAnimation', '=', $id)->delete();
    return redirect()->route('animations.display');
   }


  public function updateAnimation($id){
    DB::table('animations')->where('idAnimation', '=', $id)->update(['name'=>request('name'), 'commentaire'=>request('commentaire'), 'update'=>date('Y-m-d H-i-s')]);
    return redirect()->route('animations.display');
  }
}
