<table>
    <thead>
        <tr>
            <th colspan="6">Diunduh : {{ $date }}</th>
        </tr>
        <tr class="text-center">
            <th colspan="6" align="center">Data User</th>
        </tr>
        <tr>
            <th width="5" align="center">No</th>
            <th width="50" align="center">Nama</th>
            <th width="30" align="center">Email</th>
            <th width="15" align="center">Tgl lahir</th>
            <th width="50" align="center">Alamat</th>
            <th width="15" align="center">Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($user as $item)
          <tr>
            <td align="center">{{ $loop->iteration }}</td>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->tgl_lahir }}</td>
            <td>{{ $item->alamat }}</td>
            <td>{{ $item->jabatan }}</td>
        </tr>
        @endforeach
    </tbody>
</table>