@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="box">
        <div class="row">
            <div class="col-sm-3">
                <h4 class="heading">Products list</h4>
            </div>
            <div class="col-sm-5">
                <form class="form" id="searchBar">
                    <br>  
                    <div id="custom-search-input">
                        <div class="input-group col-md-12">
                            <input type="text" id="searchbar" name="searchby" value="{{ isset($searchString) ? $searchString : null }}" class="search-query form-control input-border" placeholder="Search Product by name">
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
            <div class="col-sm-3 pull-right">
                <a href="{{ route('product.create')}}"><br><button class="btn btn-create-ad">
                Add New Product + 
                </button></a>
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
                            <th width="100">S. No.</th>
                            <th>Product Title</th>
                            <th>Add Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($no = ($products->currentpage()-1) * $products->perpage() + 1)
                        @forelse($products as $product)
                        <tr>
                            <td>{{ $no++ }} |</td>
                            <td><img src="{{ $product->productImageUrl ?? 'https://via.placeholder.com/150' }}" style=" width:46px;height:46px;object-fit:contain;">
                                {{ $product->productNameEN }}</td>
                            <td>{{ ($product->created) ? $product->created->format('m/d/Y') : '' }}</td>
                            <td>
                                <a href="{{ route('product.edit', $product)}}" class="action-link pull-left" style="color:#53004B;">Edit</a>
                                <a href="{{ route('product.show', $product)}}" class="action-link pull-left" style="color:#53004B; margin-left: 20px;">View</a>
                                <!-- <a data-toggle="modal" data-target="#modal-delete" data-message="Delete" href="" data-action="{{ route('product.destroy', $product) }}" class="action-link pull-left remove" style="color:#53004B; margin-left: 20px;">Delete</a> -->
                            </td>
                        </tr>
                        @empty
                        <tr class="table-danger">
                            <td colspan="4">No record found</td>
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
                {{ $products->appends(request()->input())->links() }}
            </nav>
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
@include('admin.partials.remove')
@endsection