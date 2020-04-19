<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionsSet extends Model
{
    protected $fillable = [
        'title', 'description', 'schedule_date'
    ];
}
