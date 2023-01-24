@extends('layouts.dashboardmaster')
@section('content')
<div class="container">
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6 px-0" >
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack px-5">
            <!--begin::Page title-->
            <div class="page-title flex-wrap p-0 m-0">
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Earning</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted">Subscription Earning</li>
                    <!--end::Item-->

                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
        </div>
        <!--end::Toolbar container-->
    </div>
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">

        <!--end::Toolbar-->
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <!--begin::Products-->
                <div class="card card-flush p-5">
                    <!--begin::Card body-->
                    <div class="card-body p-5">
                           <div class="card p-5 total_earning_of_subscription text-center">

                              <h6>Total Earnings : <span class="text-primary pl-5">
                                @php
                                    $price = null;
                                @endphp
                                @foreach ($subscriptions as $subscription)
                                  @php
                                   $price += DB::table('plans')->where('id',$subscription->name)->first()->price;
                                  @endphp
                                @endforeach
                                ${{ $price }}
                                <br>

                                </span>
                              </h6>
                              <h6>Current Month Earning: <span class="text-primary pl-5">
                                @php
                                    $CurrentMonthPrice = null;
                                @endphp
                                @foreach ($subscriptions as $subscription)
                                  @php
                                   if(date('m') == $subscription->created_at->format('m') && date('y') == $subscription->created_at->format('y')){
                                       $CurrentMonthPrice += DB::table('plans')->where('id',$subscription->name)->first()->price;
                                   }
                                  @endphp
                                @endforeach
                                ${{ $CurrentMonthPrice }}
                                </span>
                              </h6>
                              <h6>Current Year Earning : <span class="text-primary pl-5">
                                @php
                                    $CurrentYearPrice = null;
                                @endphp
                                @foreach ($subscriptions as $subscription)
                                  @php
                                   if(date('y') == $subscription->created_at->format('y')){
                                       $CurrentYearPrice += DB::table('plans')->where('id',$subscription->name)->first()->price;
                                   }
                                  @endphp
                                @endforeach
                                ${{ $CurrentYearPrice }}
                                </span>
                              </h6>

                           </div>
                        <!--begin::Table-->
                        <div id="kt_ecommerce_sales_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="table-responsive">
                                <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" id="tax_datatable">
                                    <thead>
                                        <tr>
                                            <th>User ID</th>
                                            <th>Name</th>
                                            <th>Transaction Id</th>
                                            <th>Plan</th>
                                            <th>Amount</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subscriptions as $subscription)
                                            <tr class="odd">
                                                <!--begin::Order ID=-->
                                                    <td data-kt-ecommerce-order-filter="order_id">
                                                        #{{ $loop->index+1 }}
                                                    </td>
                                                    <td>
                                                       {{ DB::table('users')->where('id',$subscription->user_id)->first()->name }}
                                                    </td>
                                                    <td>
                                                        {{ $subscription->stripe_id }}
                                                     </td>
                                                    <td>
                                                        {{ DB::table('plans')->where('id',$subscription->name)->first()->name }}
                                                    </td>
                                                    <td>
                                                        ${{ DB::table('plans')->where('id',$subscription->name)->first()->price }}
                                                    </td>
                                                    <td>
                                                       {{ $subscription->created_at->format('d-m-Y') }}
                                                    </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Products-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
</div>
@endsection
@section('footer_script')
<script>
    $(document).ready(function () {
        $('#tax_datatable').DataTable();
    });
</script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
<script>
    @if (session('delete_success'))

            const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
        })

        Toast.fire({
        icon: 'success',
        title: 'Successfully deleted a invoice history'
        })
    @endif

</script>
@endsection
