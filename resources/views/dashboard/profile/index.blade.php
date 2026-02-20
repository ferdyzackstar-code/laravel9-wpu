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
        <form method="post" action="/dashboard/profile" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="image" class="form-label">Profile Picture</label>

                {{-- LOGIKA MENAMPILKAN FOTO YANG SUDAH ADA --}}
                @if (auth()->user()->image)
                    {{-- Jika user sudah punya foto, tampilkan fotonya --}}
                    <img src="{{ asset('storage/' . auth()->user()->image) }}"
                        class="img-preview img-fluid mb-3 col-sm-5 d-block"
                        style="max-height: 300px; object-fit: cover; border-radius: 10px;">
                @else
                    {{-- Jika belum ada, siapkan tempat kosong untuk preview nanti --}}
                    <img class="img-preview img-fluid mb-3 col-sm-5" style="border-radius: 10px;">
                @endif

                <input class="form-control @error('image') is-invalid @enderror" type="file" id="imageInput"
                    name="image" onchange="previewAndEnable()">

                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- Tombol Submit kita kasih id="submitBtn" dan awalnya disabled --}}
            <button type="submit" id="submitBtn" class="btn btn-primary" disabled>
                {{ auth()->user()->image ? 'UPDATE PROFILE' : 'CREATE PROFILE' }}
            </button>
        </form>

        {{-- Tombol Delete tetap pakai logika PHP --}}
        @if (auth()->user()->image)
            <form action="/dashboard/profile" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger mt-2">DELETE PROFILE</button>
            </form>
        @endif
    </div>

    <script>
        function previewAndEnable() {
            const image = document.querySelector('#imageInput');
            const imgPreview = document.querySelector('.img-preview');
            const submitBtn = document.querySelector('#submitBtn');

            // 1. Tampilkan Preview
            imgPreview.style.display = 'block';
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            };

            // 2. Logika Menyalakan Tombol
            // Jika ada file yang dipilih, tombol nyala. Jika tidak, tetap mati.
            if (image.files.length > 0) {
                submitBtn.disabled = false;
            } else {
                submitBtn.disabled = true;
            }
        }
    </script>
@endsection
