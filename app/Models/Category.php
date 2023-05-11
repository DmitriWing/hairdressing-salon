<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'categories';
    public $timestamps = true;

    protected $fillable = [
    	'title',
        'cost_lower',
        'cost_upper',
        'label',
        'color',
    ];

    protected $dates = ['deleted_at'];

    // relation to model Service
    public function services (){
    	return $this->hasMany(Service::class);
    }

    // relation to model Service
    public function gallery (){
    	return $this->hasMany(Gallery::class);
    }
}
