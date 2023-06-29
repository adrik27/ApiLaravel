@extends('layouts.main')

@section('isi')
<section class="judul">
    <div class="container mt-5">
        <div class="row text-center">
            <div class="col-md">
                <img src="{{ asset('storage/'. $dt->img) }}" alt="image"
                    class="rounded-circle border border-dark border-3 shadow-lg" width="200px" height="200px">
            </div>
        </div>
    </div>
</section>
<section class="input">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md">
                <form action="/dataa/{{ $dt->id }}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Masukkan Gambar</label>
                        <input class="form-control @error('image') is-invalid @enderror" type="hidden" name="oldImg"
                            id="image">
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
                        @enderror" id="exampleFormControlInput2" placeholder="Masukkan Nama"
                            value="{{ old('name', $dt->name) }}" autocomplete="off" autofocus required>
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
                            value="{{ old('username', $dt->username) }}" autocomplete="off" required>
                        @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3 d-flex gap-2">
                        <div class="simpan">
                            <button type="submit" class="btn btn-sm btn-success"
                                onclick="return confirm('Yakin ingin mengupdate data ini ?')">Update</button>
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