@extends('Management-Data.layout')
@section('css')
@parent
<link rel="stylesheet" href="{{asset('css/kategori-barang.css')}}">

@endsection
@section('title')
Data Barang
@endsection
   

    @section('tableHeader')

    <tr>
        <th>Kode Barang</th>
        <th>Kategori Barang</th>
        <th>Jenis Barang</th>
        <th>Satuan Unit</th>
        <th>Harga Satuan</th>
        <th>Harga Grosir</th>
        <th>Nilai Barang</th>
        <th>Created at</th>
        <th>Updated At</th>
        <th>Opsi</th>
    </tr>
    @endsection


    @section('tableBody')


        @foreach($allItem as $index => $i)

        <tr>
            <td>{{ $index+1 }}</td>
            <td>{{ $i->kategori_barang }}</td>
            <td>{{$i->jenis_barang}}</td>
            <td>{{$i->satuan_unit}}</td>
            <td>{{$i->harga_retail}}</td>
            <td>{{$i->harga_grosir}}</td>
            <td>{{$i->nilai_barang}}</td>
            <td>{{\Carbon\Carbon::parse($i->created_at)->format('d-m-Y')}}</td>
            <td>{{\Carbon\Carbon::parse($i->updated_at)->format('d-m-Y')}}</td>


            <td> <span>
                    <a href="" data-form="Edit Data" data-toggle="modal" data-target=#modal> Edit</a></span> |
                <span>
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <a class="delete-jquery" data-method="delete"
                        href="{{ route('barang.destroy', $i->id ) }}">Delete</a> </span></td>
        </tr>
        @endforeach
    @endsection
    
@section('modalId')
modalKategoriBarang
@endsection 

@section('modalForm')
<label for="kodeKategori">Kode Kategori </label>
<input class="form-control" type="text" id="kodeKategori" name="kode_kategori">
<label for="namaKategori">Nama Kategori </label>
<input class="form-control" type="text" name="nama_kategori" id="namaKategori">
@endsection

@section('scripts')
@parent

@endsection