@extends('layouts.admin.main')

@section('title','Edit Mutasi')

@section('content')
<div class="container-fluid">

    <div class="card col-md-6">
        <div class="card-body">

            <h4>Edit Mutasi Barang</h4>

            <form action="{{ route('mutasi.update', $mutasi->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- BARANG --}}
                <div class="mb-3">
                    <label>Barang</label>
                    <select name="barang_id" class="form-control select2" required>
                        @foreach($barangs as $b)
                            <option value="{{ $b->id }}"
                                {{ $mutasi->barang_id == $b->id ? 'selected' : '' }}>
                                {{ $b->nama_barang }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- TIPE --}}
                <div class="mb-3">
                    <label>Tipe Mutasi</label>
                    <select name="tipe" id="tipe" class="form-control" required>
                        <option value="masuk" {{ $mutasi->tipe == 'masuk' ? 'selected' : '' }}>Barang Masuk</option>
                        <option value="keluar" {{ $mutasi->tipe == 'keluar' ? 'selected' : '' }}>Barang Keluar</option>
                        <option value="transfer" {{ $mutasi->tipe == 'transfer' ? 'selected' : '' }}>Transfer Gudang</option>
                    </select>
                </div>

                {{-- DARI GUDANG --}}
                <div class="mb-3" id="field-dari">
                    <label>Dari Gudang</label>
                    <select name="dari_gudang" id="dari_gudang" class="form-control">
                        <option value="">-- Pilih Gudang --</option>
                        @foreach($gudangs as $g)
                            <option value="{{ $g->id }}"
                                {{ $mutasi->dari_gudang == $g->id ? 'selected' : '' }}>
                                {{ $g->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- KE GUDANG --}}
                <div class="mb-3" id="field-ke">
                    <label>Ke Gudang</label>
                    <select name="ke_gudang" id="ke_gudang" class="form-control">
                        <option value="">-- Pilih Gudang --</option>
                        @foreach($gudangs as $g)
                            <option value="{{ $g->id }}"
                                {{ $mutasi->ke_gudang == $g->id ? 'selected' : '' }}>
                                {{ $g->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- JUMLAH --}}
                <div class="mb-3">
                    <label>Jumlah</label>
                    <input type="number" name="jumlah" 
                           value="{{ $mutasi->jumlah }}" 
                           class="form-control" required>
                </div>

                {{-- TANGGAL --}}
                <div class="mb-3">
                    <label>Tanggal</label>
                    <input type="date" name="tanggal" 
                           value="{{ $mutasi->tanggal }}" 
                           class="form-control" required>
                </div>

                {{-- KETERANGAN --}}
                <div class="mb-3">
                    <label>Keterangan</label>
                    <textarea name="keterangan" class="form-control">
{{ $mutasi->keterangan }}
                    </textarea>
                </div>

                <button class="btn btn-success">Update</button>

            </form>

        </div>
    </div>

</div>
@endsection

@push('scripts')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
$(document).ready(function(){

    $('.select2').select2();

    function toggleGudang(){
        let tipe = $('#tipe').val();

        $('#field-dari').hide();
        $('#field-ke').hide();

        if(tipe === 'masuk'){
            $('#field-ke').show();
        }
        else if(tipe === 'keluar'){
            $('#field-dari').show();
        }
        else if(tipe === 'transfer'){
            $('#field-dari').show();
            $('#field-ke').show();
        }
    }

    toggleGudang();

    $('#tipe').change(function(){
        toggleGudang();
    });

    // VALIDASI
    $('form').submit(function(){

        let tipe = $('#tipe').val();
        let dari = $('#dari_gudang').val();
        let ke = $('#ke_gudang').val();

        if(tipe === 'transfer'){
            if(!dari || !ke){
                alert('Transfer wajib isi gudang asal & tujuan!');
                return false;
            }
            if(dari === ke){
                alert('Gudang tidak boleh sama!');
                return false;
            }
        }

        if(tipe === 'masuk' && !ke){
            alert('Gudang tujuan wajib diisi!');
            return false;
        }

        if(tipe === 'keluar' && !dari){
            alert('Gudang asal wajib diisi!');
            return false;
        }

    });

});
</script>

@endpush