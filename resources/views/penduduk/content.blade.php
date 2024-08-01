@extends('layout.app')

@section('content')
@include('penduduk.title')

<div class="app-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 d-flex justify-content-end">
                                <a href="{{ route('create_penduduk') }}" class="btn btn-success">
                                    <i class="bi bi-file-earmark-plus-fill me-1"></i>
                                    Tambah Data
                                </a>
                            </div>
                        </div>
                        <table class="table table-responsive table-striped table-hover">
                            <thead>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Tgl. Lahir</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Aksi</th>
                            </thead>
                            <tbody>
                                @php
                                $idx = 1;
                                @endphp
                                @foreach ($penduduk as $d)
                                <tr>
                                    <th scope="row">{{ $idx++ }}</th>
                                    <td>{{ $d->name }}</td>
                                    <td>{{ $d->gender == 'P' ? 'Perempuan' : 'Laki-laki' }}</td>
                                    <td>{{ date_format(date_create($d->date_of_birth), "D, d/m/Y") }}</td>
                                    <td>{{ $d->address }}</td>
                                    <td>
                                        <a href="{{ route('update_penduduk', ['id' => $d->id]) }}"
                                            class="btn btn-primary">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#modalDelete{{ $d->id }}">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </td>
                                </tr>

                                <div class="modal fade" id="modalDelete{{ $d->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Konfirmasi</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form method="POST" action="{{ route('delete_penduduk', $d->id) }}">
                                                @csrf
                                                <div class="modal-body">
                                                    Apakah Anda yakin ingin menghapus penduduk
                                                    <span class="fw-bold">{{ $d->name }}</span>?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Tidak</button>
                                                    <button type="submit" class="btn btn-danger">Ya</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection