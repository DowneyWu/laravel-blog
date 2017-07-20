<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Log;
use App\User;

class TestMiddleware{

    public function handle($request, Closure $next){
        $user = User::find(1);
        if($user->age >= 18){
            Log::info($user->age);
            return $next($request);
        }else{
            return redirect()->route('refuse');
        }
    }

}

