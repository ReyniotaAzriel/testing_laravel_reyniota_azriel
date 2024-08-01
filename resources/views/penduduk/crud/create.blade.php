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
                        Tambah Penduduk
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

                        <form action="{{ route('add_penduduk') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="input-group mb-3">
                                <select class="form-select" name="user_id">
                                    <option selected>Pilih User</option>
                                    @foreach ($user as $u)
                                    <option value="{{ $u->id }}">{{ $u->email }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <hr />

                            <div class="input-group mb-3">
                                <input type="text" name="name" class="form-control" placeholder="Nama Lengkap">
                            </div>

                            <div class="input-group mb-3">
                                <select class="form-select" name="gender">
                                    <option selected>Pilih Jenis Kelamin</option>
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>

                            <div class="input-group mb-3">
                                <input type="text" name="place_of_birth" class="form-control"
                                    placeholder="Tempat Kelahiran">
                            </div>

                            <div class="input-group mb-3">
                                <input type="date" name="date_of_birth" class="form-control"
                                    placeholder="Tanggal Lahir">
                            </div>

                            <div class="input-group mb-3">
                                <textarea rows="3" name="address" class="form-control" placeholder="Alamat"></textarea>
                            </div>

                            <div class="input-group mb-3">
                                <label class="input-group-text">Foto</label>
                                <input type="file" accept="image/*" class="form-control" name="photo">
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
    </div>
</div>

@endsection