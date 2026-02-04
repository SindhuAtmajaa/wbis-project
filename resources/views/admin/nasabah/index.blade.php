@extends('layouts/app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800"> 
       {{ $title }}
    </h1>

    <div class="card">
        <div class="card-header d-flex flex-wrap justify-content-between">
            <div class="mb-1">
                <a href="{{ route('nasabahCreate') }}" class="btn btn-sm btn-primary">
                    <i class="fas fa-plus mr-2"></i> Tambah Data
                </a>
            </div>

            <div>
                <a href="" class="btn btn-sm btn-success">
                    <i class="fas fa-file-excel mr-2"></i> Excel
                </a>
                <a href="" class="btn btn-sm btn-danger">
                    <i class="fas fa-file-pdf mr-2"></i> PDF
                </a>
            </div>
        </div>

        <div class="card-body">        
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0"> 
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Nama Debitur</th>
                            <th>Cabang</th>
                            <th>KCP</th>
                            <th>Jenis Agunan</th>
                            <th>Beban Biaya</th>
                            <th>NPWP</th>
                            <th>Dokumen</th>
                            <th>KJPP</th>
                            <th>No.Rekening</th>
                            <th>Tgl Order</th>
                            <th>SLA</th>
                            <th>Tgl Survey</th>
                            <th>Tgl BAP Jadi</th>
                            <th>Waktu (hari)</th>
                            <th>Nominal</th>
                            <th>Biaya Transportasi</th>
                            <th>Denda</th>
                            <th>Service Level</th>
                            <th>Keterangan</th>
                            <th>Status Pembayaran</th>
                            <th>Tgl Bayar</th>
                            <th>Nama AO</th>
                            <th>Unit</th>
                            <th>Verifikator</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($nasabah as $item)
                        <tr class="double-clickable" data-href="{{ route('nasabahEdit', $item->id) }}">
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_nasabah }}</td>
                            <td class="text-center">{{ $item->cabang->nama_cabang }}</td>
                            <td>{{ $item->kcp }}</td>
                            <td class="text-center">{{ $item->jenis_agunan }}</td>
                            <td>{{ $item->beban_biaya }}</td>
                            <td class="text-center">{{ $item->npwp }}</td>
                            <td>{{ $item->dokumen }}</td>
                            <td>{{ $item->kjpp->nama_kjpp }}</td>
                            <td>{{ $item->kjpp->rekening_kjpp }}</td>
                            <td>{{ $item->tgl_order?->isoFormat('D MMMM Y') }}</td>
                            <td class="text-center">{{ $item->cabang->sla }}</td>
                            <td>{{ $item->tgl_survey?->isoFormat('D MMMM Y') }}</td>
                            <td>{{ $item->tgl_bap_jadi?->isoFormat('D MMMM Y') }}</td>
                            <td class="text-center">{{ $item->waktu }} hari</td>
                            <td class="text-center">{{ number_format($item->nominal, 0, ',', '.') }}</td>
                            <td class="text-center">{{ number_format($item->biaya_transportasi, 0, ',', '.') }}</td>
                            <td class="text-center">{{ number_format($item->denda, 0, ',', '.') }}</td>
                            <td>{{ $item->service_level }}</td>
                            <td>{{ $item->keterangan }}</td>
                            <td>{{ $item->status_pembayaran }}</td>
                            <td>{{ $item->tgl_bayar?->isoFormat('D MMMM Y') }}</td>
                            <td class="text-center">{{ $item->nama_ao }}</td>
                            <td class="text-center">{{ $item->unit }}</td>
                            <td class = "text-center">{{ $item->verifikator?->nama }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center align-items-center" style="gap: 5px;">
                                    <div>
                                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal{{ $item->id }}">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        @include('admin/nasabah/modal')
                                    </div>

                                    @php
                                        $user = Auth::user();
                                        // Sesuaikan dengan nama kolom 'jabatan' dan value 'Admin'
                                        $isAdmin = ($user->jabatan == 'Admin');
                                        $isVerifikator = ($user->id == $item->verifikator_id);
                                        $hasVerifikator = !is_null($item->verifikator_id);
                                    @endphp

                                    @if(!$hasVerifikator)
                                        <form action="{{ route('nasabahVerify', $item->id) }}" method="POST" class="m-0">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-success" title="Verifikasi" onclick="return confirm('Verifikasi data ini?')">
                                                <i class="fas fa-check"></i>
                                            </button>
                                        </form>

                                    {{-- KONDISI 2: Admin ATAU Verifikator Asli (Tombol Hijau untuk Batal) --}}
                                    @elseif($isAdmin || $isVerifikator)
                                        <form action="{{ route('nasabahCancel', $item->id) }}" method="POST" class="m-0">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-success" title="Batalkan Verifikasi" onclick="return confirm('Batalkan verifikasi ini?')">
                                                <i class="fas fa-check"></i>
                                            </button>
                                        </form>

                                    {{-- KONDISI 3: Staff lain (Tombol Abu-abu) --}}
                                    @else
                                        <button class="btn btn-sm btn-secondary" disabled title="Diverifikasi oleh {{ $item->verifikator->name ?? 'User' }}">
                                            <i class="fas fa-check"></i>
                                        </button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const rows = document.querySelectorAll('.double-clickable');
        
        rows.forEach(row => {
            row.addEventListener('dblclick', function(e) {
                // Cek agar tidak konflik jika user klik tombol aksi
                if (!e.target.closest('button') && !e.target.closest('a')) {
                    window.location.href = this.dataset.href;
                }
            });
            
            // Tambahkan sedikit efek visual agar user tahu row ini bisa diinteraksi
            row.style.cursor = 'pointer';
        });
    });
</script>
