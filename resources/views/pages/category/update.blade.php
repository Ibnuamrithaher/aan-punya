@extends('layouts.app')
@push('css')
    
@endpush
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <form action="{{ Route('category.update', $category->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputAddress">KODE CATEGORY</label>
                <input type="text" value="{{ $category->kode_category }}" name="kode_category" class="form-control" id="inputAddress" placeholder="kode" autocomplete="off" required>
            </div>
            <div class="form-group col-md-6">
                <label for="inputAddress">NAMA CATEGORY</label>
                <input type="text" value="{{ $category->nama_category }}" name="nama_category" class="form-control" id="inputAddress" placeholder="Nama" autocomplete="off" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="atribut">ATRIBUT</label>
                <select id="atribut" name="atribut" class="form-control" required autocomplete="off">
                    <option selected>Benefit</option>
                    <option>Cost</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="nilai_bobot">Nilai Bobot</label>
                <input type="number" step="any" value="{{ $category->nilai_bobot }}" name="nilai_bobot" class="form-control" id="nilai_bobot" placeholder="Nilai Bobot" autocomplete="off" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
<!-- /.container-fluid -->
@endsection
@push('script')
@endpush