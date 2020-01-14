<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Region extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'regions';
    protected $fillable = [
        'region_name', 'region_code',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

     public function branches()
    {
        return $this->hasMany('App\Branch');
    }
    
}
