@extends('layouts/frontendmaster')
@section('header_css')
@yield('customermasert_css')
@endsection
@section('content')
  <!-- main-area -->
  <main>
    <!-- breadcrumb-area -->
    <section class="breadcrumb-area-four breadcrumb-bg vendor-profile-breadcrumb" style='background: url(@if (auth()->user()->banner)  {{ asset('uploads/banner_img') }}/{{ auth()->user()->banner }}  @else https://www.cohesity.com/wp-content/new_media/2021/03/demo-days-lp-banner.png @endif) no-repeat center;background-size:cover;''>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="store-product">
                        <div class="store-thumb" style="overflow: hidden">
                            {{-- https://pondokindahmall.co.id/assets/img/default.png --}}
                            @if (auth()->user()->profile_photo)
                               <img  src="{{ asset('uploads/profile_photo') }}/{{ auth()->user()->profile_photo }}" alt="img">
                            @else
                               <img src="https://pondokindahmall.co.id/assets/img/default.png" alt="img">
                            @endif
                        </div>
                        <div class="store-content">
                            <span class="verified">Verified <i class="fa-solid fa-crown"></i></span>
                            @if (auth()->user()->shop_name)
                            <h2 class="title">  {{ auth()->user()->shop_name }} </h2>
                            <ul>
                                <li class="customer">Owner Name : <span style="color: #FF4800 !important;padding-left:10px;font-size:1.2rem">{{ auth()->user()->name }}</span> </li>
                            </ul>
                            @else
                            <h2 class="title">  {{ auth()->user()->name }} </h2>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="breadcrumb-list">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-content">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Customer setting</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

                {{-- PHP Code Start --}}
                @php
                    $url = explode('/',url()->current());
                    $current_page = end($url);
                @endphp
                {{-- PHP Code End --}}
                <div class="container  my-5">
                    <div class="row my-5">
                        <div class="col-lg-3 account_menu " style="margin: 100px 0 100px 0;">
                            <ul class="form">
                              <li class="@if ($current_page == 'customerhome') selected @endif"><a class="profile" href="{{ route('customerhome') }}"><i class="fas fa-columns"></i>Dashboard</a></li>
                                <li class=" @if ($current_page == 'details') selected @endif"><a class="messages" href="{{ route('customer.account.details') }}"><i class="fas fa-user"></i> Profile </a></li>
                                  <li class="@if ($current_page == 'invoice') selected @endif"><a class="settings" href="{{ route('customer.invoice.details') }}"><i class="fas fa-file-invoice"></i> Orders</a></li>
                                  <li class="@if ($current_page == 'product-review-list') selected @endif"><a class="review" href="{{ route('product.review.list') }}"><i class="fas fa-file-invoice"></i>Reviews</a></li>
                                  <li class="@if ($current_page == 'chat-with-vendor') selected @endif"><a class="chat" href="{{ route('customer.chat.vendor') }}"><i class="fas fa-comments"></i>Messanger</a></li>
                                  <li class="@if ($current_page == 'list-ofreturn-product') selected @endif"><a class="chat" href="{{ route('listreturn.product') }}"><i class="fas fa-comments"></i>Return Products</a></li>
                                     <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                         <div class="">
                                      <a  href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="logout"><i class="fas fa-sign-out"></i> Sign Out</a>
                                    </div>
                                 </form>
                               </li>
                            </ul>
                         </div>
                        <style>
                            ul.form {
                                position:relative;
                                background:#fff;
                                width:250px;
                                margin:auto;
                                padding:0;
                                list-style: none;
                                overflow:hidden;

                                -webkit-border-radius: 5px;
                                -moz-border-radius: 5px;
                                border-radius: 5px;

                                -webkit-box-shadow: 1px 1px 10px rgba(0, 0, 0, 0.1);
                                -moz-box-shadow: 1px 1px 10px rgba(0, 0, 0, 0.1);
                                box-shadow:  1px 1px 10px rgba(0, 0, 0, 0.1);
                            }

                            .form li a {
                                width:225px;
                                padding-left:20px;
                                height:50px;
                                line-height:50px;
                                display:block;
                                overflow:hidden;
                                position:relative;
                                text-decoration:none;
                                text-transform:uppercase;
                                font-size:14px;
                                color:#686868;

                                -webkit-transition:all 0.2s linear;
                                -moz-transition:all 0.2s linear;
                                -o-transition:all 0.2s linear;
                                transition:all 0.2s linear;
                            }

                            .form li a:hover {
                                background:#efefef;
                            }

                            .form li a.profile {
                                border-left:5px solid #008747;
                            }
                            .form li a.messages {
                                    border-left:5px solid #000a99;
                            }

                            .form li a.settings {
                                    border-left:5px solid #cf2130;
                            }
                            .form li a.review {
                                    border-left:5px solid #fecf54;
                            }
                            .form li a.chat {
                                    border-left:5px solid #4b84ff;
                            }
                            .form li a.logout {
                                    border-left:5px solid #dde2d5;
                            }

                            .form li:first-child a:hover, .form li:first-child a {
                                -webkit-border-radius: 5px 5px 0 0;
                                -moz-border-radius: 5px 5px 0 0;
                                border-radius: 5px 5px 0 0;
                            }

                            .form li:last-child a:hover, .form li:last-child a {
                                -webkit-border-radius: 0 0 5px 5px;
                                -moz-border-radius: 0 0 5px 5px;
                                border-radius: 0 0 5px 5px;
                            }

                            .form li a:hover i {
                                color:#ea4f35;
                            }

                            .form i {
                                margin-right:15px;

                                -webkit-transition:all 0.2s linear;
                                -moz-transition:all 0.2s linear;
                                -o-transition:all 0.2s linear;
                                transition:all 0.2s linear;
                            }

                            .form em {
                                font-size: 10px;
                                background: #ea4f35;
                                padding: 3px 5px;
                                -webkit-border-radius: 10px;
                                -moz-border-radius: 10px;
                                border-radius: 10px;
                                font-style: normal;
                                color: #fff;
                                margin-top: 17px;
                                margin-right: 15px;
                                line-height: 10px;
                                height: 10px;
                                float:right;
                            }

                            .form li.selected a {
                                background:#efefef;
                            }

                        </style>


                        <div class="col-lg-9">
                        <div class="tab-content bg-light p-3" id="v-pills-tabContent">
                                  @yield('customermasert_body')
                            </div>
                        </div>
                    </div>
                </div>


            </div>
@endsection

@section('footer_script')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  	// $(document).ready(function() {
	// 	$('ul.form li a').click(
	// 		function(e) {
	// 			e.preventDefault(); // prevent the default action
	// 			e.stopPropagation; // stop the click from bubbling
	// 			$(this).closest('ul').find('.selected').removeClass('selected');
	// 			$(this).parent().addClass('selected');
	// 		});
	// });
</script>
<script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'pie',
    data: {
      labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
      datasets: [{
        label: '# of Votes',
        data: [12, 19, 3, 5, 2, 3],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx1 = document.getElementById('myChart1');

  new Chart(ctx1, {
    type: 'pie',
    data: {
      labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
      datasets: [{
        label: '# of Votes',
        data: [12, 19, 3, 5, 2, 3],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>

@endsection



