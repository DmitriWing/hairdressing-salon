<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';
    public $timestamps = true;

    protected $fillable = [
    	'gallery_id',
        'user_id',
    	'body',
    ];

    public function gallery() {
    	return $this->belongsTo(Gallery::class, 'gallery_id');
    }

    public function users() {
    	return $this->belongsTo(User::class, 'user_id');
    }

}
