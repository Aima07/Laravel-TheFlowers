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
                <h3 class="card-title">Form Surat Masuk</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{ route('surat-masuk.update', $suratMasuk->id) }}" enctype="multipart/form-data">
                @csrf
                @method ('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <label for="">No. Surat</label>
                    <input type="text" class="form-control" id="" name="isiNo" value="{{ $suratMasuk->nomor_surat}}" placeholder="No. Surat" required>
                  </div>
                  <div class="form-group">
                    <label for="">Pengirim</label>
                    <input type="text" class="form-control" id="" name="isiPengirim" value="{{ $suratMasuk->pengirim}}" placeholder="Pengirim" required>
                  </div>
                  <div class="form-group">
                    <label for="">Perihal</label>
                    <input type="text" class="form-control" id="" name="isiPerihal" value="{{ $suratMasuk->perihal}}" placeholder="Perihal" required>
                  </div>
                  <div class="form-group">
                    <label for="">Tujuan </label>
                    <input type="text" class="form-control" id="" name="isiTujuan" value="{{ $suratMasuk->tujuan_surat}}"placeholder="Tujuan" required>
                  </div>
                  <div class="form-group">
                    <label for="">Tanggal</label>
                    <input type="date" class="form-control" id="" name="isiTanggal" value="{{ $suratMasuk->tanggal_surat}}" id="" required>
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