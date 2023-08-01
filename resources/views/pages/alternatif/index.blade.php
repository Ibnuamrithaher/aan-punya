@extends('layouts.app')
@push('css')
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> --}}
@endpush
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    @if (session()->has('succes'))
        <div class="alert alert-primary" role="alert">
            {{ session()->get('succes') }}
        </div>
    @endif
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Alternatif</h6>
            <a href="{{ Route('alternatif.create') }}" class="btn btn-primary btn-icon-split mt-4">Create +</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama Kecamatan</th>
                            @foreach ($category as $item)
                                <th>{{ $item->kode_category }}</th>
                            @endforeach
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alternatifs as $key => $item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->kode_alternatif }}</td>
                            <td>{{ $item->nama_alternatif }}</td>
                            @foreach ($category as $key1 => $item1)
                                @if (empty($item->crips[$key1]))
                                    <td style="background: red; color: black">NULL</td>
                                @else
                                    <td>{{ $item->crips[$key1]->nama_crips }}</td>
                                @endif                   
                            @endforeach
                            <td>    
                                <form action="{{ route('alternatif.destroy', $item->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <a class="btn btn-primary" href="{{ route('alternatif.edit', $item->id) }}" width="50%">Edit</a>
                                    <button width="50%" class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection
@push('script')
    {{-- starck pack boostrap --}}
    {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> --}}

    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>     --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.data-table').DataTable({
                responsive      : true,
                dom             : 'Blfrtip',
                autoWidth       : true,
                paging          : true,
                pagingTypeSince : 'numbers',
                pagingType      : 'full_numbers',
                processing: true,
                serverSide: true,
                ordering: true, // Set true agar bisa di sorting 
		        order: [[ 0, 'asc' ]], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
                ajax: {
                    url:"{{ route('alternatif.index') }}",
                    type:"GET"
                },
                deferRender: true,  
			    aLengthMenu: [[5, 10, 50, 100],[ 5, 10, 50, 100]], // Combobox Limit show
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'kode_alternatif', name: 'kode_alternatif'},
                    {data: 'nama_alternatif', name: 'nama_alternatif'},
                    {render: function(data, type, row){
                       return row 
                    }},
                    {data: 'action', name: 'action', orderable: false, searchable: false,},
                ],
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });
    </script>
@endpush