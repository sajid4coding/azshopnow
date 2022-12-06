@extends('layouts.vendor_master')
@section('header_css')
<style>
    input {
    border: 2px solid #333;
    border-radius: 5px;
    color: #333;
    font-size: 32px;
    margin: 0 0 20px;
    padding: .5rem 1rem;
    width: 100%;

    }
</style>
@endsection
@section('vendor_body_content')
<div class="col-lg-9">
    {{-- ATTRIBUTE START --}}
        <h4 class="my-3">Product Name: {{ $product->product_title }}</h4>
        <div class="row">
            @if (session('add_inventory'))
                <div class="alert alert-primary" role="alert">
                    {{ session('add_inventory') }}
                </div>
            @endif
            @if (session('delete_inventory'))
                <div class="alert alert-danger" role="alert">
                    {{ session('delete_inventory') }}
                </div>
            @endif
            @foreach ($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                {{ $error }}
            </div>
            @endforeach
            <div class="col-6">
                <form action="{{ route('add_inventory', $product->id) }}" method="POST">
                    @csrf
                    <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Add Size Attribute</h6>
                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="size">
                            <option value="">- Select Size Attribute -</option>
                            @foreach ($attributesizes as $attributesize)
                                <option value="{{ $attributesize->id }}">{{ $attributesize->size }}</option>
                            @endforeach
                        </select>
                        <h6 class="card-title mt-4">Add Color Attribute</h6>
                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="color">
                            <option value="">- Select Color Attribute -</option>
                            @foreach ($attributecolors as $attributecolor)
                                <option value="{{ $attributecolor->id }}">{{ $attributecolor->color_name }}</option>
                            @endforeach
                        </select>
                        <h6 class="card-title mt-4">Quantity<span class="text-danger">*</span></h6>
                        <input class="form-control" type="number" name="quantity">
                        <h6>Enter Piece Amount</h6>
                        {{-- <input class="form-control" type="text" name="price" id="currency-field" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" placeholder="$1,000,000.00"> --}}
                        <input class="form-control" type="text" name="price"  placeholder="$1,000,000.00">
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary m-3 py-2 px-3">Add Attribute</button>
                        </div>
                    </div>
                    </div>
                </form>
            </div>
            <div class="col-6">
                <div class="card text-start">
                  <div class="card-body">
                    <h6 class="card-title">Size Attributes</h6>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Size</th>
                                <th>Color</th>
                                <th>Quantity</th>
                                <th>$ Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($inventories as $inventory)
                                <tr>
                                    <td>
                                        @if ($inventory->size)
                                            {{ $inventory->relationwithsize->size }}
                                        @else
                                            <span class="text-muted">None</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($inventory->color)
                                            {{ $inventory->relationwithcolor->color_name }}
                                            <input disabled class="form-control" type="color" value="{{ $inventory->relationwithcolor->color }}">
                                        @else
                                            <span class="text-muted">None</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $inventory->quantity }}
                                    </td>
                                    <td>
                                        @if ($inventory->price)
                                            {{ $inventory->price }}
                                        @else
                                            @if ($product->discount_price)
                                                {{$product->discount_price}}
                                            @else
                                                {{$product->product_price}}
                                            @endif
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('attributes.destroy', $inventory->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <a href="{{ route('delete_inventory', $inventory->id) }}" class="text-danger" style="border: none"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="50" class="text-center">
                                        <span class="text-danger">No Data Available</span>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                  </div>
                </div>
            </div>
        </div>
    {{-- ATTRIBUTE END --}}
</div>
@endsection
@section('footer_script')
    <script>
        // Jquery Dependency

        $("input[data-type='currency']").on({
            keyup: function() {
            formatCurrency($(this));
            },
            blur: function() {
            formatCurrency($(this), "blur");
            }
        });


        function formatNumber(n) {
        // format number 1000000 to 1,234,567
        return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
        }


        function formatCurrency(input, blur) {
        // appends $ to value, validates decimal side
        // and puts cursor back in right position.

        // get input value
        var input_val = input.val();

        // don't validate empty input
        if (input_val === "") { return; }

        // original length
        var original_len = input_val.length;

        // initial caret position
        var caret_pos = input.prop("selectionStart");

        // check for decimal
        if (input_val.indexOf(".") >= 0) {

            // get position of first decimal
            // this prevents multiple decimals from
            // being entered
            var decimal_pos = input_val.indexOf(".");

            // split number by decimal point
            var left_side = input_val.substring(0, decimal_pos);
            var right_side = input_val.substring(decimal_pos);

            // add commas to left side of number
            left_side = formatNumber(left_side);

            // validate right side
            right_side = formatNumber(right_side);

            // On blur make sure 2 numbers after decimal
            if (blur === "blur") {
            right_side += "00";
            }

            // Limit decimal to only 2 digits
            right_side = right_side.substring(0, 2);

            // join number by .
            input_val = "$" + left_side + "." + right_side;

        } else {
            // no decimal entered
            // add commas to number
            // remove all non-digits
            input_val = formatNumber(input_val);
            input_val = "$" + input_val;

            // final formatting
            if (blur === "blur") {
            input_val += ".00";
            }
        }

        // send updated string to input
        input.val(input_val);

        // put caret back in the right position
        var updated_len = input_val.length;
        caret_pos = updated_len - original_len + caret_pos;
        input[0].setSelectionRange(caret_pos, caret_pos);
        }
    </script>
@endsection









