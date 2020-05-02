<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Covid extends Model
{
    protected $table = 'covid';
    protected $fillable = [
        'user_id', 'lang', 'critical', 'q1', 'q2', 'q3', 'q4', 'q5', 'q6', 'q7', 'q8'
    ];

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
