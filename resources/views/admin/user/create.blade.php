@extends('layouts/app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800"> 
        {{ $title }}
    </h1>

    <div class="card">
        <div class="card-header bg-primary">
            <div class="mb-1">
                <a href="{{ route('user') }}" class="btn btn-sm btn-success">
                    <i class="fas fa-arrow-left mr-2"></i> Kembali
                </a>
            </div>

            {{-- <div> posisi disini optional
                <a href="" class="btn btn-sm btn-primary">
                    <i class="fas fa-save mr-2"></i> Save
                </a>
            </div> --}}
        </div>

        <div class="card-body">

            <form action="{{ route('userStore') }}" method="post">
                @csrf
                <div class="row mb-2">
                    {{-- nama --}}
                    <div class="col-xl-6 mb-2">
                        <label for="form-label">
                            <span class="text-danger">*</span>
                            Nama
                        </label>
                        <input type="text" class="form-control" name="nama" value="{{ old('nama') }}">
                         @error('nama')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div class="col-xl-6">
                        <label for="form-label">
                            <span class="text-danger">*</span>
                            Email
                        </label>
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                        @error('email')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                    
                <div class="row mb-2" > 
                    {{-- NO HP --}}
                    <div class="col-xl-6 mb-2">
                        <label for="form-label">
                            <span class="text-danger">*</span>
                            No.Hp
                        </label>
                        <input type="text" class="form-control" name="no_hp" value="{{ old('no_hp') }}">
                        @error('no_hp')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                        
                    {{-- tgl-lahir --}}
                    <div class="col-xl-6">
                        <label for="form-label">
                            <span class="text-danger">*</span>
                            Tanggal Lahir
                        </label>
                        <input type="date" class="form-control" name="tgl_lahir" value="{{ old('tgl_lahir') }}">
                        @error('tgl_lahir')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>

                <div class="row mb-2">
                    {{-- Jabatan --}}
                    <div class="col-xl-6 mb-2">
                        <label for="form-label">
                            <span class="text-danger">*</span>
                            Status
                        </label>
                        <select name="jabatan" class="form-control">
                            <option selected disabled>-- Pilih Status Jabatan --</option>
                            <option value="Admin">Admin</option>
                            <option value="Staff">Staff</option>
                        </select>
                        @error('jabatan')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>

                    {{-- Alamat --}}
                    <div class="col-xl-6">
                        <label for="form-label">
                            <span class="text-danger">*</span>
                            Alamat
                        </label>
                        <input type="text" class="form-control" name="alamat" value="{{ old('alamat') }}">
                        @error('alamat')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>

                <div class="row mb-2">
                    {{-- Password --}}
                    <div class="col-xl-6 mb-2">
                        <label for="form-label">
                            <span class="text-danger">*</span>
                            Password
                        </label>
                        <input type="password" class="form-control" name="password" value="{{ old('password') }}">
                        @error('password')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>

                    {{-- Reenter Password --}}
                    <div class="col-xl-6">
                        <label for="form-label">
                            <span class="text-danger">*</span>
                            Konfirmasi Password
                        </label>
                        <input type="password" class="form-control" name="password_confirmation" value="{{ old('password') }}">
                    </div>
                </div>

                <div>
                    <button type="submit" class="btn btn-sm btn-primary float-right">
                        <i class="fas fa-save mr-2"></i> Save
                    </button>
                </div>

                <div>
                    <button type="reset" class="btn btn-sm btn-danger float-right mr-2">
                        <i class="fas fa-eraser mr-2"></i> Reset
                    </button>
                </div>
            </form>

        </div>
    </div>
@endsection