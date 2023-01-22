<?php

namespace App\Http\Controllers;

use App\Models\{Plan, User};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Cashier\Subscription;
// use Stripe\Plan;
use Stripe\Stripe;

use function PHPUnit\Framework\returnSelf;

class PlanController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */

    public function index()
    {
        // $plans = Plan::get();
        return view("vendor.subscription.plans",[
            'basic' => Plan::where('name','Basic')->first(),
            'premium' => Plan::where('name','Premium')->first(),
            'azshop' => Plan::where('name','Az Shop')->first(),
        ]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function show(Plan $plan, Request $request)
    {
        $intent = auth()->user()->createSetupIntent();
        return view("vendor.subscription.subscription", compact("plan","intent"));
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function subscription_done(Request $request)
    {
        $plan = Plan::find($request->plan);
        $subscription = $request->user()->newSubscription($request->plan, $plan->stripe_plan)->create($request->token);
        User::where('id', auth()->id())->update([
            'dashboard_access' => 'active',
            'status' => 'active',
        ]);
        return redirect('/vendor/dashboard')->with('registrion_success','Your registation successfully & Subscription purchase successful!');
    }



    public function upgrade()
    {
        // $plans = Plan::get();
        return view("vendor.upgrade.upgrade",[
            'basic' => Plan::where('name','Basic')->first(),
            'premium' => Plan::where('name','Premium')->first(),
            'azshop' => Plan::where('name','Az Shop')->first(),
            'plan_exist' => Subscription::where('user_id',auth()->id())->latest()->first(),
        ]);
    }


    public function upgrade_show(Plan $plan, Request $request)
    {
        $intent = auth()->user()->createSetupIntent();
        return view("vendor.upgrade.upgrade_done", compact("plan","intent"));
    }

    public function upgrade_done(Request $request)
    {
        $plan = Plan::find($request->plan);
        $subscription = $request->user()->newSubscription($request->plan, $plan->stripe_plan)->create($request->token);

        return redirect('/vendor/dashboard')->with('upgrade_success','Account Upgrade Successful!');
    }

}
