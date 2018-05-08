<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animation extends Model
{
    public $timestamps = false;
    protected $fillable = ['name','commentaire','src','type','post','update'];
}
?>
