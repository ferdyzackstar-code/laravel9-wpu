@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">
            {{ auth()->user()->image ? 'Edit My Profile' : 'Setup My Profile' }}
        </h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-8 alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Opsional: Tampilkan pesan error jika validasi gagal --}}
    @if (session()->has('error'))
        <div class="alert alert-danger col-lg-8 alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
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

            <div class="mt-3">
                <button type="submit" class="btn btn-primary">
                    {{ auth()->user()->image ? 'UPDATE PROFILE' : 'CREATE PROFILE' }}
                </button>

                {{-- Tombol Delete hanya akan muncul JIKA field image TIDAK NULL --}}
                @if (auth()->user()->image)
                    <form action="/dashboard/profile" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger" onclick="return confirm('Are you sure to delete this profile?')">
                            DELETE PROFILE PICTURE
                        </button>
                    </form>
                @else
                    {{-- Opsional: Kasih tombol mati (disabled) biar user tau fitur itu ada tapi belum aktif --}}
                    <button class="btn btn-secondary" disabled>
                        NO IMAGE TO DELETE
                    </button>
                @endif
            </div>

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
