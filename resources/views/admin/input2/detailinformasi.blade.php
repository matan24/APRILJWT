@extends('layouts.admin')

@section('title', 'Detail Informasi | April Group')

@section('container')

       <!-- Begin Page Content -->
       <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tables</h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the <a target="_blank"
                href="{{ asset('admin2/https://datatables.net') }}">official DataTables documentation</a>.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-4">
                <h4 class="m-0 font-weight-bold text-primary">Input Informasi Terbaru</h4>
                    <br>
                    @if (session('status'))
                        <div class="alert alert-info">
                            {{ session('status') }}
                        </div>
                    @endif
                    <br>
                    <a href="{{ route('admin.input2.createinformasi') }}" class="btn btn-info">Kembali</a>
                    <br><br>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Informasi</th>
                                <th>Keterangan pekerjaan</th>
                                <th>Tanggal</th>
                                <th>Status pekerjaan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($informasi as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->judul }}</td>
                                <td>{{ $item->keterangan_pekerjaan }}</td>
                                <td>{{ $item->tanggal }}</td>                
                                <td>{{ $item->status_pekerjaan }}</td>
                                <td class="">
                                    <a href="{{ route('admin.input2.editinformasi', $item->id ) }}" class="btn btn-warning btn-lg mb-2"><i class="bi bi-pencil-fill"></i></a> 
                  
                                    <form action="{{ route('admin.input2.detailinformasi.delete', $item->id ) }}" method="post">
                                      @method('delete')
                                      @csrf 
                                      <button type="submit" class="btn btn-danger btn-lg mr-2"><i class="bi bi-trash"></i></button>
                                    </form>
                  
                                </td>          
                            </tr>
                            @endforeach   
                        </tbody>                                
                    </table>
            
            </div>
        </div>

    </div>


@endsection

