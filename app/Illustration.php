<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Illustration extends Model
{
    public $timestamps = false;
    protected $fillable = ['name','commentaire','src','type','post','update'];
}
?>
