<!DOCTYPE html>
<html>
<head>
    <title>Laporan Data Nasabah</title>
    <style>
        /* Mengatur margin kertas minimalis */
        @page {
            margin: 0.5cm;
        }

        body {
            font-family: sans-serif;
            margin: 0;
            padding: 0;
        }

        h3, h5 {
            margin: 5px 0;
            text-transform: uppercase;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            /* KUNCI: Memaksa tabel tidak melebar keluar kertas */
            table-layout: fixed; 
        }

        thead tr {
            background-color: #007bff;
            color: white;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 2px; /* Padding sangat kecil agar muat */
            /* KUNCI: Ukuran font sangat kecil (6pt - 7pt) karena 24 kolom */
            font-size: 6pt; 
            text-align: left;
            word-wrap: break-word; /* Memecah teks panjang ke bawah */
        }

        th {
            text-align: center;
            font-weight: bold;
        }

        .text-center { text-align: center; }
    </style>
</head>
<body>

    <h3 align="center">Data Nasabah</h3>
    <h5 align="center">Diunduh : {{ $date }}</h5>

    <table>
        <thead>
            <tr>
                <th style="width: 2%;">No</th>
                <th style="width: 7%;">Nama Debitur</th>
                <th style="width: 4%;">Cabang</th>
                <th style="width: 6%;">KCP</th>
                <th style="width: 4%;">Jenis Agunan</th>
                <th style="width: 4%;">Beban Biaya</th>
                <th style="width: 4%;">NPWP</th>
                <th style="width: 8%;">Dokumen</th>
                <th style="width: 5%;">KJPP</th>
                <th style="width: 6%;">No.Rekening</th>
                <th style="width: 5%;">Tgl Order</th>
                <th style="width: 3%;">SLA</th>
                <th style="width: 5%;">Tgl Survey</th>
                <th style="width: 5%;">Tgl BAP</th>
                <th style="width: 6%;">Nominal</th>
                <th style="width: 6%;">Biaya Transportasi</th>
                <th style="width: 6%;">Denda</th>
                <th style="width: 4%;">Service Level</th>
                <th style="width: 8%;">Keterangan</th>
                <th style="width: 6%;">Status Pembayaran</th>
                <th style="width: 5%;">Tgl Bayar</th>
                <th style="width: 4%;">Nama AO</th>
                <th style="width: 4%;">Unit</th>
                <th style="width: 5%;">Verifikator</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($nasabah as $item)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $item->nama_nasabah }}</td>
                <td class="text-center">{{ $item->cabang->nama_cabang ?? '-' }}</td>
                <td>{{ $item->kcp }}</td>
                <td class="text-center">{{ $item->jenis_agunan }}</td>
                <td>{{ $item->beban_biaya }}</td>
                <td class="text-center">{{ $item->npwp }}</td>
                <td>{{ $item->dokumen }}</td>
                <td>{{ $item->kjpp->nama_kjpp ?? '-' }}</td>
                <td>{{ $item->kjpp->rekening_kjpp ?? '-' }}</td>
                <td>{{ $item->tgl_order?->isoFormat('D/M/Y') }}</td>
                <td class="text-center">{{ $item->cabang->sla ?? '-' }}</td>
                <td>{{ $item->tgl_survey?->isoFormat('D/M/Y') }}</td>
                <td>{{ $item->tgl_bap_jadi?->isoFormat('D/M/Y') }}</td>
                <td class="text-center">{{ number_format($item->nominal, 0, ',', '.') }}</td>
                <td class="text-center">{{ number_format($item->biaya_transportasi, 0, ',', '.') }}</td>
                <td class="text-center">{{ number_format($item->denda, 0, ',', '.') }}</td>
                <td class="text-center">{{ $item->service_level }}</td>
                <td>{{ $item->keterangan }}</td>
                <td>{{ $item->status_pembayaran }}</td>
                <td>{{ $item->tgl_bayar?->isoFormat('D/M/Y') }}</td>
                <td>{{ $item->nama_ao }}</td>
                <td>{{ $item->unit }}</td>
                <td>{{ $item->verifikator->nama ?? '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>