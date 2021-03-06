@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="box">
        <div class="row">
            <div class="col-sm-7">
                <h style="color:black;font-size:22px;font-weight:bold;font-family:Roboto;font-weight:500;font-stretch:normal;font-style:normal;line-height:1.4;letter-spacing:normal;text-align:left;width:121px;height:25px;margin-top:20px;"
                    ><br>Campaigning | Coming Soon | Update Campaign</h>
            </div>
        </div>
        <br>
    </div>
</section>

<section class="content">
    <div class="container bg-w" style="width:100%">
        <form action="{{ route('upcoming.update', $upcoming)}}" method="POST" enctype="multipart/form-data">
        <input name="_method" type="hidden" value="PATCH"> 
        @csrf
            <input type="hidden" name="url" id="campaign_url" value="{{ route('upcoming.edit', $upcoming->_id)}}">
            <div class="form-group">
                @include('admin.campaign.upcoming.form')
            <br>    
            <div class="row">
                <div class="cadd">
                    <center> <input type="submit" class="btn btn-submit" value="Update"></center>
                </div>
            </div>
        </div>
        <!-- /.col -->
    </div>
  </form>
    <!-- /.row --></div>
</section>
@endsection