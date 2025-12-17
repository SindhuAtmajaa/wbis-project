<!-- Modal -->
<div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="exampleModalLabel">Hapus {{ $title }} ?</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-left">

        {{-- nama --}}
        <div class="row">
            <div class="col-3">
                Nama
            </div>
            <div class="col-9">
                : {{ $item->nama }}
            </div>
        </div>

        {{-- email --}}
        <div class="row">
            <div class="col-3">
                Email
            </div>
            <div class="col-9">
                : {{ $item->email }}
            </div>
        </div>

        {{-- tgl_lahir --}}
        <div class="row">
            <div class="col-3">
                Tanggal Lahir
            </div>
            <div class="col-9">
                : {{ $item->tgl_lahir }}
            </div>
        </div>

        {{-- alamat --}}
        <div class="row">
            <div class="col-3">
                Alamat
            </div>
            <div class="col-9">
                : {{ $item->alamat }}
            </div>
        </div>

        {{-- No_hp --}}
        <div class="row">
            <div class="col-3">
                No Hp
            </div>
            <div class="col-9">
                : {{ $item->no_hp }}
            </div>
        </div>

        {{-- jabatan --}}
        <div class="row">
            <div class="col-3">
                Jabatan
            </div>
            <div class="col-9">
                : 
                @if($item->jabatan == "Admin")
                    <span class="badge badge-primary badge-pill">
                        {{ $item->jabatan }}
                    </span>
                @else
                    <span class="badge badge-info badge-pill">
                        {{ $item->jabatan }}
                    </span>  
                @endif
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        <form action="{{ route('userDestroy', $item->id) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-primary btn-sm">Delete</button>
        </form>
        
      </div>
    </div>
  </div>
</div>