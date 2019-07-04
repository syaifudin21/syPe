@extends('admin.admin-template')
@section('css')

@endsection
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1>Dokter {{$outlet->nama}} Update</h1>
            <p>Informasi outlet akan diedit</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
			<div class="tile">
			  <div class="tile-body">
				<form class="form-horizontal" id="submit-form" enctype="multipart/form-data" method="post" action="{{route('admin.outlet.update')}}">
                    {{ csrf_field() }} @method('PUT') <input type="hidden" name="id" value="{{$outlet->id}}">
    
                        <div class="row">
    
                            <div class="col-md-9 col-sm-12">
                               <div class="form-group row">
                                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Reporter" value="{{$outlet->nama}}">
                                        @if ($errors->has('nama'))
                                            <small class="form-text text-muted">{{ $errors->first('nama') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="{{$outlet->username}}">
                                        @if ($errors->has('username'))
                                            <small class="form-text text-muted">{{ $errors->first('username') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="hp" class="col-sm-2 col-form-label">Handphone</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="hp" id="hp" placeholder="Handphone" value="{{$outlet->hp}}">
                                        @if ($errors->has('hp'))
                                            <small class="form-text text-muted">{{ $errors->first('hp') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="alamat" id="alamat" placeholder="Alamat">{{$outlet->alamat}}</textarea>
                                        @if ($errors->has('alamat'))
                                            <small class="form-text text-muted">{{ $errors->first('alamat') }}</small>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="password" id="password" placeholder="Password Reporter" value="{{old('password')}}">
                                        @if ($errors->has('password'))
                                            <small class="form-text text-muted">{{ $errors->first('password') }}</small>
                                        @endif
                                    </div>
                                </div>
    
    
                                <div class="form-group row">
                                    <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" onchange="fotoURl(this)" name="foto" id="staticEmail" >
                                        @if ($errors->has('foto'))
                                            <small class="form-text text-muted">{{ $errors->first('foto') }}</small>
                                        @endif
                                    </div>
    
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <img src="{{(!empty($outlet->foto))?asset($outlet->foto): asset('images/thumbnail.svg')}}" style="max-height: 130px" class="rounded" alt="thumbnail" id="foto">
                            </div>
                        </div>
                        <input type="hidden" name="redirect" value="{{url()->previous()}}">
                    </form>

			  </div>
			  <div class="tile-footer">
				<div class="row">
				  <div class="col-md-8 col-md-offset-3">
					<button class="btn btn-primary" onclick="event.preventDefault(); document.getElementById('submit-form').submit();"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>
					<a class="btn btn-secondary" href="{{url()->previous()}}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Batal</a>
					<small class="form-text text-muted" id="jadwalhelp">Dokter dapat merubah password</small>
				</div>
				</div>
			  </div>
			</div>
		  </div>

    </div>
</main>

@endsection

@section('script')
<script>
function fotoURl(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#foto').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection
