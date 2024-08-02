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
           

            <div class="card">
              <div class="card-header">
                <h3 class="card-title mt-1">Daftar Surat Masuk</h3>
                <a href="surat-masuk/create" class="btn btn-primary btn-sm float-right"><i class="fas fa-plus"></i> Tambah Surat Masuk</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>No. Surat</th>
                    <th>Pengirim</th>
                    <th>Perihal</th>
                    <th>Tanggal Surat</th>
                    <th><i class="fas fa-cogs"></i></th>
                  </tr>
                  </thead>
                  <tbody>
                   @foreach($suratMasuk as $key) 
                  <tr>
                    <td>{{ $loop->iteration}}</td>
                    <td>{{ $key->nomor_surat}}</td>
                    <td>{{ $key->pengirim}}</td>
                    <td>{{ $key->perihal}}</td>
                    <td>{{ $key->tanggal_surat}}</td>
                    <td>
                        <a href="{{ route('surat-masuk.show', $key->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                        <a href="{{ route('surat-masuk.edit', $key->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-pen"></i></a>
                        <form action="{{ route('surat-masuk.destroy', $key->id) }}" method="POST" style="display: inline-block" onsubmit="return confirm('Apakah Anda yakin untuk menghapus?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                  </tr>
                  @endforeach

                </table>
              </div>
              <!-- /.card-body -->
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