<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
//use Illuminate\Database\Eloquent\Model\Buyer;
use App\Models\Buyer;
use App\Models\Seller;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';
    
    //protected $uniqueKey = 'phonenumber';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'phonenumber', 'password', 'usertype'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    /* protected $casts = [
        'email_verified_at' => 'datetime',
    ]; */
    public function buyers() {
        return $this->hasOne(Buyer::class);
    }
    public function sellers() {
        return $this->hasOne(Seller::class);
    }

    public static function userList(){
        $userlist = User::all();
      return $userlist;
    }
    /*public function phone()
    {
        return $this->hasOne('App\Phone');
    }*/
    /*public function userName(Request $request ){
        print_r($request); die;
        $flight = App\Flight::where('active', 1)->first();
    }*/









}
