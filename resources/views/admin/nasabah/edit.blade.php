@extends('layouts/app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800"> 
        {{ $title }}
    </h1>

    <div class="card">
        <div class="card-header bg-primary">
            <div class="mb-1">
                <a href="{{ route('nasabah') }}" class="btn btn-sm btn-success">
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

            <form action="{{ route('nasabahUpdate', $nasabah->id) }}" method="post">
                @csrf
                <div class="row mb-2">
                    {{-- nama debitur --}}
                    <div class="col-xl-6 mb-2">
                        <label for="form-label">
                            <span class="text-danger">*</span>
                            Nama Debitur
                        </label>
                        <input type="text" class="form-control" name="nama_nasabah" value="{{ old('nama_nasabah', $nasabah->nama_nasabah) }}">
                         @error('nama_nasabah')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>

                    {{-- Dropdown Cabang --}}
                    <div class="col-xl-6">
                        <label for="form-label">
                            <span class="text-danger">*</span>
                            Cabang
                        </label>
                        <select name="cabang_id" class="form-control">
                            <option selected disabled>-- Pilih Cabang --</option>
                            @foreach ($cabangs as $item )
                                <option value="{{ $item->id }}" {{ old('cabang_id',$nasabah->cabang_id) == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama_cabang }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                    
                <div class="row mb-2" > 
                    {{-- KCP --}}
                    <div class="col-xl-6 mb-2">
                        <label for="form-label">
                            <span class="text-danger">*</span>
                            KCP
                        </label>
                        <input type="text" class="form-control" name="kcp" value="{{ old('kcp', $nasabah->kcp) }}">
                        @error('kcp')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                        
                    {{-- Jenis Agunan --}}
                    <div class="col-xl-6">
                        <label for="form-label">
                            <span class="text-danger">*</span>
                            Jenis Agunan
                        </label>
                        <input type="text" class="form-control" name="jenis_agunan" value="{{ old('jenis_agunan', $nasabah->jenis_agunan) }}">
                        @error('jenis_agunan')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>

                <div class="row mb-2" > 
                    {{-- Beban Biaya --}}
                    <div class="col-xl-6 mb-2">
                        <label for="form-label">
                            <span class="text-danger">*</span>
                            Beban Biaya
                        </label>
                        <input type="text" class="form-control" name="beban_biaya" value="{{ old('beban_biaya', $nasabah->beban_biaya) }}">
                        @error('beban_biaya')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                        
                    {{-- NPWP --}}
                    <div class="col-xl-6">
                        <label for="form-label">
                            <span class="text-danger">*</span>
                            NPWP
                        </label>
                        <input type="text" class="form-control" name="npwp" value="{{ old('npwp', $nasabah->npwp) }}">
                        @error('npwp')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>

                <div class="row mb-2">
                    {{-- Dokumen --}}
                    <div class="col-xl-12 mb-2">
                        <label for="form-label">
                            <span class="text-danger">*</span>
                            Dokumen
                        </label>
                        <textarea class="form-control" name="dokumen" rows="5">{{ old('dokumen', $nasabah->dokumen) }}</textarea>
                         @error('dokumen')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>

                 <div class="row mb-2">
                    {{-- Dropdown KJPP --}}
                    <div class="col-xl-6">
                        <label for="form-label">
                            <span class="text-danger">*</span>
                            KJPP
                        </label>
                        <select name="kjpp_id" class="form-control">
                            <option selected disabled>-- Pilih KJPP --</option>
                            @foreach ($kjpps as $item )
                                <option value="{{ $item->id }}" {{ old('kjpp_id', $nasabah->kjpp_id) == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama_kjpp }}
                                </option>
                            @endforeach
                        </select>
                        @error('kjpp_id')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>

                    {{-- tgl order --}}
                    <div class="col-xl-6">
                        <label for="form-label">
                            <span class="text-danger">*</span>
                            Tanggal Order
                        </label>
                        <input type="date" class="form-control" name="tgl_order" value="{{ old('tgl_order',date('Y-m-d',strtotime($nasabah->tgl_order))) }}">
                        @error('tgl_order')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>

                <div class="row mb-2"> 
                    {{-- tgl survey --}}
                    <div class="col-xl-6">
                        <label for="form-label">
                            <span class="text-danger">*</span>
                            Tanggal Survey
                        </label>
                        <input type="date" class="form-control" name="tgl_survey" value="{{ old('tgl_survey',date('Y-m-d',strtotime($nasabah->tgl_survey))) }}">
                        @error('tgl_survey')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>

                    {{-- tgl bap jadi --}}
                    <div class="col-xl-6">
                        <label for="form-label">
                            <span class="text-danger">*</span>
                            Tanggal BAP Jadi
                        </label>
                        <input type="date" class="form-control" name="tgl_bap_jadi" value="{{ old('tgl_bap_jadi',date('Y-m-d',strtotime($nasabah->tgl_bap_jadi))) }}">
                        @error('tgl_bap_jadi')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>

                <div class="row mb-2">
                    {{-- Nominal --}}
                    <div class="col-xl-6">
                        <label for="form-label">
                            <span class="text-danger">*</span>
                            Nominal
                        </label>
                        {{-- UX agar tiap 3 digit ada (.), lalu JS dibawah --}}
                        <input type="text" class="form-control" id="nominal_display" value="{{ number_format(old('nominal', $nasabah->nominal), 0, ',', '.') }}" inputmode="numeric">
                        {{-- input sebenarnya untuk db --}}
                        <input type="hidden" name="nominal" id="nominal_db" value="{{ old('nominal', $nasabah->nominal) }}">
                        @error('nominal')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>

                    {{-- Biaya Transportasi --}}
                    <div class="col-xl-6">
                        <label for="form-label">
                            <span class="text-danger">*</span>
                            Biaya Transportasi
                        </label>
                        {{-- UX agar tiap 3 digit ada (.), lalu JS dibawah --}}
                        <input type="text" class="form-control" id="trans_display" value="{{ number_format(old('biaya_transportasi', $nasabah->biaya_transportasi), 0, ',', '.') }}" inputmode="numeric">
                        {{-- input sebenarnya untuk db --}}
                        <input type="hidden" name="biaya_transportasi" id="trans_db" value="{{ old('biaya_transportasi', $nasabah->biaya_transportasi) }}">
                        @error('biaya_transportasi')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>

                <div class="row mb-2">
                    {{-- Keterangan --}}
                    <div class="col-xl-12 mb-2">
                        <label for="form-label">
                            <span class="text-danger">*</span>
                            Keterangan
                        </label>
                        <textarea class="form-control" name="keterangan" rows="5">{{ old('keterangan', $nasabah->keterangan) }}</textarea>
                         @error('keterangan')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>

                 <div class="row mb-2" > 
                    {{-- Status Pembayaran --}}
                    <div class="col-xl-6 mb-2">
                        <label for="form-label">
                            <span class="text-danger">*</span>
                            Status Pembayaran
                        </label>
                        <input type="text" class="form-control" name="status_pembayaran" value="{{ old('status_pembayaran', $nasabah->status_pembayaran) }}">
                        @error('status_pembayaran')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                        
                    {{-- tgl bayar --}}
                    <div class="col-xl-6">
                        <label for="form-label">
                            <span class="text-danger">*</span>
                            Tanggal Bayar
                        </label>
                        <input type="date" class="form-control" name="tgl_bayar" value="{{ old('tgl_bayar',date('Y-m-d',strtotime($nasabah->tgl_bayar))) }}">
                        @error('tgl_bayar')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>

                 <div class="row mb-2" > 
                    {{-- Nama Ao --}}
                    <div class="col-xl-6 mb-2">
                        <label for="form-label">
                            <span class="text-danger">*</span>
                            Nama AO
                        </label>
                        <input type="text" class="form-control" name="nama_ao" value="{{ old('nama_ao', $nasabah->nama_ao) }}">
                        @error('nama_ao')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                        
                    {{-- Unit --}}
                    <div class="col-xl-6">
                        <label for="form-label">
                            <span class="text-danger">*</span>
                            Unit
                        </label>
                        <input type="text" class="form-control" name="unit" value="{{ old('unit', $nasabah->unit) }}">
                        @error('unit')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
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

{{-- JS UNTUK UX NOMINAL --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Fungsi pembantu untuk memformat ribuan
        function handleRibuan(displayId, hiddenId) {
            const display = document.getElementById(displayId);
            const hidden = document.getElementById(hiddenId);

            display.addEventListener('input', function() {
                let value = this.value.replace(/\D/g, ""); // Hapus non-angka
                hidden.value = value; // Simpan angka bersih ke DB
                
                if (value !== "") {
                    this.value = new Intl.NumberFormat('id-ID').format(value); // Format titik
                } else {
                    this.value = "";
                }
            });
        }

        // Jalankan untuk Nominal
        handleRibuan('nominal_display', 'nominal_db');

        // Jalankan untuk Biaya Transportasi
        handleRibuan('trans_display', 'trans_db');
    });
</script>