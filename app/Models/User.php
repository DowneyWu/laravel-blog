<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'created_at', 'updated_at',
    ];

    protected $dateFormat = 'U';

    public function addData($data){
        $data['password'] = md5($data['password']);
        $result = $this->create($data)->id;
        if($result){
            return true;
        }
        return false;
    }

    public function checkLogin($email, $password){
        //打开数据库记录LOG
//        DB::enableQueryLog();
        $map = array(
            'email'     =>  $email,
            'password'  =>  md5($password),
        );
        $model = $this->where($map)->first();
//        dd(DB::getQueryLog());//获取sql语句
//        exit;
        return $model;
    }

}
