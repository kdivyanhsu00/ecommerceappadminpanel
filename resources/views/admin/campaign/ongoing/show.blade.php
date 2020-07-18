@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="box">
        <div class="row">
            <div class="col-sm-5">
                <h3>Campaigning | On-going | <a style="color:#53004B;" href="">View Detail</a></h3>
            </div>
            <div class="col-sm-4">
                @if(!empty($winner))
                <p style="    color:black;
                    font-size: 21px;
                    margin-top: 21px;
                    border-left: 1px solid #ccc;
                    text-align: center;
                    font-weight: 800;">Winner announce at<a style="color:#53004B;font-size:17px;" href="">({{ $winner->created->format('M d Y') }})
                    </a></p>
                @endif
            </div>
            <div class="col-sm-3">
               @if(empty($winner) && $ongoing->tickets->isNotEmpty() && $ongoing->expireDate < $now)
                <a href="{{ url('admin/campaign/announce', [$ongoing->_id]) }}" class="btn btn-create-ad" style="margin-top: 21px; color:white;">
                Announce Winner
                </a>
                @endif
            </div>
        </div>
        <br>
    </div>
</section>
<section class="content-header">
    <div class="row">
        <div class="col-sm-3">
            <p>Buy a focus cap</p>
            <div class="boxed" style="    padding: 10px;  border-radius: 2px;
                border: solid 1px #53004b;">
                <img style="max-height: 169px;
                    width: 100%;" class="img-responsive" src="{{ $ongoing->product->productImageUrl ?? 'https://via.placeholder.com/150' }}">
            </div>
        </div>
        <div class="col-sm-6">
            <p>Get chance to win cash</p>
            <div class="boxed" style="  border-radius: 2px;
                border: solid 1px #53004b;    padding: 10px;">
                <div class="row">
                    <div class="col-sm-5">
                        <img class="img-responsive" src="{{ $ongoing->campaignUrl ?? 'https://via.placeholder.com/120' }}">
                    </div>
                    <div class="col-sm-7">
                        <h5>{{ strip_tags($ongoing->campaignDesEN) }}</h5>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <p>&nbsp;</p>
            <div class="boxed" style="  border-radius: 2px;
                border: solid 1px #53004b;    padding: 10px;">
                <h4><b>AED {{ $ongoing->soldOut }}</b></h4>
                <p>Product price per unit
                    included all tax
                </p>
                <h3 class="text-danger">{{ ($ongoing->isSoldOut == true) ? 'Sold Out' : '' }}</h3>
            </div>
        </div>
    </div>
</section>
<section class="content">
<div class="row">


<section class="content">
    <div class="container bg-w" style="width:100%">
    <div class="col-xs-12">
    <p><b>Order placed by</b></p>
    </div><br><br>
    <div class="row">
        @foreach($tickets as $ticket)
        <div class="col-sm-12">
            <div class="col-sm-1">
                <div class="cadd">
                    <img src="{{ $ticket->campaign->campaignUrl ?? '' }}" style="width:46px;height:46px;object-fit:contain;">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="cadd">
                    <span style="font-size:18px;font-weight:bold;color:#1b1b1b">{{ $ticket->user->full_name ?? '' }}&nbsp;</span>
                    <p>{{ $ticket->user->email ?? '' }}</p>
                </div>
            </div>
            <div class="col-sm-2"style="border-left:1px solid rgba(0, 0, 0, 0.16);">
                <div class="cadd">
                    <span style="font-size:18px;font-weight:bold;color:#1b1b1b">Order Type</span>
                    <p>{{ ($ticket->isCharity == true) ? 'Donating this item' : 'User pickup' }}</p>
                </div>
            </div>
            <div class="col-sm-3"style="border-left:1px solid rgba(0, 0, 0, 0.16);">
                <div class="cadd">
                    <span style="font-size:18px;font-weight:bold;color:#1b1b1b">Ticket Unit</span>
                    <p>{{ $ticket->ticketCount }}</p>
                </div>
            </div>
            <div class="col-sm-3"style="border-left:1px solid rgba(0, 0, 0, 0.16);">
                <div class="cadd">
                    <span style="font-size:18px;font-weight:bold;color:#1b1b1b">Ticket Number</span>
                    <p>{{ $ticket->ticketNumber }}</p>
                </div>
            </div>
            <!-- /.col -->
        </div>
        @endforeach
        <!-- /.row -->
        <div class="pull-right">
            {{ $tickets->links() }}
        </div>
    </div>
</section>
@endsection