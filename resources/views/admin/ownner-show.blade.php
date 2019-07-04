@extends('admin.admin-template')
@section('css')
@endsection
@section('content')
<main class="app-content">
    <div class="app-title">
            <div class="media">
            <img src="{{asset($ownner->foto)}}" style="max-height: 55px" alt="Icon ownner" class="mr-3">
            <div class="media-body">
                <h5 class="mt-0">{{$ownner->nama}}</h5>
                {{$ownner->alamat}}
            </div>
            </div>
    </div>

    <div class="row justify-content-md-center">
        <div class="col-md-12 col-sm-12">
			<div class="tile">
                <div class="row">
                    <div class="col-md-3 col-sm-12">
                        @if (!empty($ownner->foto))
                        <img src="{{asset($ownner->foto)}}" style="max-width: 100%" class="rounded" alt="Icon ownner" class="mr-3">
                        @else
                        <div class="text-center m-3">
                        <i class="fa fa-user-circle-o fa-5x" aria-hidden="true"></i>
                        </div>
                        @endif
                    </div>
                    <div class="col-md-9 col-sm-12">

                        <table class="table table-sm ">
                            <tr><td>Nama</td> <td>{{$ownner->nama}}</td></tr>
                            <tr><td>Username</td> <td>{{$ownner->username}}</td></tr>
                            <tr><td>Alamat</td> <td>{{$ownner->alamat}}</td></tr>
                            <tr><td>HP</td> <td>{{$ownner->hp}}</td></tr>
                        </table>
                    </div>
                </div>

                <hr>
                <div class="row">
                    <div class="col-sm-12">
                        <strong>Member Outlet</strong> <br><br>
                        <table class="table table-sm table-bordered">
                            <thead>
                            <tr>
                                <th>Nama Oulet</th>
                                <th>Alamat</th>
                                <th>Username</th>
                                <th>Hp</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($ownner->outlet()->get() as $outlet)
                            <tr>
                                <td>{{$outlet->nama}}</td>
                                <td>{{$outlet->alamat}}</td>
                                <td>{{$outlet->username}}</td>
                                <td>{{$outlet->hp}}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <div class="row d-print-none mt-2">
                    <div class="col-12 text-right">
                        <a class="btn btn-primary" href="javascript:window.print();" target="_blank"><i class="fa fa-print"></i> Print</a>
                    </div>
                </div>

            
            </div>
        </div>

    </div>
    
</main>

@endsection

@section('script')
<script>
   
</script>
@endsection
