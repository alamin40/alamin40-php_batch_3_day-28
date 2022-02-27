@extends('master')

@section('title')
    Edit Blog
@endsection

@section('body')
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card">
                        <div class="card-header text-center font-weight-bold">Add Blog</div>
                        <div class="card-body">
                            {{--                            <h4 class="text-success text-center">{{Session::get('message')}}</h4>--}}
                            <form action="{{route('update-blog', ['id' => $blog->id])}}" method="post">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3">Title</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="title" value="{{$blog->title}}" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-md-3">Author</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="author" value="{{$blog->author}}" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-md-3">Description</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control" name="description">{{$blog->description}}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-md-3"></label>
                                    <div class="col-md-9">
                                        <input type="submit" class="btn btn-outline-success" name="" value="Create Blog" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
