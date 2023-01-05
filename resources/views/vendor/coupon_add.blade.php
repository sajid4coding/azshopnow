@extends('layouts.vendor_master')
@section('vendor_body_content')
<div class="col-lg-9 col-md-9">

    <div class="tab-pane" >
        <div class="product-upload-wrap">
            <div class="product-upload-box text-center">
                <div class="product-upload-content">
                  <h2 class="text-danger">Add Coupons</h2>
                </div>
            </div>
            {{-- ==== Error Messages ==== --}}
            @if ($errors->any())
               @foreach ($errors->all() as $error)
                     <div class="alert alert-danger" role="alert">
                        <strong>{{ Str::replaceFirst('_', ' ', $error) }}</strong>
                     </div>
               @endforeach
            @endif
            {{-- ==== Error Messages ==== --}}
            @if ($coupon_count < 1 || membership())
                <form action="{{ route('coupon.add') }}" method="POST">
                     @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-grp">
                                <label for="title">Coupon Code</label>
                                <input type="text" placeholder="Example: xYzw12" name="coupon_code" id="title">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-grp">
                                <label for="price">Minimum Price of buy</label>
                                <input type="text" id="price" name="minimum_price" placeholder="$ -">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group pl-3">
                                <label class="d-block" for="">Discount Type</label>

                                <select class="form-select" name="discount_type" id="">
                                    <option disabled selected value="">-Select Coupon type-</option>
                                    <option value="percentage">Percentage ( % )</option>
                                    <option value="flat">Flat</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-grp">
                                <label for="weight">Coupon Amount</label>
                                <input type="number" name="coupon_amount" id="weight">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-grp">
                                <label for="weight">Discount Message</label>
                                <input type="text" name="discount_message" id="weight">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="text-center mt-3">
                                <button type="submit">Add Coupon</button>
                            </div>
                        </div>
                    </div>
                </form>
            @else
                <p class="text-center text-danger">If you upgrade your account you can able to creating unlimited coupons. <a href="{{ route('plans') }}">Account Upgrade</a></p>
            @endif

            {{-- ==========================================
                           Coupon List Start
                =========================================== --}}

                <div class="row mt-5">
                    <div class="col-md-12">
                        <h6>Available Coupons</h6>
                      </div>
                      <div class="col-md-12">
                        <table class="table table-stripe">
                          <thead class="thead-dark">
                            <tr>
                              <th>S.N</th>
                              <th> Code</th>
                              <th>Details</th>
                              <th>Minimum Value</th>
                              <th>Amount</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            @forelse ($coupons as $coupon)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $coupon->coupon_code }}</td>
                                <td>{{ $coupon->discount_message }}</td>
                                <td>{{ $coupon->minimum_price }}</td>
                                <td>
                                    @if ($coupon->discount_type == 'flat')
                                    ${{ $coupon->coupon_amount }}
                                    @else
                                    {{ $coupon->coupon_amount }}%
                                    @endif
                                </td>
                                <td><a href="{{ route('coupon.delete',$coupon->id) }}" class="text-danger"><i class="fas fa-trash-alt"></i></a></td>
                              </tr>
                            @empty
                            <tr>

                                <td class="text-center bg-danger text-white" colspan="6">You have no any coupon yet</td>
                            </tr>
                            @endforelse


                          </tbody>
                        </table>
                      </div>
                </div>

            {{-- ==========================================
                           Coupon List End
                =========================================== --}}

        </div>
    </div>

</div>
@endsection
