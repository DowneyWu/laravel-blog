<?php
namespace App\Http\Controllers;
use App\User;
use App\UserAccount as Account;
use Illuminate\Support\Facades\Log;

class TestController{

    public function index(){
        return '您已经成年了';

//        $account = User::find(1)->account;
//        dd($account->weixin);
//        $user = Account::find(1)->user;
//        p($user);
    }

}