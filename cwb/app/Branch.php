<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Branch extends Model
{
    //
	 use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'branch';
    protected $fillable = [
        'branch_name', 'branch_code','region_id'
    ];
   	public function region()
    {
        return $this->belongsTo('App\Region');
    }
}
