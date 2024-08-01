@extends('layout.app')

@section('content')
@include('user.title')

<div class="container-fluid">
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title mb-3">
                        Ubah User
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

                        <form action="{{ route('edit_user', $user->id) }}" method="POST">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="text" name="name" class="form-control" placeholder="Nama Lengkap"
                                    value="{{ $user->name }}">
                            </div>

                            <div class="input-group mb-3">
                                <input type="email" name="email" class="form-control" placeholder="Email"
                                    value="{{ $user->email }}" disabled>
                            </div>

                            <div class="input-group mb-3">
                                <input type="password" name="password" class="form-control" placeholder="Password Baru">
                            </div>

                            <div class="input-group mb-3">
                                <input type="password" name="password_confirmation" class="form-control"
                                    placeholder="Konfirmasi Password Baru">
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