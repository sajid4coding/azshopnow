<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Plan;
use Stripe\Stripe;

class PlanController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */

    public function index()
    {
        $plans = Plan::all();

        return view("frontend.subscription.plans", compact("plans"));
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function show(Plan $plan, Request $request)
    {
        $intent = auth()->user()->createSetupIntent();

        return view("frontend.subscription.subscription", compact("plan", "intent"));
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function subscription(Request $request)
    {
        $plan = Plan::find($request->plan);

        $subscription = $request->user()->newSubscription($request->plan, $plan->stripe_plan)
                        ->create($request->token);

        return view("frontend.subscription.subscription_success");
    }
}
