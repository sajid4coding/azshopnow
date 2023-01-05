@extends('layouts.vendor_master')

@section('vendor_body_content')
<div class="col-md-9">
    <style>
        .card {
            max-width: 500px;
            margin: auto;
            color: black;
            border-radius: 20 px;
        }

        p {
            margin: 0px;
        }

        .container .h8 {
            font-size: 30px;
            font-weight: 800;
            text-align: center;
        }

        .form-control {
            color: white;
            background-color: #223C60;
            border: 2px solid transparent;
            height: 60px;
            padding-left: 20px;
            vertical-align: middle;
        }

        .form-control:focus {
            color: white;
            background-color: #0C4160;
            border: 2px solid #2d4dda;
            box-shadow: none;
        }

        .text {
            font-size: 14px;
            font-weight: 600;
        }

        ::placeholder {
            font-size: 14px;
            font-weight: 600;
        }
    </style>

    {{-- <div class="card">
        <div class="card-header">
            You will be charged ${{ number_format($plan->price, 2) }} for {{ $plan->name }} Plan
        </div>

        <div class="card-body">

            <form id="payment-form" action="{{ route('subscription.create') }}" method="POST">
                @csrf
                <input type="hidden" name="plan" id="plan" value="{{ $plan->id }}">

                <div class="row">
                    <div class="col-xl-4 col-lg-4">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" id="card-holder-name" class="form-control" value="" placeholder="Name on the card">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-4 col-lg-4">
                        <div class="form-group">
                            <label for="">Card details</label>
                            <div id="card-element"></div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12">
                    <hr>
                        <button type="submit" class="btn btn-primary" id="card-button" data-secret="{{ $intent->client_secret }}">Purchase</button>
                    </div>
                </div>

            </form>

        </div>
    </div> --}}

    <div class="card px-4">
        <p class="h8 py-3">Payment Details</p>

        <p class="text-center mb-3">You will be charged ${{ number_format($plan->price, 2) }} for {{ $plan->name }} Plan</p>

        <div class="row gx-3">
            <form id="payment-form" action="{{ route('subscription.create') }}" method="POST">
            @csrf
                <input type="hidden" name="plan" id="plan" value="{{ $plan->id }}">
                <div class="col-12">
                    <div class="d-flex flex-column">
                        <p class="text mb-1">Person Name</p>
                        <input class="form-control mb-3" type="text" name="name" id="card-holder-name" value="" placeholder="Name on the card">
                    </div>
                </div>
                <div class="col-12">
                    <div class="d-flex flex-column">
                        <p class="text mb-1">Card Number</p>
                        <input class="form-control mb-3" type="text" placeholder="1234 5678 435678">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="d-flex flex-column">
                            <p class="text mb-1">Expiry</p>
                            <input class="form-control mb-3" type="text" placeholder="MM/YYYY">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex flex-column">
                            <p class="text mb-1">CVV/CVC</p>
                            <input class="form-control mb-3 pt-2 " type="password" placeholder="***">
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3 d-grid gap-2">
                        <button type="submit" class="btn btn-primary text-center" id="card-button" data-secret="{{ $intent->client_secret }}">Pay ${{ number_format($plan->price, 2) }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://js.stripe.com/v3/"></script>
<script>
    const stripe = Stripe('{{ env('STRIPE_KEY') }}')

    const elements = stripe.elements()
    const cardElement = elements.create('card')

    cardElement.mount('#card-element')

    const form = document.getElementById('payment-form')
    const cardBtn = document.getElementById('card-button')
    const cardHolderName = document.getElementById('card-holder-name')

    form.addEventListener('submit', async (e) => {
        e.preventDefault()

        cardBtn.disabled = true
        const { setupIntent, error } = await stripe.confirmCardSetup(
            cardBtn.dataset.secret, {
                payment_method: {
                    card: cardElement,
                    billing_details: {
                        name: cardHolderName.value
                    }
                }
            }
        )

        if(error) {
            cardBtn.disable = false
        } else {
            let token = document.createElement('input')
            token.setAttribute('type', 'hidden')
            token.setAttribute('name', 'token')
            token.setAttribute('value', setupIntent.payment_method)
            form.appendChild(token)
            form.submit();
        }
    })
</script>
@endsection
