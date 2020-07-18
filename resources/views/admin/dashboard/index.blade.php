@extends('layouts.app')

@section('content')

   <section class="content-header">
     <div class="row">
        <div class="col-sm-8">
       
         </div>
        </div>
    </section>
    <section class="content">
        
        <div class="container">
         <div class="row">
           <div class="col-sm-8">
              <div class="row bg-w"><label class="label pull-left"> User registration in last 6 months: {{ $userLast5MonthCount }}</label>
               <canvas id="myChart" width="400" height="100"></canvas>
           </div>
           <div class="row">
           <div class="col-sm-4">
              <div class="bg-w">  <label class="label"> Active user</label>
               <canvas id="doughnut-chartcanvas-2" width="400" height="300"></canvas>
           </div>
           </div> 
           <div class="col-sm-4">
              <div class="bg-w">  <label class="label"> Your total Income</label>
              <canvas id="income-chart" width="400" height="300"></canvas>
           </div>
           </div>
            <div class="col-sm-4">
              <div class="bg-w">  <label class="label"> Income in Last 7 Days</label>
              <canvas id="income-chart7days" width="400" height="300"></canvas>
           </div>
           </div>
          
          </div>
        </div>
        @if(isset($latestWinner))
        <div class="col-sm-4">
              <div class="bg-w">  <label class="label">Latest winner</label>
                @php($image= !empty($latestWinner->user) ? $latestWinner->user->userimage : 'https://via.placeholder.com/120')
               <img style="max-width: 150px;
    display: block;
    margin: auto;" src="{{ $image }}" class="img-circle">
               <p style="    text-align: center;"><b>{{ !empty($latestWinner->user) ? $latestWinner->user->full_name : '' }}</b></p>
               <p style="    text-align: center;">{{ !empty($latestWinner->user) ? $latestWinner->user->email : '' }}</p>
               <div style="    border-bottom: 1px solid #ccc;
    padding: 13px;"></div>
               <p style="font-size: 17px;font-weight: 800;margin-top: 10px;">Ticket Info 
                @if(!empty($latestWinner->user))
                <a href="{{ route('user.show', $latestWinner->user) }}" style="color: #53004b;float: right; margin-right: 45px;">View Detail</a>
                @endif
               </p>
               <p><b>Ticket Number:</b> {{ $latestWinner->ticketNumber ?? '' }}</p>
           </div>
           </div> 
        @endif
        </div>
        </div>
         <div class="container bg-w">
      <div class="row">
          <label class="label pull-left">Sold out campaign</label>
        <div class="col-sm-12 table-responsive">
            <table class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                     
                  <th>Title</th>
                  <th>Sold</th>
                  <th>Out Of</th>
                  <th>AED</th>
                  <th></th>
                </tr>
                
                </thead>
                <tbody>
                @php($no=1)
                @forelse($campaigns as $campaign) 
                <tr>
                  <td><img src="{{ $campaign->campaignUrl}}" class="pimg">{{ $campaign->campaignLabelEN }}</td>
                  <td>{{ $campaign->soldOut }}</td>
                  <td>{{ $campaign->totalQuantity }}</td>
                  <td>{{ $campaign->campaignsPrize/100 }}</td>
                  <td><a href="{{ route('ongoing.show', $campaign)}}" class="button">View Details</a>
                </tr>
                @empty
                  <tr>
                    <td>No record found</td>
                  </tr>  
                @endforelse
                </tbody>
               
              </table>
        </div>
        
        </div></div>
       </section>
        
    @endsection