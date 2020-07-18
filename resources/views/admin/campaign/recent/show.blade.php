@extends('layouts.app')

@section('content')
<section class="content">
    <div class="box">
        <div class="row">
            <div class="col-sm-5">
                <h3>Campaigning | Recent | <a style="color:#53004B;" href="">View Detail</a></h3>
            </div>
            
        </div>
        <div class="row">
            <div class="col-sm-3">
                <h4 class="heading">Choose the Winner in list</h4>
            </div>
            <div class="col-sm-4">
                <form class="form" id="searchBar" action="">
                    <br>   
                    <div id="custom-search-input">
                        <div class="input-group col-md-12">
                            <input type="text"  id="searchbar" name="searchby" value="{{ isset($searchString) ? $searchString : null }}" class="  search-query form-control" placeholder="Search user by name and phone number">
                            <span class="input-group-btn">
                            <button class="btn btn-danger" type="button">
                            <span class="glyphicon glyphicon-search"/>
                            </button>
                            </span>
                      
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-4 pull-right">
                <h style="color:black;font-size:22px;font-family:Roboto;font-weight:500;font-stretch:normal;font-style:normal;line-height:1.50;letter-spacing:normal;text-align:left;width:121px;height:25px;"
                    ><br>Total Users | {{ $tickets->count() ?? '' }}</h>
            </div>
        </div>
        <br>
    </div>
</section>
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
                    <img src="{{ $ticket->user->userimage ?? '' }}" style="width:46px;height:46px;object-fit:contain;">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="cadd">
                    @if(empty($recent->winner))
                    <a style="font-size:18px;font-weight:bold;color:#1b1b1b" href="javascript:;" class="winner" data-toggle="modal" data-target="#winner-model" data-image="{{ $ticket->user->userimage ?? '' }}" data-name="{{ $ticket->user->full_name ?? '' }}" data-email="{{ $ticket->user->email ?? '' }}" data-orderType="{{ ($ticket->isCharity == true) ? 'Donating this item' : 'User pickup' }}" data-unit="{{ $ticket->ticketCount }}" data-num="{{ $ticket->ticketNumber }}" data-url="{{ url('admin/winner/announce', [$recent, $ticket]) }}">{{ $ticket->user->full_name ?? '' }}&nbsp;</a>
                    @else
                    <a style="font-size:18px;font-weight:bold;color:#1b1b1b" href="javascript:;">{{ $ticket->user->full_name ?? '' }}&nbsp;</a>
                    @endif
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

<div id="winner-model" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center">Announce winner</h4>
      </div>
       <div class="modal-header">
        <h4 class="modal-title">You Choose</h4>
      </div>
      <div class="modal-body">
          <div class="row">
              <div class="col-xs-4"><img style="max-height:150px" src="" class="img-responsive" id="winner-image"></div>
              <div class="col-xs-12"><h4><b id="winner-name"></b></h4>
              <p id="winner-email"></p></div>
          </div>
            
            <div class="col-xs-12"><h4><b>Order Type</b></h4>
            <p id="orderType"></p></div>

            <div class="col-xs-12"><h4><b>Ticket Unit</b></h4>
            <p id="ticketunit"></p></div>

            <div class="col-xs-12"><h4><b>Ticket Number</b></h4>
            <p id="ticketnum"></p></div>
      </div>
      
      <div class="modal-footer">
        <a href="" id="winnerUrl" class="btn btn-warning pull-left" style="margin-left: 234px;">
            Announce Winner
        </a>
      </div>
    </div>

  </div>
</div>
@endsection