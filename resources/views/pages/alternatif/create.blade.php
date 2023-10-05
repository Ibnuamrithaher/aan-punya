@extends('layouts.app')
@push('css')

@endpush
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <form action="{{ Route('alternatif.store') }}" method="POST">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputAddress">KODE ALTERNATIF</label>
                <input type="text" name="kode_alternatif" class="form-control" id="inputAddress" placeholder="kode" autocomplete="off" required>
            </div>
            <div class="form-group col-md-6">
                <label for="inputAddress">NAMA KECAMATAN</label>
                <input type="text" name="nama_alternatif" class="form-control" id="inputAddress" placeholder="Nama" autocomplete="off" required>
            </div>
        </div>
        <div class="form-row" hidden>
            @foreach ($category as $key => $item)
                <div class="form-group col-md-6">
                <label for="category">{{ $item->nama_category }}</label>
                <select id="category" name="category[]" class="form-control" autocomplete="off">
                    @foreach ($item->crips as $key1 => $item1)
                        <option value="{{ $item1->id }}" selected>{{ $item1->nama_crips }}</option>
                    @endforeach
                </select>
                </div>
            @endforeach
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
<!-- /.container-fluid -->
@endsection
@push('script')
@endpush
