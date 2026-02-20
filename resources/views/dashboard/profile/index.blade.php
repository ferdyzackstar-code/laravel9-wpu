@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">
            {{ auth()->user()->image ? 'Edit My Profile' : 'Setup My Profile' }}
        </h1>
    </div>

    <div class="col-lg-8">
        <form method="post" action="/dashboard/profile" class="mb-5" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="image" class="form-label">Profile Picture</label>
                @if ($user->image)
                    <img src="{{ asset('storage/' . $user->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                @else
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                @endif
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                    name="image" onchange="previewImage()">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">
                @if (auth()->user()->image)
                    <i class="bi bi-arrow-clockwise"></i> UPDATE PROFILE
                @else
                    <i class="bi bi-plus-circle"></i> CREATE PROFILE
                @endif
            </button>
        </form>
    </div>

    <script>
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');
            imgPreview.style.display = 'block';
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);
            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
