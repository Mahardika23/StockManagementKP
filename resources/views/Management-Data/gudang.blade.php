@extends('Management-Data.layout')
@section('css')
@parent
<link rel="stylesheet" href="{{asset('css/kategori-barang.css')}}">

@endsection
@section('title')
Data Gudang
@endsection
   

    @section('tableHeader')

    <tr>
        <th>No</th>
        <th>Kode Gudang</th>
        <th>Alamat</th>
        <th>No Telp</th>
        <th>Status</th>
        <th>Opsi</th>
        <th>Dibuat Pada</th>
        <th>Terakhir Diubah</th>
    </tr>
    @endsection


    @section('tableBody')


        @foreach ($allData as $index => $w)

        <tr>
            <td>{{$index+1}}</td>
            <td>{{$w->kode_gudang}}</td>
            <td>{{$w->alamat}}</td>
            <td>{{$w->no_telp}}</td>
            <td>{{$w->status}}</td>
            
            <td>{{$w->created_at}}</td>
            <td>{{$w->updated_at}}</td>

            <td> <span>
            <a href="" data-form="Edit Data" data-toggle="modal" data-ctgid="{{$w->id}}" data-target=#modal> Edit</a></span> |
                <span>
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <a class="delete-jquery" data-method="delete"
                        href="{{ route('gudang.destroy', $w->id ) }}">Delete</a> </span></td>
        </tr>
        @endforeach
    @endsection

@section('modalId')
modalGudang
@endsection

@section('modalForm')
<label for="kodeGudang">Kode Gudang </label>
<input class="form-control" type="text" name="kode_gudang" id="kodeGudang">
<label for="Alamat">Alamat </label>
<textarea class="form-control" type="textarea" name="alamat" id="Alamat" rows="5"></textarea>
<label for="noTelp">No Telpon:  </label>
<input class="form-control" type="text" name="no_telp" id="kodeGudang">
<label for="status">Status</label>
<select class="form-control" name="" id="#status">
    <option value="aktif">Aktif</option>
    <option value="tidak aktif">Tidak Aktif</option>
</select>

@endsection

@section('scripts')
@parent

@endsection