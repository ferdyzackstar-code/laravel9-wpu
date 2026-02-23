@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">My Posts</h1>
    </div>

    @if (session('success'))
        <div class="alert alert-success col-lg-12" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive col-lg-12">
        <a href="{{ route('dashboard-posts.create') }}" class="btn btn-primary mb-3"><i class="bi bi-plus-square"></i> Create
            New Post</a>
        <table class="table table-hover table-sm">
            <thead class="thead-custom">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Title</th>
                    <th scope="col">Image</th>
                    <th scope="col">Category</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $posts->firstItem() + $loop->index }}</td>
                        <td>{{ $post->title }}</td>
                        <td>
                            @if ($post->image == null)
                                No Images
                            @else
                                <img src="{{ asset('storage/' . $post->image) }}" class="rounded shadow-sm"
                                    style="width: 80px; height: 50px; object-fit: cover;">
                            @endif

                        </td>
                        <td>{{ $post->category->name ?? 'Tidak ada Category' }}</td>
                        <td>
                            <a class="badge bg-info" href="{{ route('dashboard-posts.show', $post) }}">
                                <i class="bi bi-search"></i>
                            </a>

                            <a class="badge bg-warning" href="{{ route('dashboard-posts.edit', $post->id) }}">
                                <i class="bi bi-pencil-square"></i>
                            </a>

                            <form action="{{ route('dashboard-posts.destroy', $post->id) }}" method="POST"
                                class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')">
                                    <i class="bi bi-x-octagon"></i>
                                </button>
                            </form>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $posts->links() }}
    </div>
@endsection
