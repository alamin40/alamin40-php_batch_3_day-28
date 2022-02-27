@extends('master')

@section('title')
    All Blog
@endsection

@section('body')
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="card">
                        <div class="card-header font-weight-bold text-center text-white bg-info">All Blog</div>
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr class="text-center">
                                    <th>SL NO</th>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                                @foreach($blogs as $blog)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$blog->id}}</td>
                                        <td>{{$blog->title}}</td>
                                        <td>{{$blog->author}}</td>
                                        <td>{{$blog->description}}</td>
                                        <td>
                                            <a href="{{route('edit-blog',['id' => $blog->id])}}" class="btn btn-success btn-sm">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="" class="btn btn-danger btn-sm" onclick="deleteBlog({{$blog->id}})">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            <form action="{{route('delete-blog', ['id' => $blog->id])}}" id="deleteBlogForm{{$blog->id}}" method="post">
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
        function deleteBlog(id)
        {
            event.preventDefault();
            var check = confirm('Are you sure to delete this?');
            if (check)
            {
                document.getElementById('deleteBlogForm'+id).submit();
            }
        }
    </script>

@endsection
