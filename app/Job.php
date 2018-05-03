<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Job extends Model {

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
    protected $fillable = [
        'title',
        'position', 
        'description', 
        'tags', 
        'salary', 
        'category', 
        'link', 
        'promoted', 
        'company',
        'type',
        'email',
        'editLink',
        'slug',
        'logo',
        'created_at',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'id', 
        'updated_at', 
        //'end_date', 
        'editLink', 
        'slug'
    ];

}
