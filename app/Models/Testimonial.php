<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;
    protected $table = 'testimonials';
    public $timestamps = true;

    protected $fillable = [
    	'user_id',
        'body',
    ];

    public function users() {
    	return $this->belongsTo(User::class, 'user_id');
    }



}
