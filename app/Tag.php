<?php

namespace NetPortal;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name'
    ];

    /**
     * Get the articles associated with the given tag
     * @return [type] [description]
     */
    public function articles()
    {
        return $this->belongsToMany('NetPortal\Article');
    }
}
