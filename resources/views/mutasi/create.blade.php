@extends('layouts.admin.main')

@section('content')

<div class="container-fluid">

    <div class="card col-md-6">
       
        <div class="card-body">

            <h4>Tambah Mutasi Barang</h4>

            <form action="{{ route('mutasi.store') }}" method="POST">
                @csrf

                {{-- BARANG --}}
                <div class="mb-3">
                    <label>Barang</label>
                    <select name="barang_id" class="form-control select2" required>
                        <option value="">-- Pilih Barang --</option>
                        @foreach($barangs as $b)
                            <option value="{{ $b->id }}">
                                {{ $b->nama_barang }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- TIPE --}}
                <div class="mb-3">
                    <label>Tipe Mutasi</label>
                    <select name="tipe" id="tipe" class="form-control" required>
                        <option value="">-- Pilih --</option>
                        <option value="masuk">Barang Masuk</option>
                        <option value="keluar">Barang Keluar</option>
                        <option value="transfer">Transfer Gudang</option>
                    </select>
                </div>

                {{-- DARI GUDANG --}}
                <div class="mb-3" id="field-dari" style="display:none;">
                    <label>Dari Gudang</label>
                    <select name="dari_gudang" id="dari_gudang" class="form-control">
                        <option value="">-- Pilih Gudang --</option>
                        @foreach($gudangs as $g)
                            <option value="{{ $g->id }}">{{ $g->nama }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- KE GUDANG --}}
                <div class="mb-3" id="field-ke" style="display:none;">
                    <label>Ke Gudang</label>
                    <select name="ke_gudang" id="ke_gudang" class="form-control">
                        <option value="">-- Pilih Gudang --</option>
                        @foreach($gudangs as $g)
                            <option value="{{ $g->id }}">{{ $g->nama }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- JUMLAH --}}
                <div class="mb-3">
                    <label>Jumlah</label>
                    <input type="number" name="jumlah" class="form-control" required>
                </div>

                {{-- TANGGAL --}}
                <div class="mb-3">
                    <label>Tanggal</label>
                    <input type="date" name="tanggal" class="form-control"
                           value="{{ date('Y-m-d') }}" required>
                </div>

                {{-- KETERANGAN --}}
                <div class="mb-3">
                    <label>Keterangan</label>
                    <textarea name="keterangan" class="form-control"></textarea>
                </div>

                <button class="btn btn-success">Simpan</button>

            </form>

        </div>

    </div>

</div>

@endsection

@push('scripts')

{{-- SELECT2 --}}
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
$(document).ready(function(){

    $('.select2').select2();

    $('#tipe').change(function(){
        let tipe = $(this).val();

        // reset
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
    });

    // VALIDASI SUBMIT
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
                alert('Gudang asal dan tujuan tidak boleh sama!');
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