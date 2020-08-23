<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Webpatser\Uuid\Uuid;

class UserVisit extends Model
{
    protected $table = 'visit_user';
//    use SoftDeletes;
//    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'user_id', 'visit_date' ,'updated_at', 'created_at',
    ];

    /**
     * @return all accounts order by id ASC
     */
    public static function getAll(){
        return self::all();
    }

    public static function add($inputs = []){
        return UserVisit::create($inputs);
    }



    public function user(){
        return $this->belongsTo('App\Models\Member', 'user_id' );
    }

}
