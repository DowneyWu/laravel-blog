<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Store;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller{

    public function login(Request  $request){
        if($request->isMethod('GET')) {
            return view('login/login');
        }else if($request->isMethod('POST')){
            $email = $request->input('email');
            $password = $request->input('password');
            $user = new User();
            $model = $user->checkLogin($email, $password);
            if($model != null && !empty($model)){
                return redirect('admin/article');
            }else{
                return redirect()->back()->with('error', '账号和密码不符')->withInput();
            }
        }
    }

    /**
     * 注册页面
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function register(){
       return view('login/register');
    }

    public function store(Store $store){
        if($store->isMethod('POST')){
            $user = new User();
            $data = $store->except('_token');
            unset($data['password_confirmation']);
            $user->addData($data);
            return redirect('admin/login');
        }
    }

}