@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">My Post Categories</h1>
    </div>

    @if (session('success'))
        <div class="alert alert-success col-lg-6" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive col-lg-12">
        <a href="{{ route('dashboard-categories.create') }}" class="btn btn-primary mb-3"><i class="bi bi-plus-square"></i>
            Create
            New Category</a>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            @if ($category->image == null)
                                No Images
                            @else
                                <img src="{{ asset('storage/' . $category->image) }}" class="rounded" style="width: 150px">
                            @endif

                        </td>
                        <td>
                            <a class="badge bg-info" href="{{ route('dashboard-categories.show', $category->id) }}">
                                <i class="bi bi-search"></i>
                            </a>

                            <a class="badge bg-warning" href="{{ route('dashboard-categories.edit', $category) }}">
                                <i class="bi bi-pencil-square"></i>
                            </a>

                            <form action="{{ route('dashboard-categories.destroy', $category) }}" method="POST"
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
    </div>
@endsection
