@extends('../layout')
@section('css')
@parent
<link rel="stylesheet" href="{{ asset('css/mgmt-data.css') }}">
@endsection


@section('content')
@parent
  

<div class="placeholder">
<button class="btn btn-primary" id="tambah-data" type="button" data-form="Tambah Data" data-toggle="modal"
    data-target="#modal"> Tambah Data</button>


<table id="table_id" class="display table-striped">
 
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
<x-modal>
    <form class=form-group action="@yield('Route').update" method="post">
        @csrf
        @section('modalForm')
       
        @show
</x-modal>

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
            let thedata = [];
            if (form.trim() == "Edit Data") {
                td = button.parent().parent().parent().find("td:not(:last-child)")
                td.each( function () {
                thedata.push($(this).html().trim());
                
                })
                
                $(".modal-body form").attr('action',route+'/'+button.data('ctgid'))
                $(".modal-body form").prepend("<input type='hidden' name='_method' value='PUT'>")
                
            }
            else{
                $(".modal-body form").attr('action',route)
                
             
            }
            
            var modal = $(this);
            modal.find('#modalTitle').html('Form ' + form)
            
            $('#kodeKategori').val("Kodenya");
            thedata.forEach((v,index,arr) => {
                if(index == 0 || index == arr.length-1 ){
                }
                else{
                    // console.log(`${index+1}`)
                    $(`#field${index}`).val(v);
                    thedata = [];

                }
            });
            // console.log(thedata.slice(-1));
        });
    $('#modal').on('hide.bs.modal', (e) => {
        document.querySelector('form').reset()
    } )

      
    });
</script>

@endsection