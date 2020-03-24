@extends('../layout')
@section('css')
@parent
<link rel="stylesheet" href="{{asset('css/tabel-data.css')}}">

@endsection
@section('title')Data Kategori Barang @endsection
@section('top-menu')

@endsection

@section('content')
@parent
<table id="table_id" class="display">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Kategori</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Row 1 Data 1</td>
            <td>Row 1 Data 2</td>
            <td>Row 1 Data 1</td>
        </tr>
        <tr>
            <td>Row 2 Data 1</td>
            <td>Row 2 Data 2</td>
            <td>Row 1 Data 1</td>
         </tr>
        <tr>
            <td>Row 2 Data 1</td>
            <td>Row 2 Data 2</td>
            <td>Row 1 Data 1</td>
        </tr>
    </tbody>
</table>
@endsection

@section('scripts')
@parent
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function () {
        $('#table_id').DataTable();
    });
</script>
@endsection