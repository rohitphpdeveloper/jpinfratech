<?php



namespace App;



use Illuminate\Notifications\Notifiable;

use Illuminate\Foundation\Auth\User as Authenticatable;



class User extends Authenticatable

{

    use Notifiable;



    /**

     * The attributes that are mass assignable.

     *

     * @var array

     */





    protected $fillable = [

       'fd_no','voting_share','name','email','password','user_type','mobile','prn_amt','int_amt','mat_date','roi','adr1'

       ,'adr2','adr4','pin','pan','email2','sale_order','customer','collection','interest','total','status'

    ];



    /**

     * The attributes that should be hidden for arrays.

     *

     * @var array

     */

    //hidden field

    protected $hidden = [

        'password', 'remember_token'

    ];



 

    public function usertype()

    {

     return $this->belongsTo('App\Model\Category','user_type','id');

    }



}

