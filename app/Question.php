<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'questions_set_id', 'title'
    ];

   
    public function questionsSets()
    {
        return $this->belongsTo('App\QuestionsSet','questions_set_id');
    }

    public function answers(){
        return $this->hasMany('App\Answer');
    }
}
