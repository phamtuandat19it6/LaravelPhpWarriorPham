<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class social extends Model
{
    public $timestamps = false;//set time to false
    protected $fillable = [
        'provider_user_id','provider','user'
    ];
    protected $primaryKey ='user_id';
    protected $table = 'tbl_social';
    public function login(){
        return $this->belongsTo('App\Login','user');
    }

}
