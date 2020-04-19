<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = [
        'question_id', 'user_id', 'answer_id','correct'
    ];

    public function users()
    {
        return $this->belongsTo('App\User','user_id');

    }
}
