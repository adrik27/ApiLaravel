@extends('layouts.main')

@section('isi')
<section class="judul">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md">
                <h1 class="text-center">Data All</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md">
                @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>

<section class="tombol">
    <div class="container mt-3">
        <div class="d-flex gap-2">
            <div class="tambah">
                <a href="/dataa/create" class="btn btn-sm btn-success">Tambah +</a>
            </div>
            <div class="API">
                <a href="/API" class="btn btn-sm btn-danger">Ambil Data API</a>
            </div>
        </div>
    </div>
</section>

{{-- <section class="cari">
    <div class="container mt-3">
        <div class="row">
            <div class="col-md">
                <form action="/dataa" method="get">
                    @csrf

                    <button type="submit" class="btn btn-sm btn-primary">Cari</button>
                    <input type="text" name="search" class="form-control" placeholder="Masukkan Nama Pencarian"
                        value="{{ request('search') }}" autocomplete="off" autofocus>
                </form>
            </div>
        </div>
    </div>
</section> --}}

<section class="Tabel">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md">
                <table class="table table-active table-bordered table-dark table-responsive-md">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($datas as $dt)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $dt->name }}</td>
                            <td>{{ $dt->username }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <div class="edit">
                                        <a href="/dataa/{{ $dt->id }}/edit" class="btn btn-sm btn-warning">Edit</a>
                                    </div>
                                    <div class="detail">
                                        <a href="/dataa/{{ $dt->id }}" class="btn btn-sm btn-info">Detail</a>
                                    </div>
                                    <div class="hapus">
                                        <form action="/dataa/{{ $dt->id }}" method="post" enctype="multipart/form-data">
                                            @method('DELETE')
                                            @csrf

                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Yakin ingin menghapus data {{ strtoupper($dt->name) }} ?')">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection