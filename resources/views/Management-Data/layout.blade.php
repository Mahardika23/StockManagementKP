@extends('../layout')
@section('css')
@parent

@endsection


@section('content')
@parent

<button class="btn btn-primary" id="tambah-data" type="button" data-form="Tambah Data" data-toggle="modal"
    data-target="#modal"> Tambah Data</button>


<table id="table_id" class="display">

    <thead>
        <tr>
            @yield('tableHeader')
            
            
        </tr>
    </thead>
    <tbody>
        @section('tableBody')
            
        @show
    </tbody>
</table>
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="@yield('modalId')Title"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Tambah @yield('title')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{-- Body Here --}}
                <form class=form-group action="@yield('Route').update" method="post">
                    @csrf
                    @section('modalForm')
                   
                    @show
                    {{-- <button class="btn btn-success submit" type="submit">Tambah</button> --}}
                {{---------------}}
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
<script src="{{asset('js/http_request_on_link.js')}}"></script>

<script>
    var route = $('title').html().replace("Data",'').toLowerCase().trim().replace(' ','-');



    $(document).ready(function () {
        $('#table_id').DataTable();

        $("#modal").on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var form = button.data('form') // Extract info from data-* attributes
            var thedata = [];
            console.log(button.html());
            console.log(button.data('ctgid'))
            if (form.trim() == "Edit Data") {
                console.log("editing ... ")
                td = button.parent().parent().parent().find("td:not(:last-child)")
                td.each( function () {
                thedata.push($(this).html().trim());

                })
                
                $(".modal-body form").attr('action',route+'/'+button.data('ctgid'))
                $(".modal-body form").prepend("<input type='hidden' name='_method' value='PUT'>")
                
            }
            else{
                $(".modal-body form").attr('action',route)
                // $(".modal-body form").attr('method','PUT')
                
             
            }
            
            var modal = $(this);
            modal.find('#modalTitle').html('Form ' + form)
            
            $('#kodeKategori').val("Kodenya");
            $('#namaKategori').val(thedata.slice(-1)[0]);
        });


      
    });
</script>

@endsection