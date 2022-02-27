@extends('master')

@section('title')
    All Product
@endsection

@section('body')
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="card">
                        <div class="card-header font-weight-bold text-center text-white bg-info">All Blog</div>
                        <h4 class="text-success text-center">{{Session::get('message')}}</h4>
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr class="text-center">
                                    <th>SL NO</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Brand</th>
                                    <th>Price</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->category}}</td>
                                        <td>{{$product->brand}}</td>
                                        <td>{{$product->price}}</td>
                                        <td>{{$product->description}}</td>
                                        <td>
                                            <a href="{{route('edit-product',['id' => $product->id])}}" class="btn btn-success btn-sm">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="" class="btn btn-danger btn-sm" onclick="deleteProduct({{$product->id}})">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            <form action="{{route('delete-product', ['id' => $product->id])}}" id="deleteProductForm{{$product->id}}" method="post">
                                                @csrf
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function deleteProduct(id)
        {
            event.preventDefault();
            var check = confirm('Are you sure to delete this?');
            if (check)
            {
                document.getElementById('deleteProductForm'+id).submit();
            }
        }
    </script>

@endsection
