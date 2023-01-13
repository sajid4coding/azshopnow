@extends('layouts.frontendmaster')
@section('content')
<div class="container">
    <div class="col-lg-12 col-md-12 my-5">
        <style>
            .demo10{background:#C0BFBF;padding:30px 0}
            .pricingTable10{text-align:center}
            .pricingTable10 .pricingTable-header{padding:30px 0;background:#4d4d4d;position:relative;transition:all .3s ease 0s}
            .pricingTable10:hover .pricingTable-header{background:#FF4800}
            .pricingTable10 .pricingTable-header:after,.pricingTable10 .pricingTable-header:before{content:"";width:16px;height:16px;border-radius:50%;border:1px solid #d9d9d8;position:absolute;bottom:12px}
            .pricingTable10 .pricingTable-header:before{left:40px}
            .pricingTable10 .pricingTable-header:after{right:40px}
            .pricingTable10 .heading{font-size:20px;color:#fff;text-transform:uppercase;letter-spacing:2px;margin-top:0}
            .pricingTable10 .price-value{display:inline-block;position:relative;font-size:55px;font-weight:700;color:#FF4800;transition:all .3s ease 0s}
            .pricingTable10:hover .price-value{color:#fff}
            .pricingTable10 .currency{font-size:30px;font-weight:700;position:absolute;top:6px;left:-19px}
            .pricingTable10 .month{font-size:16px;color:#fff;position:absolute;bottom:15px;right:-30px;text-transform:uppercase}
            .pricingTable10 .pricing-content{padding-top:50px;background:#fff;position:relative}
            .pricingTable10 .pricing-content:after,.pricingTable10 .pricing-content:before{content:"";width:16px;height:16px;border-radius:50%;border:1px solid #7c7c7c;position:absolute;top:12px}
            .pricingTable10 .pricing-content:before{left:40px}
            .pricingTable10 .pricing-content:after{right:40px}
            .pricingTable10 .pricing-content ul{padding:0 20px;margin:0;list-style:none}
            .pricingTable10 .pricing-content ul:after,.pricingTable10 .pricing-content ul:before{content:"";width:8px;height:46px;border-radius:3px;background:linear-gradient(to bottom,#818282 50%,#727373 50%);position:absolute;top:-22px;z-index:1;box-shadow:0 0 5px #707070;transition:all .3s ease 0s}
            .pricingTable10:hover .pricing-content ul:after,.pricingTable10:hover .pricing-content ul:before{background:linear-gradient(to bottom,#ff4800dc 50%, #FF4800 50%)}
            .pricingTable10 .pricing-content ul:before{left:44px}
            .pricingTable10 .pricing-content ul:after{right:44px}
            .pricingTable10 .pricing-content ul li{font-size:15px;font-weight:700;color:#777473;padding:10px 0;border-bottom:1px solid #d9d9d8}
            .pricingTable10 .pricing-content ul li:last-child{border-bottom:none}
            .pricingTable10 .read{display:inline-block;font-size:16px;color:#fff;text-transform:uppercase;background:#d9d9d8;padding:8px 25px;margin:30px 0;transition:all .3s ease 0s}
            .pricingTable10 .read:hover{text-decoration:none}
            .pricingTable10:hover .read{background:#FF4800}
            @media screen and (max-width:990px){.pricingTable10{margin-bottom:25px}
            }
            /* Credit to https://bootsnipp.com/snippets/92erW */
        </style>

        <h4 class="py-4 text-center">Pricing Table</h4>
        <div class="row">
            <div class="col-md-4">
                <div class="pricingTable10">
                    <div class="pricingTable-header">
                        <h3 class="heading">{{ $basic->name }}</h3>
                        <span class="price-value">
                            <span class="currency">$</span> {{ $basic->price }}
                            <span class="month">/mo</span>
                        </span>
                    </div>
                    <div class="pricing-content">
                        <ul class="plans-align">
                            <li><i class="fa fa-check mr-2 text-primary"></i> 10 Product Allowed</li>
                            <li><i class="fa fa-check mr-2 text-primary"></i> 3 Coupon Allowed</li>
                            <li><i class="fa fa-check mr-2 text-primary"></i> Tracking Store Analytics</li>
                            <li><i class="fa fa-check mr-2 text-primary"></i> 2 Staff Account</li>
                        </ul>
                        {{-- <a href="{{ route('plans.show',$plan->slug) }}" class="read">Choose</a> --}}
                        <a href="{{ route('plans.index.show',$basic->slug) }}" class="read">Choose</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="pricingTable10">
                    <div class="pricingTable-header">
                        <h3 class="heading">{{ $premium->name }}</h3>
                        <span class="price-value">
                            <span class="currency">$</span> {{ $premium->price }}
                            <span class="month">/mo</span>
                        </span>
                    </div>
                    <div class="pricing-content">
                        <ul class="plans-align">
                            <li><i class="fa fa-check mr-2 text-primary"></i> 30 Product Allowed</li>
                            <li><i class="fa fa-check mr-2 text-primary"></i> 5 Coupon Allowed</li>
                            <li><i class="fa fa-check mr-2 text-primary"></i> Tracking Store Analytics</li>
                            <li><i class="fa fa-check mr-2 text-primary"></i> 5 Staff Account</li>
                        </ul>
                        {{-- <a href="{{ route('plans.show',$plan->slug) }}" class="read">Choose</a> --}}
                        <a href="{{ route('plans.index.show',$premium->slug) }}" class="read">Choose</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="pricingTable10">
                    <div class="pricingTable-header">
                        <h3 class="heading">{{ $azshop->name }}</h3>
                        <span class="price-value">
                            <span class="currency">$</span> {{ $azshop->price }}
                            <span class="month">/mo</span>
                        </span>
                    </div>
                    <div class="pricing-content">
                        <ul class="plans-align">
                            <li><i class="fa fa-check mr-2 text-primary"></i> Unlimited Product Allowed</li>
                            <li><i class="fa fa-check mr-2 text-primary"></i> Unlimited Coupon Allowed</li>
                            <li><i class="fa fa-check mr-2 text-primary"></i> Tracking Store Analytics</li>
                            <li><i class="fa fa-check mr-2 text-primary"></i> Unlimited Staff Account</li>
                        </ul>
                        {{-- <a href="{{ route('plans.show',$plan->slug) }}" class="read">Choose</a> --}}
                        <a href="{{ route('plans.index.show',$azshop->slug) }}" class="read">Choose</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
