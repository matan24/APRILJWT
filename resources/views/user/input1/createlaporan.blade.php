@extends('layouts.user')

@section('title', 'Input Laporan | April Group')

@section('container')

       <!-- Begin Page Content -->
       <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tables</h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the <a target="_blank"
                href="https://datatables.net">official DataTables documentation</a>.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-4">
                <h4 class="m-0 font-weight-bold text-primary">Input Laporan Harian Kerja</h4>
                <form action="" method="post">
                    @csrf
                    <br>
                    @if (session('status'))
                        <div class="alert alert-primary">
                            {{ session('status') }}
                        </div>
                    @endif
                    <br>
  
                    <div class="mb-3 row">
                      <label for="nama" class="col-sm-2 col-form-label">Nama karyawan</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="nama" id="nama">
                      </div>
                    </div>
  
                    <div class="mb-3 row">
                      <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="jabatan" id="jabatan">
                      </div>
                    </div>

                    <div class="mb-3 row">
                      <label for="wilayah" class="col-sm-2 col-form-label">Wilayah kerja</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="wilayah" id="wilayah">
                      </div>
                    </div>

                    <div class="mb-3 row">
                      <label for="laporan" class="col-sm-2 col-form-label">Laporan kerja harian</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="laporan" id="laporan">
                      </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="alamat" id="alamat">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="hp" class="col-sm-2 col-form-label">WhatsApp/HP</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="hp" id="hp">
                        </div>
                    </div>
        
                    <div class="col-sm-8">
                        <button type="submit" class="btn btn-info">Simpan</button>
                    </div>    
                </form>
                <br>
            </div>
        </div>

    </div>

@endsection
