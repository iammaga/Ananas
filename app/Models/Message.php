<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    public $timestamps = false; 

    protected $table = 'messages';
    protected $fillable = [
        'created_at', 'user_id', 'messages'
    ];


    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }

}
