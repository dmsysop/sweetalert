<?php

/**
  * @author Amjad Iqbal
  * @author Amjad Iqbal <contact@amjadiqbal.me>
  */
  
namespace DMSysOp\SweetAlert\Core;

use Closure;

class SweetAlert
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!empty($request->session()->all())){
            $data = array();
            foreach( config('sweetalert.supported') as $key => $value ){
                if($request->session()->get($key)){
                    $data[$key] = $request->session()->get($key);
                }
            }
            alert($data);
        }

        return $next($request); 
    }


}
