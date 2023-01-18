<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class VendorRoleCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()->role == 'vendor' || auth()->user()->role == 'staff'){
            if(User::where('id',auth()->id())->first()->dashboard_access == 'deactive'){
                return redirect('plans_index');
            }
        }else{
            abort('404');
        }
        return $next($request);
    }
}
