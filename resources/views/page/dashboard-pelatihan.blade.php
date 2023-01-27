@extends('layouts.main')

@section('konten')

<div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
      @if(count($errors) > 0)
                  <div class="alert alert-danger">
                      @foreach ($errors->all() as $error)
                      {{ $error }} <br/>
                      @endforeach
                  </div>
                  @endif
      </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary" style="font-size:30px">Data Pelatihan</h6>
        </div>
        <div class="card-body">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus"></i>
            </button>
            <div class="table-responsive mt-3">
                <div class="row"><div class="col-sm-12">
                    <table class="table table-bordered" id="tableMasterPelatihan" role="grid" aria-describedby="dataTable_info" style="width: 100%;" width="100%" cellspacing="0">
                        <thead>
                            <th>Course ID</th>
                            <th>Course Title</th>
                            <th>Action</th>
                        </thead>

                        <tbody>
                            @foreach($pelatihans as $pelatihan)
                                <tr role="row" class="odd">
                                    <td>{{$pelatihan->course_id}}</td>
                                    <td>{{$pelatihan->course_title}}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-info">Detail</button>
                                    <button type="button" class="btn btn-info btn-sm btn-warning">Edit</button>
                                    <button
                                        type="button"
                                        data-pelatihan-id = {{$pelatihan->pelatihan_id}}
                                        data-toggle="modal"
                                        data-target="#deletPelatihanModal" class="btn btn-info btn-sm btn-danger">Delete</button>
                                </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('script-js')

<script>
    $(document).ready(function() {
        $('#tableMasterPelatihan').DataTable({
            "scrollX": true
        });
    });

</script>

@endsection
