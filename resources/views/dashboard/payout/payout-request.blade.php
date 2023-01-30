@extends('layouts/dashboardmaster')

@section('header_css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')
<div class="d-flex flex-column flex-column-fluid">
    <!--begin::Toolbar-->
    <div class="app-toolbar py-3 py-lg-6">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Seller Withdraw Requests</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="{{route('dashboard')}}" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted">Withdraw Requests</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
        </div>
        <!--end::Toolbar container-->
    </div>
    <!--end::Toolbar-->
    <div class="container">
        <div class="row justify-content-center align-items-center my-3">
            <div class="col-11">
                <div class="card">
                  <div class="card-body">
                    <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" id="payout_request_table">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Seller</th>
                                <th>Amount</th>
                                <th>Order Date</th>
                                <th>Payout Status</th>
                                <th>Seller Payment Method</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @foreach ($errors->all() as $error)
                            {{ $error }}
                        @endforeach
                        <tbody>
                            @php
                                $sl = 1;
                            @endphp
                            @foreach ($seller_payout_requests as $seller_payout_request)
                                <tr>
                                    <td>{{ $sl++ }}</td>
                                    <td>{{ $seller_payout_request->relationwithuser->name }} ({{ $seller_payout_request->relationwithuser->shop_name }})</td>
                                    <td>{{ $seller_payout_request->relationwithinvoice->total_price - $seller_payout_request->relationwithinvoice->total_price * $seller_data->seller_commission/100}}</td>
                                    <td>
                                        {{ $seller_payout_request->created_at->format('d/m/y') }}
                                    </td>
                                    <td>
                                        @if ($seller_payout_request->status == 'paid')
                                            <span class="badge bg-success">Paid</span>
                                        @elseif ($seller_payout_request->status == 'processing')
                                            <span class="badge bg-primary">Processing</span>
                                        @elseif ($seller_payout_request->status == 'rejected')
                                            <span class="badge bg-danger">Rejected</span>
                                        @else
                                            <span class="badge bg-warning text-dark">Unpaid</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $seller_payout_request->seller_payment_method }}
                                    </td>
                                    <td>
                                        @if ($seller_payout_request->status == 'processing')
                                            {{-- <button type="submit" class="btn btn-warning py-1 px-3">Get Paid</button> --}}
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-warning py-1 px-3" data-bs-toggle="modal" data-bs-target="#get_paid{{ $seller_payout_request->relationwithinvoice->id }}">
                                                Get Paid
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="get_paid{{ $seller_payout_request->relationwithinvoice->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Get Paid</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ route('payout.request.get.paid', $seller_payout_request->id) }}" method="POST">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="table-responsive">
                                                                <table class="table table-primary">
                                                                    <tbody>
                                                                        <tr>
                                                                            <th>Seller Payment Method:</th>
                                                                            <td>{{ $seller_payout_request->seller_payment_method }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Details:</th>
                                                                            @php
                                                                                $methods = array();
                                                                                if ($seller_payout_request->seller_payment_method == 'paypal') {
                                                                                    $methods[] = App\Models\Wallet::where('vendor_id', $seller_payout_request->vendor_id)->first()->paypal;
                                                                                }elseif($seller_payout_request->seller_payment_method == 'stripe'){
                                                                                    $methods[] = App\Models\Wallet::where('vendor_id', $seller_payout_request->vendor_id)->first()->stripe;
                                                                                }elseif($seller_payout_request->seller_payment_method == 'skrill'){
                                                                                    $methods[] = App\Models\Wallet::where('vendor_id', $seller_payout_request->vendor_id)->first()->skrill;
                                                                                }else{
                                                                                    $methods[] = 'Bank Account Holder: '. App\Models\Wallet::where('vendor_id', $seller_payout_request->vendor_id)->first()->bank_account_holder;
                                                                                    $methods[] = 'Bank Account Number: '. App\Models\Wallet::where('vendor_id', $seller_payout_request->vendor_id)->first()->bank_account_type;
                                                                                    $methods[] = 'Bank Routing Number: '. App\Models\Wallet::where('vendor_id', $seller_payout_request->vendor_id)->first()->bank_routing_number;
                                                                                    $methods[] = 'Bank Name: '. App\Models\Wallet::where('vendor_id', $seller_payout_request->vendor_id)->first()->bank_name;
                                                                                    $methods[] = 'Bank Address: '. App\Models\Wallet::where('vendor_id', $seller_payout_request->vendor_id)->first()->bank_address;
                                                                                    $methods[] = 'Bank IBAN: '. App\Models\Wallet::where('vendor_id', $seller_payout_request->vendor_id)->first()->bank_IBAN;
                                                                                    $methods[] = 'Bank Swift Code: '. App\Models\Wallet::where('vendor_id', $seller_payout_request->vendor_id)->first()->bank_swift_code;
                                                                                }
                                                                            @endphp
                                                                            <td>
                                                                                @foreach ($methods as $method)
                                                                                    <span class="d-block">{{ $method }}</span>
                                                                                @endforeach
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <label for="transactions_id" class="form-label mt-3">Transactions ID</label>
                                                            <input id="transactions_id" class="form-control mb-3 @error('transactions_id') is-invalid @enderror" type="text" placeholder="type transactions no." name="transactions_id">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-warning">Get Paid</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                </div>
                                            </div>
                                        @endif

                                        @if ($seller_payout_request->status == 'unpaid')
                                            <input type="button" onclick="location.href='{{ route('payout.request.accepted', $seller_payout_request->id) }}';" class="btn btn-warning py-1 px-3" value="Accept" />
                                            <input type="button" onclick="location.href='{{ route('payout.request.declined', $seller_payout_request->id) }}';" class="btn btn-danger py-1 px-3" value="Decline" />
                                        @endif

                                        {{-- FIRST MODAL START --}}
                                            <!-- Button trigger modal (Order Details)-->
                                            <button type="button" class="btn btn-primary py-1 px-3" data-bs-toggle="modal" data-bs-target="#orderdetail{{ $seller_payout_request->relationwithinvoice->id }}" style="border: none">
                                                <i class="fas fa-info-circle"></i> Details
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="orderdetail{{ $seller_payout_request->relationwithinvoice->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Order Details</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="table-responsive">
                                                                <table class="table table-primary">
                                                                    <tbody>
                                                                        <tr>
                                                                            <th>Pay. System:</th>
                                                                            <td>{{ $seller_payout_request->relationwithinvoice->payment_method }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Pay. Status:</th>
                                                                            <td>{{ $seller_payout_request->relationwithinvoice->payment }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Order Status:</th>
                                                                            <td>{{ $seller_payout_request->relationwithinvoice->order_status }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Total Amount:</th>
                                                                            <td>{{ $seller_payout_request->relationwithinvoice->total_price}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Commission (-{{ $seller_data->seller_commission }}%):</th>
                                                                            <td>{{ $seller_payout_request->relationwithinvoice->total_price * $seller_data->seller_commission/100 }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Request Amount:</th>
                                                                            <td>{{ $seller_payout_request->relationwithinvoice->total_price - $seller_payout_request->relationwithinvoice->total_price * $seller_data->seller_commission/100}}</td>
                                                                        </tr>
                                                                        @if ($seller_payout_request->relationwithinvoice->transactions_id)
                                                                            <tr>
                                                                                <th>Transactions ID:</th>
                                                                                <td>{{ $seller_payout_request->relationwithinvoice->transactions_id }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Vendor Payment Gateway:</th>
                                                                                <td>{{ $seller_payout_request->relationwithinvoice->vendor_payment_method }}</td>
                                                                            </tr>
                                                                        @endif
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        {{-- FIRST MODAL EMD --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer_script')
<script>
    $(document).ready(function () {
        $('#payout_request_table').DataTable();
    });
</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
@endsection
