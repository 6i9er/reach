<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Webpatser\Uuid\Uuid;

class Member extends Model
{
    protected $table = 'users';
//    use SoftDeletes;
//    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'email' , 'count_visit' ,'password' , 'remember_token' ,'updated_at', 'created_at',
    ];

    /**
     * @return all accounts order by id ASC
     */
    public static function getAll(){
        return self::all();
    }

    public static function getByID($id){
        return self::where("id" , $id)->with("visits")->with("views")->first();
    }

    public static function add($inputs = []){
        return Member::create($inputs);
    }
    public static function edit($inputs = [] , $id = 0){
        return Member::where("id" , $id)->update($inputs);
    }




    public function visits(){
        return $this->hasMany('App\Models\UserVisit', 'user_id' );
    }

    public function views(){
        return $this->hasMany('App\Models\UserView', 'user_id' );
    }

}
