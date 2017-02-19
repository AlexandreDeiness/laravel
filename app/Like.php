<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Like extends Model
{
    use SoftDeletes;

    protected $table = 'likeables';

    protected $fillable = [
        'user_id',
        'likeable_id',
        'likeable_type'
    ];

    /**
     * Get all of the products that are assigned this like.
     */
    public function products()
    {
        return $this->morphedByMany('App\Product', 'likeable');
    }

    /**
     * Get all of the articles that are assigned this like
     */
    /**
     * @return array
     */
        public function articles()
    {
        return $this->morphedByMany('App\Article', 'likeable');

    }
}
