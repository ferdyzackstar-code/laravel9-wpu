@extends('dashboard.layouts.main')
@section('container')
    <div class="container">
        <div class="row my-3">
            <div class="col-lg-8">
                <h1 class="mb-3"> {{ $data->title }} </h1>
                <form action="{{ route('dashboard-posts.destroy', $data->id) }}" method="POST">
                    @method('delete')

                    @csrf

                    <a href="/dashboard-posts" class="btn btn-success"><i class="bi bi-backspace"></i> Back To All My Posts</a>
                    <a href="#" class="btn btn-warning"><i class="bi bi-pencil-square"></i> Edit</a>

                    <button type="submit" class="btn btn-danger" href="#">
                        <i class="bi bi-x-octagon"></i> Delete</a></li></button>
                </form>

                @if ($data->image)
                    <div style="max-height: 350px; overflow:hidden;">
                        <img class="mt-3" src="{{ asset('storage/' . $data->image) }}" class="img-fluid "
                            alt="{{ $data->category->name }}">
                    </div>
                @else
                    <img class="mt-3" src="https://picsum.photos/1200/400?{{ $data->category->name }}" class="img-fluid "
                        alt="{{ $data->category->name }}">
                @endif

                <article class="my-3 fs-5">
                    {!! $data->body !!}
                </article>
            </div>
        </div>
    </div>
@endsection
