@extends('layouts.customermaster')
@section('customermasert_body')
<div class="tab-pane  active text-center" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
    <h5>Welcome to Account</h5>
<div class="card">
<div class="card-body">
<div class="row">
        <h3 class="text-center">My Order chart</h3>
    {{-- <hr> --}}
    <div class="col-6">
        <canvas id="myChart"></canvas>
    </div>
    <div class="col-6">
        <canvas id="myChart1"></canvas>
    </div>
</div>
</div>
</div>
</div>
@endsection
