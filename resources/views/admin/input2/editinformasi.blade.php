@extends('layouts.admin')

@section('title', 'Update Informasi | April Group')

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
                <h4 class="m-0 font-weight-bold text-primary">Input Informasi Terbaru</h4>

                <form action="{{ route('admin.input2.editinformasi.update', $informasi->id ) }}" method="post">
                    @method('patch')
                    @csrf
                    <br>
                    @if (session('status'))
                        <div class="alert alert-info">
                            {{ session('status') }}
                        </div>
                    @endif
                    <br>
  
                    <div class="mb-3 row">
                      <label for="judul" class="col-sm-2 col-form-label">Informasi</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="judul" id="judul" value="{{ $informasi->judul }}">
                      </div>
                    </div>
  
                    <div class="mb-3 row">
                      <label for="keterangan_pekerjaan" class="col-sm-2 col-form-label">Keterangan pekerjaan</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="keterangan_pekerjaan" id="keterangan_pekerjaan"
                        value="{{ $informasi->keterangan_pekerjaan }}">
                      </div>
                    </div>
  
                    <div class="mb-3 row">
                      <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                      <div class="col-sm-8">
                        <input type="date" class="form-control" name="tanggal" id="tanggal" value="{{ $informasi->tanggal }}">
                      </div>
                    </div>
  
                    <div class="mb-3 row">
                        <label for="status_pekerjaan" class="col-sm-2 col-form-label">Status pekerjaan</label>
                        <div class="col-sm-8">
                            <select id="status_pekerjaan" name="status_pekerjaan" class="form-control custom-select">
                                <option selected disabled>Pilih</option>
                                <option {{ $informasi->status_pekerjaan == 'Selesaikan dalam hari ini' ? 'selected' : '' }} value="Selesaikan dalam hari ini">
                                  Selesaikan dalam hari ini
                                </option>
                                <option {{ $informasi->status_pekerjaan == 'Selesaikan dalam minggu ini' ? 'selected' : '' }} value="Selesaikan dalam minggu ini">
                                  Selesaikan dalam minggu ini
                                </option>
                                <option {{ $informasi->status_pekerjaan == 'Selesaikan minggu depan' ? 'selected' : '' }} value="Selesaikan minggu depan">
                                  Selesaikan minggu depan
                                </option>  
                            </select>
                        </div>
                    </div> 
        
                    <div class="col-sm-8">
                        <button type="submit" class="btn btn-info">Update</button>
                    </div>    
                </form>
                <br>
            </div>
        </div>

    </div>


@endsection