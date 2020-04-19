<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    
    protected $table = 'feedbacks';

    protected $fillable = [
         'user_id', 'title','description','starts'
    ];

    public function users()
    {
        return $this->belongsTo('App\User','user_id');
    }
    
}
