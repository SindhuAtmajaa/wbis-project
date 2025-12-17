<h3 align="center">Data User</h3>
<h5 align="center">Diunduh : {{ $date }}</h5>
{{-- <hr style="border: none; border-top: 1px solid #ccc; margin: 20px 0;"> --}}
<table width="100%" border="1" cellpadding="5" cellspacing="0">
    <thead>
        <tr style="background-color: #007bff; color: white; ">
            <th width="5" align="center">No</th>
            <th width="100" align="center">Nama</th>
            <th width="20" align="center">Email</th>
            <th width="25" align="center">Tgl lahir</th>
            <th width="50" align="center">Alamat</th>
            <th width="15" align="center">Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($user as $item)
          <tr>
            <td width="5" align="center" >{{ $loop->iteration }}</td>
            <td width="100">{{ $item->nama }}</td>
            <td width="20">{{ $item->email }}</td>
            <td width="25" align="center">{{ $item->tgl_lahir }}</td>
            <td width="50">{{ $item->alamat }}</td>
            <td width="15" align="center">{{ $item->jabatan }}</td>
        </tr>
        @endforeach
    </tbody>
</table>