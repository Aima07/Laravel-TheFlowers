@extends ('layout.app')

@section('content')
 <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Surat Keluar</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Beranda</a></li>
              <li class="breadcrumb-item active">Surat Keluar</li>
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
                <h3 class="card-title">Form Surat Keluar</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{ route('surat-keluar.update', $suratKeluar->id) }}" enctype="multipart/form-data">
                @csrf
                @method ('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <label for="">No. Surat</label>
                    <input type="text" class="form-control" id="" name="isiNo" value="{{ $suratKeluar->nomor_surat}}" placeholder="No. Surat" required>
                  </div>
                  <div class="form-group">
                    <label for="">Penerima</label>
                    <input type="text" class="form-control" id="" name="isiPenerima" value="{{ $suratKeluar->penerima}}" placeholder="Penerima" required>
                  </div>
                  <div class="form-group">
                    <label for="">Perihal</label>
                    <input type="text" class="form-control" id="" name="isiPerihal" value="{{ $suratKeluar->perihal}}" placeholder="Perihal" required>
                  </div>
                  <div class="form-group">
                    <label for="">Tanggal</label>
                    <input type="date" class="form-control" id="" name="isiTanggal" value="{{ $suratKeluar->tanggal_surat}}" id="" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Lampiran</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="lampiran" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Ubah</button>
                  <button type="reset" class="btn btn-danger">Reset</button>
                  <a href="{{ route('surat-keluar.index') }}" class="btn btn-warning float-right">Kembali</a>
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