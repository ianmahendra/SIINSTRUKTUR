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
                    <h6 class="m-0 font-weight-bold text-black" style="font-size:30px"> History Presensi</h6>
                </div>
                <div class="card-body">
                    <button type="button" class="btn btn-black" data-toggle="modal" data-target="#addModal"> </button>
                    <div class="table-responsive mt-1">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered" id="tableHistoryPresensi" role="grid"
                                    aria-describedby="dataTable_info" style="width: 100%;" width="100%" cellspacing="0">
                                    <thead>
                                        <th>Jam Presensi</th>
                                        <th>Nama Instruktur</th>
                                        <th>Kampus</th>
                                        <th>Judul Pelatihan</th>
                                        <th>Action</th>
                                    </thead>

                                    <tbody>
                                        @foreach ($dataPresensis as $presensi)
                                            <tr role="row" class="odd">
                                                <td>{{ $presensi->jam_start}} - {{ $presensi->jam_finish}}</td>
                                                <td>{{ $presensi->nama_instruktur }}</td>
                                                <td>{{ $presensi->kampus_instruktur }}</td>
                                                <td>{{ $presensi->course_title }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                        data-target="#detailModal"
                                                        onclick="showDetail('{{ $presensi->id }}')">
                                                        <i class="fas fa-list"> </i>
                                                    </button>
                                                    {{-- <button type="button" class="btn btn-info btn-sm btn-warning"
                                                        data-toggle="modal" data-target="#editModal"
                                                        onclick="showEdit('{{ $presensi->id }}')">
                                                        <i class="fa fa-pencil"> </i>
                                                    </button> --}}
                                                    <button type="button" data-id='{{ $presensi->id }}'
                                                        data-toggle="modal" data-target="#deleteHistoryPresensiModal"
                                                        class="btn btn-info btn-sm btn-danger"> <i class="far fa-trash-alt">
                                                        </i>
                                                    </button>
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

            <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="detailModalLabel">History</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="text-center">
                                <h3 id="loadingDetailModal">Loading ....</h3>
                                <h3 id="dataTidakAdaDetailModal">Data tidak ditemukan</h3>
                            </div>
                            <div id="datadetail">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="tgl_mulai">Tanggal</label>
                                            <input type="text" class="form-control" id="tgl_mulai" readonly>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="tgl_selesai">Tanggal Selesai</label>
                                            <input type="text" class="form-control" id="tgl_selesai" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="jam_start">Mulai</label>
                                            <input type="text" class="form-control" id="jam_start" readonly>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="jam_finish">Selesai</label>
                                            <input type="text" class="form-control" id="jam_finish" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="evidence_link">Evidence</label>
                                    <input type="text" class="form-control" id="evidence_link" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="evidence_file">Evidence</label>
                                    <input type="text" class="form-control" id="evidence_file" readonly>
                                </div>
                                <div class="modal-footer">
                                    <a class="btn btn-info" href="#" id="download_file"> Download File Evidence </a>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="modal fade" id="editModal" tabindex="-1" role="dialog " aria-labelledby="editModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form id="form_edit" action="{{ route('PostEditHistoryPresensi') }}" method="POST">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Edit History Presensi</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="text-center">
                                    <h3 id="loadingEditModal">Loading ....</h3>
                                    <h3 id="dataTidakAdaEditModal">Data tidak ditemukan</h3>
                                </div>
                                <div id="dataedit">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="tgl_mulai">Tanggal</label>
                                                <input type="text" class="form-control" name="tgl_mulai2" id="tgl_mulai2">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="tgl_selesai">Tanggal Selesai</label>
                                                <input type="text" class="form-control" name="tgl_selesai2" id="tgl_selesai2">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="jam_start">Mulai</label>
                                                <input type="text" class="form-control" name="jam_start2" id="jam_start2">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="jam_finish">Selesai</label>
                                                <input type="text" class="form-control" name="jam_finish2" id="jam_finish2">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="evidence_link">Evidence</label>
                                        <input type="text" class="form-control" name="evidence_link2" id="evidence_link2">
                                    </div>
                                    <div class="form-group">
                                        <label for="evidence_file">Evidence</label>
                                        <input type="text" class="form-control" name="evidence_link2"  id="evidence_file2">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-secondary" data-dismiss="modal"
                                            onclick="submitForm()">Submit</button>
                                    </div>
                                    <input type="hidden" name="id" id="id_presensi">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> --}}
        </div>

        <div class="modal fade" id="deleteHistoryPresensiModal" tabindex="-1" role="dialog"
            aria-labelledby="deleteHistoryPresensiLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteHistoryPresensiLabel">Menghapus Data History</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('DeleteDataHistoryPresensi') }}"
                            id="deleteHistoryPresensiModalForm">
                            @csrf
                            <input type="hidden" name="id" id="id">
                            <div class="text-center">
                                <p>Anda Yakin Untuk Delete?</p>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger" data-dismiss="modal"
                            onclick="
            event.preventDefault();
            document.getElementById('deleteHistoryPresensiModalForm').submit();">Delete</button>
                    </div>
                </div>
            </div>
        </div>


    @endsection


    @section('script-js')
        <script>
            $(document).ready(function() {
                $('#tableHistoryPresensi').DataTable({
                    "scrollX": true,
                    "order": [],
                    orderCellsTop: true,
                    fixedHeader: true,
                    initComplete: function() {
                        var api = this.api();

                        // For each column
                    },
                });
            });

            function showDetail(id) {
                console.log('showDetail clicked');
                $("#dataTidakAdaDetailModal").hide();
                $("#dataDetail").hide();
                $("#loadingDetailModal").show();

                $.ajax({
                    url: "{!! route('getDetailHistoryPresensi') !!}",
                    data: {
                        id : id
                    },
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        let noTable = 1;
                        if (data) {
                            $("#nama_instruktur").val(data.nama_instruktur === null ? 'XXX' : data.nama_instruktur)
                            $("#kampus_instruktur").val(data.kampus_instruktur === null ? 'XXX' : data.kampus_instruktur)
                            $("#course_title").val(data.course_title === null ? 'XXX' : data.course_title)
                            $("#tgl_mulai").val(data.tgl_mulai === null ? 'XXX' : data.tgl_mulai)
                            $("#tgl_selesai").val(data.tgl_selesai === null ? 'XXX' : data.tgl_selesai)
                            $("#jam_start").val(data.jam_start === null ? 'XXX' : data.jam_start)
                            $("#jam_finish").val(data.jam_finish === null ? 'XXX' : data.jam_finish)
                            $("#evidence_file").val(data.evidence_file === null ? 'XXX' : data.evidence_file)
                            $("#evidence_link").val(data.evidence_link === null ? 'XXX' : data.evidence_link)
                            $("#download_file").attr("href", "{{route("DownloadEvidence")}}?file=" + data.evidence_file)
                            $("#loadingDetailModal").hide();
                            $("#dataDetail").show();
                        } else {
                            $("#loadingDetailModal").hide();
                            $("#dataTidakAdaDetailModal").show();
                        }
                    }
                })
            }

            // function showEdit(id) {
            //     $("#dataTidakAdaEditModal").hide();
            //     $("#dataEdit").hide();
            //     $("#loadingEditModal").show();

            //     $.ajax({
            //         url: "{!! route('getEditHistoryPresensi') !!}",
            //         data: {
            //             id: id
            //         },
            //         dataType: 'json',
            //         success: function(data) {
            //             //console.log(data);
            //             let noTable = 1;

            //             if (data) {
            //                 $("#id_presensi").val(data.id)
            //                 $("#nama_instruktur2").val(data.nama_instruktur === null ? 'XXX' : data.nama_instruktur)
            //                 $("#kampus_instruktur2").val(data.kampus_instruktur === null ? 'XXX' : data.kampus_instruktur)
            //                 $("#course_title2").val(data.course_title === null ? 'XXX' : data.course_title)
            //                 $("#tgl_mulai2").val(data.tgl_mulai === null ? 'XXX' : data.tgl_mulai)
            //                 $("#tgl_selesai2").val(data.tgl_selesai === null ? 'XXX' : data.tgl_selesai)
            //                 $("#jam_start2").val(data.jam_start === null ? 'XXX' : data.jam_start)
            //                 $("#jam_finish2").val(data.jam_finish === null ? 'XXX' : data.jam_finish)
            //                 $("#evidence_file2").val(data.evidence_file === null ? 'XXX' : data.evidence_file)
            //                 $("#evidence_link2").val(data.evidence_link === null ? 'XXX' : data.evidence_link)
            //             } else {
            //                 $("#loadingEditModal").hide();
            //                 $("#dataTidakAdaEditModal").show();
            //             }
            //         }
            //     })
            // }

            function submitForm() {
                $("#form_edit").submit()
            }

            function SubmitEditHistoryPresensi(id) {
                console.log('showEdit clicked');
                //console.log(id_skillcomp);
                $("#dataTidakAdaEditModal").hide();
                $("#dataEdit").hide();
                $("#loadingEditModal").show();

                $.ajax({
                    url: "{!! route('PostEditHistoryPresensi') !!}",
                    data: $("#form_edit").serialize(),
                    method: "post",
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        let noTable = 1
                    }
                })
            }

            //triggered when modal is about to be shown
            $('#deleteHistoryPresensiModal').on('show.bs.modal', function(e) {

                //get data-id attribute of the clicked element
                var id = $(e.relatedTarget).data('id');
                //console.log(instruk);
                //populate the textbox
                //alert(id_skillcomp)
                $(e.currentTarget).find('input[name="id"]').val(id);
            });
        </script>
    @endsection
