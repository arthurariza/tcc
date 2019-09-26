<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produtos';
    protected $primary_key = 'id';
    public $timestamps = false;
    protected $fillable = ['nome','valor'];   

}
