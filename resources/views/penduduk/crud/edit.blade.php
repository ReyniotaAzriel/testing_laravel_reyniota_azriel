@extends('layout.app')

@section('content')
@include('penduduk.title')

<div class="container-fluid">
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title mb-3">
                        <a href="{{ route('penduduk') }}" class="btn btn-secondary me-2">
                            <i class="bi bi-arrow-left"></i>
                        </a>
                        Ubah Penduduk
                    </h1>

                    <div>
                        @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <form action="{{ route('edit_user', $penduduk->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="input-group mb-3">
                                <input type="text" name="user_id" class="form-control" placeholder="User ID"
                                    value="{{ $penduduk->user_id }}" disabled>
                            </div>

                            <hr />

                            <div class="input-group mb-3">
                                <input type="text" name="name" class="form-control" placeholder="Nama Lengkap"
                                    value="{{ $penduduk->name }}">
                            </div>

                            <div class="input-group mb-3">
                                <select class="form-select" name="gender">
                                    <option>Pilih Jenis Kelamin</option>
                                    <option value="L" selected=<?php $penduduk->gender == 'L' ?> >Laki-laki</option>
                                    <option value="P" selected=<?php $penduduk->gender == 'P' ?> >Perempuan</option>
                                </select>
                            </div>

                            <div class="input-group mb-3">
                                <input type="text" name="place_of_birth" class="form-control"
                                    placeholder="Tempat Kelahiran" value="{{ $penduduk->place_of_birth }}">
                            </div>

                            <div class="input-group mb-3">
                                <input type="date" name="date_of_birth" class="form-control" placeholder="Tanggal Lahir"
                                    value="{{ $penduduk->date_of_birth }}">
                            </div>

                            <div class="input-group mb-3">
                                <textarea rows="3" name="address" class="form-control"
                                    placeholder="Alamat">{{ $penduduk->address }}</textarea>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <img src="{{ asset($penduduk->photo) }}" class="img-fluid" alt="{{ $penduduk->name }}">
                </div>
            </div>
        </div>
    </div>
</div>

@endsection