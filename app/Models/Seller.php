<?php

namespace App\Models;

//use Illuminate\Notifications\Notifiable;
//use Illuminate\Contracts\Auth\MustVerifyEmail;
//use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;


class Seller extends Model
{
    protected $table = 'sellers';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'image', 'user_id' 
    ];
    
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public static function sellerList(){
      $slist = Seller::all();
      return $slist;
    }
}
