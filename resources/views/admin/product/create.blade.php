@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="box">
        <div class="row">
            <div class="col-sm-7">
                <h style="color:black;font-size:22px;font-weight:bold;font-family:Roboto;font-weight:500;font-stretch:normal;font-style:normal;line-height:1.4;letter-spacing:normal;text-align:left;width:121px;height:25px;margin-top:20px;">
                    <br>Product List | Add New Product
                </h>
            </div>
        </div>
        <br>
    </div>
</section>
<section class="content">
    <div class="container bg-w">
        <div class="row">
          <form method="post" action="{{ route('product.store') }}" enctype="multipart/form-data" id="product-form">
            @csrf
            <div class="col-sm-6">
                    <div class="form-group">
                        <div class="col-sm-6">
                            <div class="cadd">
                                <label class="label" style="text-align: left;">Product Title(English)</label>
                                <input type="text" name="productDetailTitleEN" class="input form-control" style="border-color:#53004B;" placeholder="Type here" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="cadd">
                                <label class="label" style="text-align: left;"> Product Title(Arabic)</label>
                                <input type="text" name="productDetailTitleAR" class="input form-control" style="border-color:#53004B;" placeholder="Type here" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <div class="cadd">
                                <label class="label" style="text-align: left;">Product Price</label>
                                <input type="text"  name="productPrice" class="input form-control" style="border-color:#53004B;" placeholder="Type here" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            
                        </div>
                    </div>
                    
                    <br>
                    <div class="col-sm-12">
                        <div class="cadd">
                            <label class="label" style="text-align: left;"> Product details(English)</label>
                            <textarea class="form-control ckeditor"  style="border-color:#53004B;" name="productDetailDesEN"required></textarea>
                        </div>
                        <br>
                        <div class="cadd">                      
                            <label class="label" style="text-align: left;"> Product details(Arabic)</label>
                            <textarea class="form-control ckeditor"  style="border-color:#53004B;" name="productDetailDesAR" required></textarea>
                        </div>
                    </div>
                    <div class="cadd">
                    </div>
            </div>
            <div class="col-sm-5">
            <div class="cadd">
            <label class="label"> Product Image</label>
            <div class="form-control drag">
            <input type="file" name="image" id="select-img" style="border-color:#53004B;" required><p>Add  Product Image+ </p>
            </div>
            <br>
            <div class="progress hide">
              <div class="progress-bar" role="progressbar" aria-valuenow="70"
              aria-valuemin="0" aria-valuemax="100" style="width:70%">
                <span class="sr-only">70% Complete</span>
              </div>
            </div>
            <img src="" id="img-preview" width="150px" class="hide" />
            <br>
            <br>
            </div>
            <div class="cadd">
            <center> <input type="submit" class="btn btn-submit" value="Create"></center>
            </div>
            </div>
      </form>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row --></div>
</section>
@endsection