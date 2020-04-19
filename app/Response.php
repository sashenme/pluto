<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    protected $fillable = [
        'question_id', 'user_id', 'answer_id','correct'
    ];

    public function users()
    {
        return $this->belongsTo('App\User','user_id');
    }
    public function questions()
    {
        return $this->belongsTo('App\Questions','question_id');
    }
    public function answers()
    {
        return $this->belongsTo('App\Answers','answer_id');
    }
}
