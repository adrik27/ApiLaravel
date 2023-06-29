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

<section class="isi">
    <div class="container mt-3 ">
        <div class="row">
            <div class="col-md">
                <div class="d-flex gap-2 justify-content-center">
                    <div class="">
                        <div>Nama :</div>
                    </div>
                    <div class="">
                        <div>{{ $dt->name }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md">
                <div class="d-flex gap-2 justify-content-center">
                    <div class="">
                        <div>Username :</div>
                    </div>
                    <div class="">
                        <div>{{ $dt->username }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection