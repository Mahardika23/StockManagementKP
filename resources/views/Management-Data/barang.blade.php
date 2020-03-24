@extends('../layout')
@section('css')
@parent
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@endsection
@section('title')Data Barang @endsection
@section('top-menu')
    
@endsection
@section('content')
@parent
    <table id="tabel">
        <thead>
            <th>
                This is heading
            </th>
        </thead>
        <tbody>
            <tr>
                <td>hello</td>
            </tr>
        </tbody>
    </table>
@endsection

@section('script')
@parent    
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#tabel').DataTable();
    });
</script>
@endsection
