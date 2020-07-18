@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="box">
        <div class="row">
            <div class="col-sm-9">
                <h style="color:black;font-size:25px;font-weight:bold;font-family:Roboto;font-weight:500;font-stretch:normal;font-style:normal;line-height:1.4;letter-spacing:normal;text-align:left;width:121px;height:25px;margin-top:20px;"
                    ><br>Product List | View Product</h>
            </div>
        </div>
        <br>
    </div>
</section>

<section class="content">
        <div class="container bg-w">
            <div class="row">
                <div class="col-sm-6">
                    <div class="cadd">
                        <div class="form-group">
                            <label>Product Title (EN): </label>
                            <div class="">
                            {{ $product->productNameEN }}
                            </div>
                        </div>
                    </div>

                    <div class="cadd">
                        <div class="form-group">
                            <label>Product Title (AR): </label>
                            <div class="">
                            {{ $product->productNameAR }}
                            </div>
                        </div>
                    </div>

                    <div class="cadd">
                        <div class="form-group">
                            <label>Product Price: </label>
                            <div class="">
                            {{ $product->productPrice }}
                            </div>
                        </div>
                    </div>

                    <div class="cadd">
                        <div class="form-group">                   
                            <label> Price details (EN): </label>
                            <div class="">
                            {{ $product->productDetailDesEN }}
                            </div>
                        </div>
                    </div>

                    <div class="cadd">
                        <div class="form-group">                   
                            <label> Price details (AR): </label>
                            <div class="">
                            {{ $product->productDetailDesAR }}
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="cadd">
                        <div class="form-group">
                            <label> Product Image</label>
                            <div class="">
                                <img src="{{ $product->productImageUrl ?? 'https://via.placeholder.com/150' }}" style="object-fit:contain;" width="150" height="150">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col -->
    <!-- /.row --></div>
</section>
@endsection