@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="box">
    <div class="row">
    <div class="col-sm-4">
        <h3 class="ml-2">Manage users | <a style="color:#53004B;" href="">View </a></h3>
        
    </div>
</section>
<section class="content">
    <div class="container bg-w" style="width:100%">
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-1">
                <div class="cadd">
                    @if($user->userimage)
                    <img src="{{ $user->userimage }}" style="object-fit:contain;" class="img-circle" width="75" height="75">
                    @else
                    <img src="https://via.placeholder.com/75" style="object-fit:contain;" class="img-circle">
                    @endif
                </div>
            </div>
            <div class="col-sm-3">
                <div class="cadd">
                    <span style="font-size:18px;font-weight:bold;color:#53004B">{{ $user->first_name }}</span>
                    <p>{{ $user->mobile}}<br>{{ $user->email}}</p>
                </div>
            </div>
            <div class="col-sm-2"style="border-left:1px solid rgba(0, 0, 0, 0.16);">
                <div class="cadd">
                    <span style="font-size:18px;font-weight:bold;color:#53004B">Registration Date</span>
                    <p>{{ $user->created->format('m/d/Y')}} </p>
                </div>
            </div>
            <div class="col-sm-2"style="border-left:1px solid rgba(0, 0, 0, 0.16);">
                <div class="cadd">
                    <span style="font-size:18px;font-weight:bold;color:#53004B">User Level</span>
                    <p>{{ $user->orders->count() }}</p>
                </div>
            </div>
            <div class="col-sm-2"style="border-left:1px solid rgba(0, 0, 0, 0.16);border-right:1px solid rgba(0, 0, 0, 0.16);">
                <div class="cadd">
                    <span style="font-size:18px;font-weight:bold;color:#53004B">Points<img src="{{ asset('img/coin.png')}}" style="width:20px;height:20px;object-fit:contain;"></span>
                    <p>{{ $user->tickets->sum('points') }}</p>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="cadd">
                    @if(!$user->isBlock)
                    <a class="btn block" data-toggle="modal" data-target="#modal-block" href="" data-action="{{ url('admin/user/block', $user)}}" data-status="1" data-message="Block" style="margin-top: 10px;color:white;background-color:red;border:none;">Block</a>
                    @else
                    <a class="btn btn-create-ad block" data-toggle="modal" data-target="#modal-block" href="" data-action="{{ url('admin/user/block', $user)}}" data-status="0" data-message="Unblock" style="margin-top: 10px;color:white;background-color:red;border:none;">Unblock</a>
                    @endif
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <hr>
    <div class="row">
    <div class="col-xs-12">
            <div class="col-sm-4">
                <div class="cadd">
                    <span style="font-size:22px;font-weight:bold;color:#53004B">Order Details:</span>
                </div>
            </div>
            <div class="col-sm-5">
                <div class="cadd">
                    <span style="font-size:22px;font-weight:bold;color:#1b1b1b">Total Order | <a style="color:hsl(120, 99%, 48%);" href="">{{$orderCount}} </a></span>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="cadd">
                    <label>Service Filter by Date: </label>
                    <div class="input-group date pre-datepicker" data-date-format="dd-mm-yyyy">
                        <input class="form-control calander" type="text" readonly value="{{ $date->format('d-m-Y') }}" />
                        <span class="input-group-addon"><img src="{{ asset('img/cal.svg')}}" style="height:20px;object-fit:contain;"></span>
                    </div>
                </div>
            </div>
            <!-- /.col -->
        </div>
        </div>
        <!-- /.row -->
        <hr>
        <div class="row">
        @forelse($orders as $order)
        <div class="col-sm-12">
            <div class="col-sm-2">
                <div class="cadd">
                    <span style="font-size:18px;font-weight:bold;color:#53004B">Order Info:</span>
                    <p>Date : {{ $order->created->format('m/d/Y') }}</p>
                    <p>Time : {{ $order->created->format('h:i A') }}</p>
                
                </div>
            </div>
            <div class="col-sm-2" style="border-left:1px solid rgba(0, 0, 0, 0.16);">
                <div class="cadd">
                    <img src="{{ $order->campaign->campaignUrl ?? '' }}" style="width:100px;height:90px;object-fit:contain;border-left:1px solid rgba(0, 0, 0, 0.16);" class="img-circle">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="cadd">
                    <span style="font-size:18px;font-weight:bold;color:#53004B; ">Order Detail:</span>
                    <p>{{ $order->campaign->campaignsPrize/100 }}</p>
                    <p>{{ $order->campaign->campaignLabelEN }}</p>
                    <p><b>{{ $order->campaign->campaignsPrize/100 }}</b></p>
                    <p>{{ $order->campaign->ticket }} tickets <a>per unit</a></p>
                   
                </div>
            </div>
            <div class="col-sm-2"style="border-left:1px solid rgba(0, 0, 0, 0.16);">
                <div class="cadd">
                    <h3 style="font-weight:bold;font-size:14px;color:black;"
                        >Total product: <a> {{ $order->totalProdcut }}</a></h3>
                    
                    <h3 style="font-weight:bold;font-size:14px;color:black;"
                        >Total tickets: <a> {{ $order->ticketCount }}</a></h3>
                    
                    <h3 style="font-weight:bold;font-size:14px;color:black;"
                        >Points earns: <a>{{ $order->campaign->points }}</a></h3>
                    <br><br>
                </div>
            </div>
            <div class="col-sm-2"style="border-left:1px solid rgba(0, 0, 0, 0.16);">
                <div class="cadd">
                    <h3 style="font-weight:bold;font-size:22px;color:#525d65;"
                        >Grand Total</h3>
                    
                    <h3 style="font-weight:bold;font-size:14px;color:#ae8435;"
                        >US$ {{ $order->campaign->campaignsPrize/100 }}</h3>
    
                    <h3 style="font-weight:bold;font-size:10px;color:
                        #525d65;"
                        >Inclusive of 5% VAT </h3>
                    <br>
                </div>
            </div>
            </div>
            <!-- /.row -->
            @empty
            <div class="row">
                <div class="col-sm-3">
                    <div class="cadd" style="margin-left: 30px;">No record found</div>
                </div>    
            </div>    
            @endforelse
            <!-- /.col -->
            <div class="pull-right">
                {{ $orders->appends(request()->input())->links() }}
            </div>
        </div>
    </div>
</section>

@include('admin.partials.block')
<!-- <script type="text/javascript">
    $("#modal-block").on("show.bs.modal", function(e){
      var t=$(e.relatedTarget),
      n=$(this),
      i=t.data("action")||n.find("form").attr("action"),
      status=t.data("status"),
      a=t.data("message")||"this record",
      o=t.data("return-url")||"";
      n.find("form").attr("action",i),n.find('input[name="return_url"]').val(o),
      n.find(".message").html(a),
      n.find("#status").val(status);
  });
</script> -->
@endsection