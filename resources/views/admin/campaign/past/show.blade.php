@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="box">
        <div class="row">
            <div class="col-sm-4">
                <h3>Campaigning | Past | <a style="color:#53004B;" href="">View Detail</a></h3>
            </div>
            @if(!empty($winner))
            <div class="col-sm-3">
                
                <p style="color:black;
                    font-size: 17px;
                    margin-top: 21px;
                    border-left: 1px solid #ccc;
                    text-align: right;
                    font-weight: 800;">And the Winner is </p>
                
            </div>
             <div class="col-sm-3" style="margin-top: 10px;">
                <div class="col-sm-3">
                    <img src="{{ $winner->user->userimage ?? '' }}" style="width:46px;height:46px;object-fit:contain;">
                </div>
                <div class="col-sm-9">
                    <a style="font-size:18px;font-weight:bold;color:#1b1b1b" href="javascript:;">{{ $winner->user->full_name ?? '' }}&nbsp;</a>
                    <p>{{ $winner->user->email ?? '' }}</p>
                </div>
            </div>
            <div class="col-sm-2" style="margin-top:20px; ">
               {{ (!empty($winner->created) && $winner->created) ? $winner->created->format('M d Y H:i A') : '' }}
            </div>
            @endif
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
                    width: 100%;" class="img-responsive" src="{{ $past->product->productImageUrl ?? 'https://via.placeholder.com/150' }}">
            </div>
        </div>
        <div class="col-sm-6">
            <p>Get chance to win cash</p>
            <div class="boxed" style="  border-radius: 2px;
                border: solid 1px #53004b;    padding: 10px;">
                <div class="row">
                    <div class="col-sm-5">
                        <img class="img-responsive" src="{{ $past->campaignUrl ?? 'https://via.placeholder.com/120' }}">
                    </div>
                    <div class="col-sm-7">
                        <h5>{{ strip_tags($past->campaignDesEN) }}</h5>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <p>&nbsp;</p>
            <div class="boxed" style="  border-radius: 2px;
                border: solid 1px #53004b;    padding: 10px;">
                <h4><b>AED {{ $past->soldOut }}</b></h4>
                <p>Product price per unit
                    included all tax
                </p>
                <h3 class="text-danger">{{ ($past->isSoldOut == true) ? 'Sold Out' : '' }}</h3>
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