@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="box">
        <div class="row">
            <div class="col-sm-7">
                <h style="color:#53004B;font-size:30px;font-family:Roboto;font-weight:500;font-stretch:normal;font-style:normal;line-height:1.32;letter-spacing:normal;text-align:left;width:121px;height:25px;margin-top:20px;"
                    ><br>Campaigning | On-going</h>
            </div>
            <div class="col-sm-1">
                <div class="l"><img src="{{ asset('img/filter.png')}}" style= 
                    "width:44px;height:44px;position:absolute;left:100%;margin-left:-3px;margin-top:24px;"></div>
            </div>
            <div class="col-sm-1">
                <div class="vl"></div>
            </div>
            <div class="col-sm-2">
                <a href="{{ route('ongoing.create')}}"><br><button class="btn btn-create-ad">
                Create Campign
                </button></a>
            </div>
        </div>
        <br>
    </div>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box-body table-responsive">
                <table class="table table-bordered table-hover">
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
                            <td><img src="{{ $campaign->campaignUrl ?? 'https://via.placeholder.com/150' }}" class="pimg">{{ $campaign->campaignLabelEN }}</td>
                            <td>{{ $campaign->soldOut }}</td>
                            <td>{{ $campaign->totalQuantity }}</td>
                            <td>{{ number_format($campaign->campaignsPrize/100, 2) }}</td>
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
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
        <div class="col-lg-12">
            <nav aria-label="Page navigation example" class="pull-right">
                {{ $campaigns->links() }}
            </nav>
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
@endsection