@extends ('layout.app')

@section('content')
 <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Surat Masuk</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Beranda</a></li>
              <li class="breadcrumb-item active">Surat Masuk</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           

                    <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Detail Surat Bernomor</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{ route('surat-masuk.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="">No. Surat</label>
                    <input type="text" class="form-control" value="{{ $suratMasuk->nomor_surat }}" readonly>
                  </div>
                  <div class="form-group">
                    <label for="">Pengirim</label>
                    <input type="text" class="form-control" value="{{ $suratMasuk->pengirim }}" readonly>
                  </div>
                  <div class="form-group">
                    <label for="">Perihal</label>
                    <input type="text" class="form-control" value="{{ $suratMasuk->perihal }}" readonly>
                  </div>
                  <div class="form-group">
                    <label for="">Tujuan </label>
                    <input type="text" class="form-control" value="{{ $suratMasuk->tujuan_surat }}" readonly>
                  </div>
                  <div class="form-group">
                    <label for="">Tanggal</label>
                    <input type="text" class="form-control" value="{{ $suratMasuk->tanggal_surat }}"readonly>
                  </div>
                @if($suratMasuk->lampiran)
                <div class="form-group">
                <label for="">Lampiran</label>
                <a href="{{ url('uploads/'.$suratMasuk->lampiran) }}" class="form-control">{{ $suratMasuk->lampiran }}</a>
                </div>
                @endif
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <a href="{{ route('surat-masuk.index') }}" class="btn btn-warning float-right">Kembali</a>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection