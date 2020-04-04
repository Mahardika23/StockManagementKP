@extends('../layout')
@section('css')
@parent
{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}

<link rel="stylesheet" href="{{asset('css/kategori-barang.css')}}">

@endsection
@section('title')Data Kategori Barang @endsection
@section('top-menu')

@endsection

@section('content')
@parent

<button class="btn btn-primary" id="tambah-kategori" type="button" data-form="Tambah Data" data-toggle="modal"
    data-target=#modalKategoriBarang> Tambah Data</button>


<table id="table_id" class="display">

    <thead>
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Kategori</th>
            <th>Opsi</th>
        </tr>
    </thead>


    <tbody>
        @foreach ($itemctg as $index => $k)

        <tr >
            <td>{{$index+1}}</td>
            <td>{{$k->akun}}</td>
            <td>{{$k->nama_kategori}}</td>
            <td> <span> 
                <a href="" data-form="Edit Data" data-toggle="modal"
                data-target=#modalKategoriBarang> Edit</a></span> | 
            <span>
                <meta name="csrf-token" content="{{ csrf_token() }}">
                 <a class="delete-jquery" data-method="delete" href="{{ route('kategori-barang.destroy', $k->id ) }}">Delete</a> </span></td>
        </tr>
        @endforeach

    </tbody>
</table>
<div class="modal fade" id="modalKategoriBarang" tabindex="-1" role="dialog" aria-labelledby="modalKategoriBarangTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalKategoriBarangTitle">Tambah Kategori Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{-- Body Here --}}
                <form class=form-group action="kategori-barang" method="post">
                    @csrf
                    <label for="kodeKategori">Kode Kategori </label>
                    <input class="form-control" type="text" id="kodeKategori" name="kode_kategori">
                    <label for="namaKategori">Nama Kategori </label>
                    <input class="form-control" type="text" name="nama_kategori" id="namaKategori">

                    {{-- <button class="btn btn-success submit" type="submit">Tambah</button> --}}
                    {{--  --}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
            </form>

        </div>
    </div>
</div>
@endsection

@section('scripts')
@parent
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script>

    //HTTP REQUEST ON LINK HREF
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    });
    $(document).on('click', 'a.delete-jquery', function(e) {
        e.preventDefault(); // does not go through with the link.
    
        var $this = $(this);
    
        $.post({
            type: $this.data('method'),
            url: $this.attr('href')
        }).done(function (data) {
            location.reload()
        });
    });
    </script>
<script>
    $(document).ready(function () {
        $('#table_id').DataTable();
        $('#modalKategoriBarang').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var form = button.data('form') // Extract info from data-* attributes
            var thedata = [];
            if (form.trim() == "Edit Data") {
                
                // var td = $("table tbody td:not(:last-child) ");
                td = button.parent().parent().parent().find("td:not(:last-child)")
                td.each( function () {
                thedata.push($(this).html().trim());
                })
                
        
            }
                // console.log()
            
            var modal = $(this);
            modal.find('#modalKategoriBarangTitle').html('Form ' + form)
            
            $('#kodeKategori').val("Kodenya");
            $('#namaKategori').val(thedata.slice(-1)[0]);
        });


      
    });
</script>
   
@endsection