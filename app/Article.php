<?php

namespace NetPortal;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title', 'body', 'published_at', 'user_id'
    ];

    protected $dates = ['published_at'];

    public function scopePublished($query)
    {
        $query->where('published_at', '<=', Carbon::now());
    }

    public function setPublishedAtAttribute($date)
    {
        $this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date);
    }

    public function user()
    {
        return $this->belongsTo('NetPortal\User');
    }

    /**
     * Get the tags for the given article
     * @return array
     */
    public function tags()
    {
        return $this->belongsToMany('NetPortal\Tag')->withTimestamps();
    }

    /**
     * get a list of tag ids associated with the current article
     * @return array
     */
    public function getTagListAttribute()
    {
        return $this->tags->lists('id')->all();
    }
}
