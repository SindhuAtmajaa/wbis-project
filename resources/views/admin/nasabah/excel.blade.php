<table>
    <thead>
        <tr>
            <th colspan="6">Diunduh : {{ $date }}</th>
        </tr>
        <tr class="text-center">
            <th colspan="6" align="center">Data Nasabah</th>
        </tr>
        <tr>
            <th width="5" align="center">No</th>
            <th width="50" align="center">Nama Debitur</th>
            <th width="10" align="center">Cabang</th>
            <th width="15" align="center">KCP</th>
            <th width="15" align="center">Jenis Agunan</th>
            <th width="15" align="center">Beban Biaya</th>
            <th width="10" align="center">NPWP</th>
            <th width="60" align="center">Dokumen</th>
            <th width="15" align="center">KJPP</th>
            <th width="15" align="center">No.Rekening</th>
            <th width="10" align="center">Tgl Order</th>
            <th width="8" align="center">SLA</th>
            <th width="10" align="center">Tgl Survey</th>
            <th width="10" align="center">Tgl Bap Jadi</th>
            <th width="15" align="center">Nominal</th>
            <th width="15" align="center">Biaya Transportasi</th>
            <th width="15" align="center">Denda</th>
            <th width="15" align="center">Service Level</th>
            <th width="50" align="center">Keterangan</th>
            <th width="20" align="center">Status Pembayaran</th>
            <th width="10" align="center">Tgl Bayar</th>
            <th width="10" align="center">Nama AO</th>
            <th width="10" align="center">Unit</th>
            <th width="15" align="center">Verifikator</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($nasabah as $item)
          <tr>
            <td align="center">{{ $loop->iteration }}</td>
            <td>{{ $item->nama_nasabah }}</td>
            <td align="center">{{ $item->cabang->nama_cabang ?? '-' }}</td>
            <td>{{ $item->kcp }}</td>
            <td align="center">{{ $item->jenis_agunan }}</td>
            <td>{{ $item->beban_biaya }}</td>
            <td align="center">{{ $item->npwp }}</td>
            <td>{{ $item->dokumen }}</td>
            <td>{{ $item->kjpp->nama_kjpp ?? '-' }}</td>
            <td>{{ $item->kjpp->rekening_kjpp ?? '-' }}</td>
            <td>{{ $item->tgl_order?->isoFormat('D MMMM Y') }}</td>
            <td align="center">{{ $item->cabang->sla ?? '-' }}</td>
            <td>{{ $item->tgl_survey?->isoFormat('D MMMM Y') }}</td>
            <td>{{ $item->tgl_bap_jadi?->isoFormat('D MMMM Y') }}</td>
            <td align="center">{{ $item->nominal }}</td>
            <td align="center">{{ $item->biaya_transportasi }}</td>
            <td align="center">{{ $item->denda }}</td>
            <td align="center">{{ $item->service_level }}</td>
            <td>{{ $item->keterangan }}</td>
            <td>{{ $item->status_pembayaran }}</td>
            <td>{{ $item->tgl_bayar?->isoFormat('D MMMM Y') }}</td>
            <td>{{ $item->nama_ao }}</td>
            <td>{{ $item->unit }}</td>
            <td>{{ $item->verifikator->nama ?? '-' }}</td>
        </tr>
        @endforeach
    </tbody>
</table>