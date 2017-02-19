<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'content', 'user_id', 'user', 'role'
    ];

    public function Admin()
    {
        if ($role='admin')
        {
            return true;
        }  else
        {return false;
        }
    }
    /**
     * Get the user
     */
}
