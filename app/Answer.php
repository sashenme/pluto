<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
        'question_id', 'name','reason','correct'
    ];

    public function questions()
    {
        return $this->belongsTo('App\Questions','question_id');
    }
}
