@extends('layouts.vendor_master')

@section('vendor_body_content')
<div class="col-9">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card my-5">
                    <div class="card-header">
                        You will be charged ${{ number_format($plan->price, 2) }} for {{ $plan->name }} Plan
                    </div>

                    <div class="card-body">

                        <form id="payment-form" action="{{ route('upgrade.done') }}" method="POST">
                            @csrf
                            <input type="hidden" name="plan" id="plan" value="{{ $plan->id }}">

                            <div class="row">
                                <div class="col-xl-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" name="name" id="card-holder-name" class="form-control mb-3" value="" placeholder="Name on the card">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="">Card details</label>
                                        <div class="form-control mb-3" id="card-element"></div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12">
                                <hr>
                                <div class="mb-3 d-grid gap-2">
                                    <button type="submit" class="btn btn-primary text-center mt-3" id="card-button" data-secret="{{ $intent->client_secret }}">Pay ${{ number_format($plan->price, 2) }}</button>
                                </div>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
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
</div>
@endsection
