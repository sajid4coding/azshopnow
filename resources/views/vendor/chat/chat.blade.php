@extends('layouts.vendor_master')
@section('vendor_css')
<style>
.chat-online {
    color: #34ce57
}
.chat-offline {
    color: #e4606d
}
.chat-messages {
    display: flex;
    flex-direction: column;
    max-height: 300px;
    overflow-y: scroll
}

.chat-message-left,
.chat-message-right {
    display: flex;
    flex-shrink: 0
}

.chat-message-left {
    margin-right: auto
}

.chat-message-right {
    flex-direction: row-reverse;
    margin-left: auto
}

.border-top {
    border-top: 1px solid #dee2e6!important;
}
.font_size_small{
    font-size: 13px !important;
}
</style>
@endsection
@section('vendor_body_content')
  <div class="col-lg-9 col-md-9">
    <main class="content">
        <div class="container p-0">

            {{-- <h1 class="h3 m-3">Messages</h1> --}}

              @livewire('vendor-message')
        </div>
    </main>
  </div>
@endsection
