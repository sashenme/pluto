<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
        'question_id', 'user_id', 'name','correct'
    ];

    public function users()
    {
        return $this->belongsTo('App\User','user_id');
    }
    public function questions()
    {
        return $this->belongsTo('App\Questions','question_id');
    }
}
