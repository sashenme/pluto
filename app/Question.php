<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'questions_set_id', 'user_id', 'title'
    ];

    public function users()
    {
        return $this->belongsTo('App\User','user_id');
    }
    public function questionsSets()
    {
        return $this->belongsTo('App\QuestionsSet','questions_set_id');
    }
}
