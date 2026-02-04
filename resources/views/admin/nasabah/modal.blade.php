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
                : {{ $item->nama_nasabah }}
            </div>
        </div>

        {{-- cabang --}}
        <div class="row">
            <div class="col-3">
                cabang
            </div>
            <div class="col-9">
                : {{ $item->cabang->nama_cabang }}
            </div>
        </div>

        {{-- KCP --}}
        <div class="row">
            <div class="col-3">
                KCP
            </div>
            <div class="col-9">
                : {{ $item->kcp }}
            </div>
        </div>

        {{-- jenis agunan --}}
        <div class="row">
            <div class="col-3">
                Jenis Agunan
            </div>
            <div class="col-9">
                : {{ $item->jenis_agunan }}
            </div>
        </div>

        {{-- Beban Biaya --}}
        <div class="row">
            <div class="col-3">
                Beban Biaya
            </div>
            <div class="col-9">
                : {{ $item->beban_biaya }}
            </div>
        </div>

        {{-- Dokumen --}}
        <div class="row">
            <div class="col-3">
                Dokumen
            </div>
            <div class="col-9">
                : {{ $item->dokumen }}
            </div>
        </div>

        {{-- KJPP --}}
        <div class="row">
            <div class="col-3">
                KJPP
            </div>
            <div class="col-9">
                : {{ $item->kjpp->nama_kjpp }}
            </div>
        </div>

        {{-- Nominal --}}
        <div class="row">
            <div class="col-3">
                Nominal
            </div>
            <div class="col-9">
                : {{ $item->nominal }}
            </div>
        </div>

        {{-- Denda --}}
        <div class="row">
            <div class="col-3">
                Denda
            </div>
            <div class="col-9">
                : 
                @if($item->denda > 0)
                    <span class="badge badge-danger badge-pill">
                        {{ $item->denda }}
                    </span>
                @else
                    {{ $item->denda }}
                @endif
            </div>
        </div>

        {{-- service level --}}
        <div class="row">
            <div class="col-3">
                Service Level
            </div>
            <div class="col-9">
                :
                @if($item->service_level == "sesuai")
                    <span class="badge badge-primary badge-pill">
                        {{ $item->service_level }}
                    </span>
                @else
                    <span class="badge badge-danger badge-pill">
                        {{ $item->service_level }}
                    </span>  
                @endif
            </div>
        </div>

        {{-- Keterangan --}}
        <div class="row">
            <div class="col-3">
                Keterangan
            </div>
            <div class="col-9">
                : {{ $item->keterangan }}
            </div>
        </div>

        {{-- Nama Ao --}}
        <div class="row">
            <div class="col-3">
                Nama AO
            </div>
            <div class="col-9">
                : {{ $item->nama_ao }}
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        <form action="{{ route('nasabahDestroy', $item->id) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-primary btn-sm">Delete</button>
        </form>
        
      </div>
    </div>
  </div>
</div>