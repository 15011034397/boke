<?php

namespace App\Http\Middleware;

use App\Setting;
use Closure;

class CheckForMaintenance
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   //$setting=new Setting;
        $setting=Setting::get()->first();

        if(!$setting->sopen==1){
       return $next($request);
    }else{
      return redirect('/weihu');
    }
    
}
}
