<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'title', 'content', 'user_id',
    ];

    /**
     * Get the user
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the article
     */
    public function article()
    {
        return $this->belongsTo('App\Article');
    }
}
