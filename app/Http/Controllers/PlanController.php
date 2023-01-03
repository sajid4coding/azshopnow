<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;
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
        $plan = Plan::where('name', 'Premium')->first();

        return view("vendor.subscription.plans", compact("plan"));
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function show(Plan $plan, Request $request)
    {
        $intent = auth()->user()->createSetupIntent();
        return view("vendor.subscription.subscription", compact("plan", "intent"));
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function subscription(Request $request)
    {
        $plan = Plan::find($request->plan);

        $subscription = $request->user()->newSubscription($request->plan, $plan->stripe_plan)->create($request->token);

        return view("vendor.subscription.subscription_success");
    }
}
