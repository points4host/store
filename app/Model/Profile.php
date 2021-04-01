<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Profile extends Model
{
    protected $guarded = [];
    public $timestamps = false;
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
