@extends('layouts.main')

@section('isi')
<section class="input">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md">
                <form action="/dataa" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Masukkan Gambar</label>
                        <input type="file" name="img" class="form-control @error('img')
                            is-invalid
                        @enderror" id="exampleFormControlInput1" autocomplete="off" required>
                        @error('img')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput2" class="form-label">Masukkan Nama</label>
                        <input type="text" name="name" class="form-control @error('name')
                            is-invalid
                        @enderror" id="exampleFormControlInput2" placeholder="Masukkan Nama" value="{{ old('name') }}"
                            autocomplete="off" autofocus required>
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput3" class="form-label">Masukkan Username</label>
                        <input type="text" name="username" class="form-control @error('username')
                            is-invalid
                        @enderror" id="exampleFormControlInput3" placeholder="Masukkan Username"
                            value="{{ old('username') }}" autocomplete="off" required>
                        @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3 d-flex gap-2">
                        <div class="simpan">
                            <button type="submit" class="btn btn-sm btn-success"
                                onclick="return confirm('Yakin ingin menyimpan dan menambah data baru ?')">Simpan</button>
                        </div>
                        <div class="kembali">
                            <a href="/dataa" class="btn btn-sm btn-danger"
                                onclick="return confirm('Yakin ingin kembali ? Data tidak akan tersimpan !')">Kembali</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>
@endsection