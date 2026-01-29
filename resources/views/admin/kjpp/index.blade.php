@extends('layouts/app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800"> 
       {{ $title }}
    </h1>

    <div class="card">
        <div class="card-header d-flex flex-wrap justify-content-between">
            <div class="mb-1">
                <a href="" class="btn btn-sm btn-primary">
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
                        <tr>
                            <td class="text-center">1</td>
                            <td>Martinus Yordan Sindhu Atmaja</td>
                            <td>SMG</td>
                            <td>Banyumanik</td>
                            <td>TB</td>
                            <td>Debitur</td>
                            <td>A</td>
                            <td>SHM 701/Karanganyar Gunung Kidul</td>
                            <td>Suwendho</td>
                            <td>7660259567</td>
                            <td>3 Feb</td>
                            <td>3</td>
                            <td>6 Feb</td>
                            <td>6 Feb</td>
                            <td>1</td>
                            <td>1.332.000</td>
                            <td>-</td>
                            <td>Rp120.000</td>
                            <td>Sesuai</td>
                            <td>Tidak Denda</td>
                            <td>PIK SOLO</td>
                            <td>25 Feb</td>
                            <td>Gracia</td>
                            <td>Cabang</td>
                            <td>Linda</td>
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
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
