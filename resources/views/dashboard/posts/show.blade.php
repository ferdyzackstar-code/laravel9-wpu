@extends('dashboard.layouts.main')
@section('container')
    <div class="container">
        <div class="row my-3">
            <div class="col-lg-8">
                <h1 class="mb-3"> {{ $data->title }} </h1>

                <a href="/dashboard-posts" class="btn btn-success"><i class="bi bi-backspace"></i> Back to all my posts</a>
                <a href="#" class="btn btn-warning"><i class="bi bi-pencil-square"></i> Edit</a>
                <a href="#" class="btn btn-danger"><i class="bi bi-x-octagon"></i> Delete</a>

                <img class="mt-3" src="https://picsum.photos/1200/400?{{ $data->category->name }}" class="img-fluid " alt="">

                <article class="my-3 fs-5">
                    {!! $data->body !!}
                </article>

                <a href="/posts" class="d-block mt-3">Back to Posts</a>
            </div>
        </div>
    </div>
@endsection
