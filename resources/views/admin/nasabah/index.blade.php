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
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
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
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_nasabah }}</td>
                            <td>{{ $item->cabang->nama_cabang }}</td>
                            <td>{{ $item->kcp }}</td>
                            <td>{{ $item->jenis_agunan }}</td>
                            <td>{{ $item->beban_biaya }}</td>
                            <td>{{ $item->npwp }}</td>
                            <td>{{ $item->dokumen }}</td>
                            <td>{{ $item->kjpp->nama_kjpp }}</td>
                            <td>{{ $item->kjpp->rekening_kjpp }}</td>
                            <td>{{ $item->tgl_order?->isoFormat('D MMMM Y') }}</td>
                            <td>{{ $item->cabang->sla }}</td>
                            <td>{{ $item->tgl_survey?->isoFormat('D MMMM Y') }}</td>
                            <td>{{ $item->tgl_bap_jadi?->isoFormat('D MMMM Y') }}</td>
                            <td>{{ $item->waktu }} hari</td>
                            <td>{{ $item->nominal }}</td>
                            <td>{{ $item->biaya_transportasi }}</td>
                            <td>{{ $item->denda }}</td>
                            <td>{{ $item->service_level }}</td>
                            <td>{{ $item->keterangan }}</td>
                            <td>{{ $item->status_pembayaran }}</td>
                            <td>{{ $item->tgl_bayar?->isoFormat('D MMMM Y') }}</td>
                            <td>{{ $item->nama_ao }}</td>
                            <td>{{ $item->unit }}</td>
                            <td class = "text-center">{{ $item->verifikator?->nama }}</td>
                            <td class="text-center" style="white-space: nowrap;">
                                <a href="#" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                </a>
                                <a href="#" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="#" class="btn btn-success btn-sm">
                                    <i class="fas fa-check"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
