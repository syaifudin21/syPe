@extends('outlet.outlet-template')
@section('css')

@endsection
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1>Kasir</h1>
            <p>Informasi Kasir Terdaftar</p>
        </div>
        <div class="btn-group float-right" role="group" aria-label="Basic example">
            <a class="btn btn-primary mr-1 mb-1 btn-sm" href="{{route('outlet.kasir.create')}}">
                <i class="fa fa-plus"></i>Tambah Kasir</a> 
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="tile">
                <h3 class="tile-title">Daftar Kasir</h3>
                <div class="bs-component">
                    <table id="sampleTable" class="table table-sm">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Username</th>
                                <th>hp</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kasirs as $kasir)
                            <tr>
                                <td><b>{{$kasir->nama}}</b></td>
                                <td>{{$kasir->alamat}}</td>
                                <td>{{$kasir->username}}</td>
                                <td>{{$kasir->hp}}</td>
                                <td class="text-center">
                                    <a class="btn btn-outline-info btn-sm" href="{{route('outlet.kasir.show', ['id'=> $kasir->id])}}">Detail</a>
                                    <a class="btn btn-outline-secondary btn-sm" href="{{route('outlet.kasir.edit', ['id'=>$kasir->id])}}">Edit</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

            </div>

        </div>

        <div class="col-md-4">
            <div class="tile">
                <h3 class="tile-title">Status Outlet</h3>
                <hr>
                <div class="bs-component">
                    <b> ON</b><br>
                    Status dokter masih bekerja
                    <hr>

                    <b> OFF</b><br>
                    Dokter tidak bisa diganggu
                </div>
            </div>


        </div>
    </div>
</main>


@endsection

@section('script')
@endsection
