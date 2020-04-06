@extends('Management-Data.layout')
@section('css')
@parent
<link rel="stylesheet" href="{{asset('css/kategori-barang.css')}}">

@endsection
@section('title')
Data Pemasok
@endsection
   

    @section('tableHeader')

    <tr>
        <th>No</th>
        <th>Kode Pemasok</th>
        <th>Nama Pemasok</th>
        <th>Dibuat Pada</th>
        <th>Terakhir Diubah</th>
        <th>Opsi</th>
    </tr>
    @endsection


    @section('tableBody')


        @foreach ($allData as $index => $s)

        <tr>
            <td>{{$index+1}}</td>
            <td>{{$s->kode_supplier}}</td>
            <td>{{$s->nama_supplier}}</td>
        
            <td>{{$s->created_at}}</td>
            <td>{{$s->updated_at}}</td>

            <td> <span>
            <a href="" data-form="Edit Data" data-toggle="modal" data-ctgid="{{$s->id}}" data-target=#modal> Edit</a></span> |
                <span>
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <a class="delete-jquery" data-method="delete"
                        href="{{ route('gudang.destroy', $s->id ) }}">Delete</a> </span></td>
        </tr>
        @endforeach
    @endsection

@section('modalId')
modalGudang
@endsection

@section('modalForm')
<label for="kodePemasok">Kode Pemasok </label>
<input class="form-control" type="text" name="kode_supplier" id="kodePemasok">
<label for="namaPemasok">Nama Pemasok </label>
<input class="form-control" type="text" name="nama_supplier" id="namaPemasok">
{{-- <label for="Alamat">Alamat </label>
<textarea class="form-control" type="textarea" name="alamat" id="Alamat" rows="5"></textarea>
<label for="noTelp">No Telpon:  </label>
<input class="form-control" type="text" name="no_telp" id="kodeGudang"> --}}

@endsection

@section('scripts')
@parent

@endsection