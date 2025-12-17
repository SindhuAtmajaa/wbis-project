@extends('layouts/app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800"> 
        {{ $title }}
    </h1>

    <div class="card">
        <div class="card-header d-flex flex-wrap justify-content-between">
            <div class="mb-1">
                <a href="{{ route('userCreate') }}" class="btn btn-sm btn-primary">
                    <i class="fas fa-plus mr-2"></i> Tambah Data
                </a>
            </div>

            <div>
                <a href="{{ route('userExcel') }}" class="btn btn-sm btn-success">
                    <i class="fas fa-file-excel mr-2"></i> Excel
                </a>
                <a href="{{ route('userPdf') }}" class="btn btn-sm btn-danger" target="__blank">
                    <i class="fas fa-file-pdf mr-2"></i> PDF
                </a>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Nama Staff</th>
                            <th>Email</th>
                            <th>Tgl lahir</th>
                            <th>Alamat</th>
                            <th>No HP</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $item)
                            <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->tgl_lahir }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->no_hp }}</td>
                            <td class="text-center">
                                @if($item->jabatan == "Admin")
                                    <span class="badge badge-primary badge-pill">
                                        {{ $item->jabatan }}
                                    </span>
                                @else
                                <span class="badge badge-info badge-pill">
                                        {{ $item->jabatan }}
                                    </span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('userEdit', $item->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal{{ $item->id }}">
                                    <i class="fas fa-trash"></i>
                                </button>
                                @include('admin/user/modal')
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection