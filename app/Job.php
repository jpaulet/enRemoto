<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Job extends Model {

    protected $appends = ['is_owner'];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'job';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'position', 'tags', 'salary', 'description', 'job_type', 'category_id', 'link', 'experience', 'status'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['id', 'created_at', 'updated_at', 'end_date', 'enterprise_id'];


    /**
     * The belongsTo relation.
     * 
     */
    public function enterprise()
    {
        return $this->belongsTo('App\Enterprise');
    }

    public function category()
    {
        return $this->hasOne('App\Category');
    }

    /**
     * is_owner mutator.
     * 
     */
    public function getIsOwnerAttribute()
    {
        if(Auth::check())
        {
            return $this->attributes['enterpise_id'] === Auth::User()->getEnterpiseId();
        }
        
        return false;
    }

    public function posts()
    {
        return $this->hasManyThrough('App\Enterprise', 'App\User');
    }

}
