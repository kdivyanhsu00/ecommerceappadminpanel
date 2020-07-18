@extends('layouts.app')

@section('content')
 <section class="content-header">
            <div class="box">
            <div class="row">
            <div class="col-sm-3">
            <h4 class="heading">Winner</h4>
        </div>
        <div class="col-sm-5">
            <form class="form" id="searchBar">
               <br>   <div id="custom-search-input">
                            <div class="input-group col-md-12">
                                <input type="text" class="search-query form-control input-border" placeholder="Search Add By Caption" name="searchby" value="{{ isset($searchString) ? $searchString : null }}" />
                                <span class="input-group-btn">
                                    <button class="btn btn-danger" type="button">
                                        <span class=" glyphicon glyphicon-search"></span>
                                    </button>
                                </span>
                            </div>
                        </div>
            </form>
        </div>
     
        <div class="col-sm-2">
          <h style="font-size:22px;font-family:Roboto;font-weight:500;font-stretch:normal;font-style:normal;line-height:1.50;letter-spacing:normal;text-align:left;width:121px;height:25px;margin-top:20px;"
><br>Total | {{ $winners->count() }}</h>
        </div>
       <div class="col-sm-1">
<div class="l"><img src="{{ asset('img/filter.png') }}" style= width:44px;height:44px;position:absolute;left:100%;margin-left:-3px;margin-top:24px;></div>
</div>
        </div>
        <br>
        
  </div>
    </section>

<!-- Content Header (Page header) -->
       <section class="content-header">
           
            <div class="row">
                  <div class="col-sm-4">
          <h style=color:#53004B;font-size:25px;font-family:Roboto;font-weight:500;font-stretch:normal;font-style:normal;line-height:1.32;letter-spacing:normal;text-align:left;width:121px;height:25px;margin-top:20px;
>Campaign Name</h>
        </div>
     
        <div class="col-sm-8">
          <h style=color:#53004B;font-size:25px;font-family:Roboto;font-weight:500;font-stretch:normal;font-style:normal;line-height:1.32;letter-spacing:normal;text-align:left;width:121px;height:25px;margin-top:20px;
>Winner Name</h>
        </div>
      
  </div>
</section>
    @php($no=1)
    @forelse($winners as $winner) 
    <section class="content">
        <div class="container bg-w" style="width:100%">
    <div class="row">
        <div class="col-sm-12">
              <div class="col-sm-1">
             <div class="cadd">
                 <img src="{{ $winner->campaign->campaignUrl ?? '' }}" style="width:46px;height:46px;object-fit:contain;">
                 </div></div>
                  <div class="col-sm-2">
             <div class="cadd">
                 <p style="width:135px;height:30px;font-family:Roboto;font-size:20px;">{{ $winner->campaign->campaignLabelEN ?? '' }}</p>
                 </div></div>
           
            <div class="col-sm-1"style="border-left:1px solid rgba(0, 0, 0, 0.16);">
             <div class="cadd">
                @if(!empty($winner->user->userimage))
                 <img src="{{ $winner->user->userimage }}" style= "width:46px;height:46px;object-fit:contain;" class="img-circle">
                @else
                  <img src="https://via.placeholder.com/150" style= "width:46px;height:46px;object-fit:contain;" class="img-circle">
                @endif 
                 </div></div>
                  <div class="col-sm-3">
             <div class="cadd">
                 <span style="font-size:18px;font-weight:bold;color:#1b1b1b">
                     {{ $winner->user->full_name ?? '' }}
                    
                 </span>
                 <p>{{ $winner->user->email ?? '' }}</p>
                 </div></div>
            <div class="col-sm-2"style="border-right:1px solid rgba(0, 0, 0, 0.16);">
             <div class="cadd">
                 <span style="font-size:18px;font-weight:bold;color:#1b1b1b">Date</span>
                 <p>{{ ($winner->created) ? $winner->created->format('d/m/Y') : '' }}</p>
                 </div></div>
            <div class="col-sm-2">
             <div class="cadd">
                @if(isset($winner->campaignId))
                <a href="{{ route('user.show', $winner->userId) }}" class="button">View Details</a>
                @endif
                 </div></div>
        <!-- /.col -->
      </div>
      <!-- /.row --></div>
      </div>
    </section>
    @empty
    <tr>
        <td>No record found</td>
    </tr>

    @endforelse

    <div class="col-lg-12">
        <nav aria-label="Page navigation example" class="pull-right">
            {{ $winners->appends(request()->input())->links() }}
        </nav>
    </div>     
@endsection