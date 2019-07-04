@extends('ownner.ownner-template')
@section('css')

@endsection
@section('content')

<main class="app-content">
    <div class="app-title">
        <div>
            <h1>{{env("APP_NAME")}}</h1>
            <p>Selamat datang di dashboard Ownner</p>
        </div>
    </div>
  <div class="row">
      <div class="col-md-3 col-sm-12">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-tasks fa-3x"></i>
            <div class="info">
              <h4>Pasien Perawatan</h4>
              <p><b>10</b></p>
            </div>
          </div>
        </div>

      <div class="col-md-3 col-sm-12">
          <div class="widget-small warning coloured-icon"><i class="icon fa fa-newspaper-o fa-3x"></i>
            <div class="info">
              <h4>Pasien Terdaftar</h4>
              <p><b>10</b></p>
            </div>
          </div>
      </div>

  </div>

</main>

@endsection

@section('script')
@endsection
