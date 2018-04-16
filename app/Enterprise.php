<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Enterprise extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'enterprise';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'logo', 'description', 'location', 'link'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['id', 'created_at', 'updated_at', 'validated'];


    /**
     * The belongsTo relation.
     * 
     */
    public function owner()
    {
        return $this->belongsTo('App\User');
    }

}
