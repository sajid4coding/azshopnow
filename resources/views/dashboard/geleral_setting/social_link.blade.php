@extends('layouts.dashboardmaster')
@section('header_css')

@endsection
@section('content')
<div class="container">
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Social Link</h1>
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
                    <li class="breadcrumb-item text-muted">Social</li>
                    <!--end::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Link</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
        </div>
        <!--end::Toolbar container-->
    </div>
    <div class="row">
      <div class="col-lg-5 m-auto">

        <div class="card p-5">
            @if (session('social_add_message'))
                <div class="alert alert-primary" role="alert">
                    <strong>{{ session('social_add_message') }}</strong>
                </div>
            @endif
            @if (session('social_delete'))
                <div class="alert alert-danger" role="alert">
                    <strong>{{ session('social_delete') }}</strong>
                </div>
            @endif
            <form action="{{ route('general.social.link.post') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="input-group mb-5">
                    <span class="input-group-text">Social Name</span>
                    <input type="text" class="form-control"  placeholder="name" name="social_name">
                </div>
                @error('social_name')
                  <p class="text-danger mb-5">{{ $message }}</p>
                @enderror
                <div class="input-group mb-5">
                    <span class="input-group-text">Social Link</span>
                    <input type="url"class="form-control" placeholder="url" name="social_link" >
                </div>
                @error('social_link')
                <p class="text-danger mb-5">{{ $message }}</p>
              @enderror

                <div class="input-group mb-5">
                    <span class="input-group-text">Social Icon</span>
                    <input type="text" class="form-control social_icon"  placeholder="icon" name="social_icon">
                </div>
                <div>
                    <!-- php code start -->
                    <div class="card m-1 mt-5" style="background-color:#dbdbdb; border-color:darkblue;">
                         <div class="card-body">
                           <h4 class="card-title">Choose Your Icon</h4>
                            <div class="over_flow_hiden" style="overflow-y:scroll;height:180px;">
                               <?php foreach(fonts() as $icons): ?>
                                   <span class="badge badge-dark m-1 icon_slc_btn" id="<?=$icons?>">
                                   <i style='font-size:16px' class="fa-1x <?=$icons?>"></i>
                               </span>
                             <?php endforeach;?>
                          </div>
                         </div>
                    </div>
                      <!-- php code end -->
                 </div>
                 <h2>Or</h2>
                 <div class="input-group mb-1">
                    <span class="input-group-text">Social Image</span>
                    <input type="file" class="form-control" placeholder="title" name="social_image" >
                </div>
                <p class="text-danger mb-5">This image maximum 50px*50px </p>
                @error('social_image')
                   @if ($message == 'The social image field is required.')
                      <p class="text-danger mb-5">If icon have missing then social image field is required.</p>
                   @else
                      <p class="text-danger mb-5">{{ $message }}</p>
                   @endif
                @enderror
                <div class="input-group mb-5">
                    <span class="input-group-text">Icon Background Color</span>
                    <input type="color"  style="height: 62px !important;"  class="form-control"  name="icon_bg_color">
                </div>


                <button type="submit" class="btn btn-primary mt-5">Add Link</button>
            </form>
        </div>
      </div>
      <div class="col-lg-7">

        <div class="card p-5">
            @if(session('slider_delete'))
            <p class="text-light bg-success p-3 rounded">{{ session('slider_delete') }}</p>
            @endif
          <table class="table">

              <thead>
                <tr>
                  <th scope="col"><b> SL.</b></th>
                  <th scope="col"><b> Icon Name</b></th>
                  <th scope="col"><b> Icon</b></th>
                  <th scope="col"><b> Bg Color</b></th>
                  <th scope="col"><b> Image</b></th>
                  <th scope="col"><b> Url</b></th>
                  <th scope="col"><b> Action</b></th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($socials as $social)
                    <tr>
                      <th scope="row">{{$loop->index + 1}}</th>
                      <td>{{ $social->social_name }}</td>
                      <td> <i class="{{ $social->social_icon }}"></i></td>
                      <td> <span style="width: 20px;height:20px;background:{{ $social->icon_bg_color }};padding:5px;color:white">{{ $social->icon_bg_color }}</span></td>
                      <td> <img width="40px" src="{{ asset('uploads/social_image') }}/{{$social->social_image }}" alt="{{$social->social_image}}"></td>
                      <td>{{ $social->social_link }}</td>
                      <td>
                          <a href="{{route('general.social.edit',$social->id)}}" ><i style="color: blue !important;" class="fas fa-edit"></i></a>
                          <a href="{{ route('general.social.delete',$social->id) }}"><i  style="color: red !important;margin-left:5px" class="fas fa-trash-alt"></i></a>
                      </td>
                    </tr>
                  @endforeach



              </tbody>
            </table>
        </div>
      </div>
    </div>
</div>
@endsection
@section('footer_script')
<script>

    $(document).ready(function(){
        $('.icon_slc_btn').click(function(){
             $('.social_icon').val($(this).attr('id'));
        })
    })
</script>
@endsection
