<?php

namespace NetPortal;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    protected $fillable = [
         'user_id', 'title', 'description', 'completed'
    ];

    public function user()
    {
        $this->belongsTo('NetPortal\User');
    }
}
