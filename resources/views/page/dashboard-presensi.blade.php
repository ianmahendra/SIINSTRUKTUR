@extends('layouts.main')

@section('css-custom')
    <style>
        thead input {
            width: 100%;
        }
    </style>
@endsection

@section('konten')

    <html>

    <head>
        <title>Font Awesome Icons</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                {{ $error }} <br />
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-black" style="font-size:30px"> Input Presensi</h6>
                </div>
                <div class="card-body">
                    <form enctype="multipart/form-data" action="{{route('PostAddPresensi')}}" method="POST">
                        @csrf
                        <div class="form-group">
                          <label for="nama_instruktur">Nama Instruktur</label>
                          <input list="nama_instrukturs" class="form-control" name="nama_instruktur" id="nama_instruktur">
                          <datalist id="nama_instrukturs">
                            @foreach ($instrukturs as $instruktur)
                                <option value="{{$instruktur -> nama_instruktur}}">
                            @endforeach
                          </datalist>
                        </div>
                        <div class="form-group">
                            <label for="kampus_instruktur">Kampus</label>
                            <input list="kampus_instrukturs" class="form-control" name="kampus_instruktur" id="kampus_instruktur">
                            <datalist id="kampus_instrukturs">
                              @foreach ($kampuss as $kampus)
                                  <option value="{{$kampus -> kampus_instruktur}}">
                              @endforeach
                            </datalist>
                          </div>
                          <div class="form-group">
                            <label for="pelatihan">Judul Pelatihan / Kelas</label>
                            <input list="courses_title" class="form-control" name="course_title" id="course_title">
                            <datalist id="courses_title">
                              @foreach ($pelatihans as $pelatihan)
                                  <option value="{{$pelatihan -> course_title}}">
                              @endforeach
                            </datalist>
                          </div>
                          <div class="form-group">
                            <label for="tgl_mulai">Tanggal Mulai</label>
                            <input type="date" class="form-control" name="tgl_mulai" id="tgl_mulai">
                          </div>
                          <div class="form-group">
                            <label for="tgl_selesai">Tanggal Selesai</label>
                            <input type="date" class="form-control" name="tgl_selesai" id="tgl_selesai">
                          </div>
                          <div class="form-group">
                            <label for="jam_start">Jam Mulai</label>
                            <input type="time" class="form-control" name="jam_start" id="jam_start">
                          </div>
                          <div class="form-group">
                            <label for="jam_finish">Jam Selesai</label>
                            <input type="time" class="form-control" name="jam_finish" id="jam_finish">
                          </div>
                          <div class="form-group">
                            <label for="evidence">Evidence</label>
                            <div class="row">
                                <div class="col-2"> <input type="file" class="form-control" name="evidence_file" id="evidence_file"></div>
                                <div class="col-10"> <input type="text" class="form-control" name="evidence_link" id="evidence_link"></div>
                            </div>
                          </div>
                        <hr class="sidebar-divider d-none d-md-block" style=";margin-top:25px ;margin-bottom:25px">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>

        @endsection
        @section('script-js')
        @endsection
