@extends('layouts.app')
@push('css')
    
@endpush
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <form action="{{ Route('crips.update', $crips->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-row">
            <label for="category">Nilai Kriteria</label>
            <select id="category" name="category" class="form-control" required autocomplete="off">
                @foreach ($category as $item)
                    <option value="{{ $item->id }}">{{ $item->kode_category }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-row">
            <label for="nama_crips">Nama Crips / Nilai Kriteria</label>
            <input type="text" value="{{ $crips->nama_crips }}" name="nama_crips"  class="form-control" id="inputAddress" placeholder="nama" autocomplete="off" required>
        </div>
        <div class="form-row">
            <label for="nilai">Nilai</label>
            <input type="number" step="any" value="{{ $crips->nilai }}" name="nilai" class="form-control" id="inputAddress" placeholder="nilai" autocomplete="off" required>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
<!-- /.container-fluid -->
@endsection
@push('script')
@endpush