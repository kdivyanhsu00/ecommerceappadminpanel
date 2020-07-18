@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="box">
        <div class="row">
            <div class="col-sm-3">
                <h4 class="heading">Manage users</h4>
            </div>
            <div class="col-sm-4">
                <form class="form" id="searchBar">
                    <br>   
                    <div id="custom-search-input">
                        <div class="input-group col-md-12">
                            <input type="text" id="searchbar" name="searchby" value="{{ isset($searchString) ? $searchString : null }}" class="search-query form-control input-border" placeholder="Search user by name and phone number">
                            <span class="input-group-btn">
                            <button class="btn btn-danger" type="button" onclick="$(this).closest('form').submit();">
                            <span class="glyphicon glyphicon-search"/>
                            </button>
                            </span>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-4 pull-right">
                <h style="color:black;font-size:22px;font-family:Roboto;font-weight:500;font-stretch:normal;font-style:normal;line-height:1.50;letter-spacing:normal;text-align:left;width:121px;height:25px;"
                    ><br>Total Users | {{ $userCount }}</h>
            </div>
        </div>
        <br>
    </div>
</section>

<section class="content">
    @include('admin.partials.message')
    <div class="row">
        <div class="col-xs-12">
            <div class="box-body table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>S. No.</th>
                            <th>Name</th>
                            <th>Phone Number</th>
                            <th>Registration Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($no = ($users->currentpage()-1) * $users->perpage() + 1)
                        @forelse($users as $user)
                        <tr>
                            <td>{{ $no++ }} |</td>
                            <td>{{ $user->full_name }}</td>
                            <td>{{ $user->mobile }}</td>
                            <td>{{ $user->created->format('m/d/Y') }}</td>
                            <td>
                                @if(!$user->isBlock)
                                <a class="action-link pull-left block" data-toggle="modal" data-target="#modal-block" href="" data-action="{{ url('admin/user/block', $user)}}" data-status="1" data-message="Block">Block</a>
                                @else
                                <a class="action-link pull-left block" data-toggle="modal" data-target="#modal-block" href="" data-action="{{ url('admin/user/block', $user)}}" data-status="0" data-message="Unblock">Unblock</a>
                                @endif
                                <a href="{{ route('user.show', $user)}}" class="action-link pull-left" style="margin-left: 60px;">View</a>
                            </td>
                        </tr>
                        @empty
                        <tr class="table-danger">
                            <td colspan="5">No record found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.box -->
        <div class="col-lg-12">
            <nav aria-label="Page navigation example" class="pull-right">
                {{ $users->appends(request()->input())->links() }}
            </nav>
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
@include('admin.partials.block')
<script type="text/javascript">
  //   $("#modal-block").on("show.bs.modal", function(e){
  //     var t=$(e.relatedTarget),
  //     n=$(this),
  //     i=t.data("action")||n.find("form").attr("action"),
  //     status=t.data("status"),
  //     a=t.data("message")||"this record",
  //     o=t.data("return-url")||"";
  //     n.find("form").attr("action",i),n.find('input[name="return_url"]').val(o),
  //     n.find(".message").html(a),
  //     n.find("#status").val(status);
  // });
</script>
@endsection