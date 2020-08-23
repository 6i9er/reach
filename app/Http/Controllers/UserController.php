<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\UserView;
use App\Models\UserVisit;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class UserController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */


    public $elementsPerPage ;
    public function __construct()
    {
        $this->elementsPerPage = 100;
        $this->middleware('guest');
    }

    public function cron(){
//        update the size of execution to 5 Minutes
        ini_set('max_execution_time', 300);
        $day = date('w');
        $week_start = date('Y-m-d', strtotime('-'.$day.' days'));
        $state = "SELECT user_id AS user_id ,  COUNT( user_id ) AS count 
                    FROM visit_user  WHERE date(visit_date) >=  '$week_start'
                    GROUP BY user_id ";
        $rows = DB::select($state);
        foreach ($rows as $row){
            Member::edit(["count_visit" => $row->count] , $row->user_id);
        }
        return "finish";
    }

    public function index($page=1){
        $query = Member::orderBy("count_visit" , "DESC")->skip(($page - 1) * $this->elementsPerPage)->take($this->elementsPerPage);
         $data = $query->select(array("id","count_visit","name", "email", "id"))->get();
        $newVisitArrays = array();
        foreach ($data as $member){
            $newArray['user_id'] = $member['id'];
            $newArray['visit_date'] = date("Y-m-d");
            array_push($newVisitArrays , $newArray);
        }
        UserView::insert($newVisitArrays);
       return  $data;
    }

    public function getUser($id = 0){
        $getUser = Member::getByID($id);
        if(count($getUser)){
            UserVisit::add([
                "user_id" => $getUser->id,
                "visit_date" =>date("Y-m-d")
            ]);
            return $getUser;
        }else{
            return [
                "errors" => 1,
                "msg" => trans('errors.noUserFoundWithThisData')
            ];
        }
    }
}
