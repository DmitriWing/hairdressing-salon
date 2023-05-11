<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    protected $table = 'gallery';
    public $timestamps = true;

    protected $fillable = [
    	'category_id',
        'service_id',
    	'image',
        'publishing',
    ];


    public function comments (){
        return $this->hasMany('App\Models\Comment');
    }

    public function categories (){
    	return $this->belongsTo('App\Models\Category', 'category_id');
    }

    public function services (){
    	return $this->belongsTo('App\Models\Service', 'service_id');
    }





}
