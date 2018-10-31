<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eventos extends Model
{
    //
    protected $fillable= ['evento','fecha','publico','tickets','horarioinicio','horariofinal','lugar'];
}
