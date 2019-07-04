@extends('admin.admin-template')
@section('css')

@endsection
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1>Ownner</h1>
            <p>Informasi Ownner Terdaftar</p>
        </div>
        <div class="btn-group float-right" role="group" aria-label="Basic example">
            <a class="btn btn-primary mr-1 mb-1 btn-sm" href="{{route('admin.ownner.create')}}">
                <i class="fa fa-plus"></i>Tambah Ownner</a> 
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="tile">
                <h3 class="tile-title">Daftar Ownner</h3>
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
                            @foreach ($ownners as $ownner)
                            <tr>
                                <td><b>{{$ownner->nama}}</b></td>
                                <td>{{$ownner->alamat}}</td>
                                <td>{{$ownner->username}}</td>
                                <td>{{$ownner->hp}}</td>
                                <td class="text-center">
                                    <a class="btn btn-outline-info btn-sm" href="{{route('admin.ownner.show', ['id'=> $ownner->id])}}">Detail</a>
                                    <a class="btn btn-outline-secondary btn-sm" href="{{route('admin.ownner.edit', ['id'=>$ownner->id])}}">Edit</a>
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
<script type="text/javascript" src="{{asset('js/plugins/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/plugins/dataTables.bootstrap.min.js')}}"></script>
<script type="text/javascript">$('#sampleTable').DataTable();</script>

@endsection
