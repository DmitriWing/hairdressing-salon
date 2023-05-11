<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table = 'services';
    public $timestamps = true;

    protected $fillable = [
    	'category_id',
        'title',
    ];
    
    public function gallery (){
        return $this->hasMany('App\Models\Gallery');
    }

    public function categories (){
    	return $this->belongsTo('App\Models\Category', 'category_id');
    }




}
