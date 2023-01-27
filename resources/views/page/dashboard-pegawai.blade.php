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
                    <h6 class="m-0 font-weight-bold text-black" style="font-size:30px"> Data Pegawai</h6>
                </div>
                <div class="card-body">
                    <button type="button" class="btn btn-black" data-toggle="modal" data-target="#addModal">
                        <i class="fa fa-plus"> </i> <span> Tambah Pegawai </span>
                    </button>
                    <div class="table-responsive mt-3">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered" id="tablePegawai" role="grid"
                                    aria-describedby="dataTable_info" style="width: 100%;" width="100%" cellspacing="0">
                                    <thead>
                                        <th>NID</th>
                                        <th>Nama Pegawai</th>
                                        <th>Kompetensi</th>
                                        <th>Kampus</th>
                                        <th>Total Jam Mengajar</th>
                                        <th>Action</th>
                                    </thead>

                                    <tbody>
                                        @foreach ($dataPegawais as $pegawai)
                                            <tr role="row" class="odd">
                                                <td>{{ $pegawai->nid }}</td>
                                                <td>{{ $pegawai->nama_lengkap }}</td>
                                                <td>{{ $pegawai->lokasi_unit }}</td>
                                                <td>{{ $pegawai->posisi }}</td>
                                                <td> </td>
                                                <td>
                                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                        data-target="#detailModal"
                                                        onclick="showDetail('{{ $pegawai->nid }}')">
                                                        <i class="fas fa-list"> </i>
                                                    </button>
                                                    <button type="button" class="btn btn-info btn-sm btn-warning"
                                                        data-toggle="modal" data-target="#editModal"
                                                        onclick="showEdit('{{ $pegawai->nid }}')">
                                                        <i class="fa fa-pencil"> </i>
                                                    </button>
                                                    <button type="button"
                                                        data-pegawai-id= '{{$pegawai->nid}}'
                                                        data-toggle="modal" data-target="#deletePegawaiModal"
                                                        class="btn btn-info btn-sm btn-danger"> <i class="far fa-trash-alt"> </i>
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

            <div class="modal fade" id="addModal" tabindex="-1" role="dialog " aria-labelledby="addModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form id="form_add" action="{{ route('PostAddPegawai') }}" method="POST">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Tambah Pegawai</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <div id="dataadd">
                                    <div class="form-group">
                                        <label for="nid">ID</label>
                                        <input type="text" class="form-control" name="nid2">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_instruktur">Nama Pegawai</label>
                                        <input type="text" class="form-control" name="nama_instruktur2">
                                    </div>
                                    <div class="form-group">
                                        <label for="kompetensi_instruktur">Kompetensi</label>
                                        <input type="text" class="form-control" name="kompetensi_instruktur2">
                                    </div>
                                    <div class="form-group">
                                        <label for="status_instruktur">Status</label>
                                        <input type="text" class="form-control" name="status_instruktur2">
                                    </div>
                                    <div class="form-group">
                                        <label for="hp_instruktur">HP</label>
                                        <input type="text" class="form-control" name="hp_instruktur2">
                                    </div>
                                    <div class="form-group">
                                        <label for="email_instruktur">Email</label>
                                        <input type="text" class="form-control" name="email_instruktur2">
                                    </div>
                                    <div class="form-group">
                                        <label for="sertifikasi_tot">Sertifikasi TOT</label>
                                        <input type="text" class="form-control" name="sertifikasi_tot2">
                                    </div>
                                    <div class="form-group">
                                        <label for="kualifikasi_instruktur">Kualifikasi</label>
                                        <input type="text" class="form-control" name="kualifikasi_instruktur2">
                                    </div>
                                    <div class="form-group">
                                        <label for="kampus_instruktur">Kampus</label>
                                        <input type="text" class="form-control" name="kampus_instruktur2">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-secondary" data-dismiss="modal">Submit</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="detailModalLabel">Detail Pegawai</h5>
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
                                <div class="form-group">
                                    <label for="nid">ID</label>
                                    <input type="text" class="form-control" id="nid" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="kompetensi_instruktur">Competency Level</label>
                                    <input type="text" class="form-control" id="kompetensi_instruktur" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="status_instruktur">Status</label>
                                    <input type="text" class="form-control" id="status_instruktur" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="hp_instruktur">Kontak</label>
                                    <input type="text" class="form-control" id="hp_instruktur" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="email_instruktur">Email</label>
                                    <input type="text" class="form-control" id="email_instruktur" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="sertifikasi_tot">Sertifikasi TOT</label>
                                    <input type="text" class="form-control" id="sertifikasi_tot" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="kualifikasi_instruktur">Kualifikasi</label>
                                    <input type="text" class="form-control" id="kualifikasi_instruktur" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="kampus_instruktur">Kampus</label>
                                    <input type="text" class="form-control" id="kampus_instruktur" readonly>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="editModal" tabindex="-1" role="dialog " aria-labelledby="editModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form id="form_edit" action="{{ route('PostEditPegawai') }}" method="POST">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Edit Pegawai</h5>
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

                                    <input type="hidden" id="idKey" name="id_key" >
                                    <div class="form-group">
                                        <label for="nid">ID</label>
                                        <input type="text" class="form-control" id="nid"
                                            name="nid2">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_instruktur">Nama Pegawai</label>
                                        <input type="text" class="form-control" id="nama_instruktur2"
                                            name="nama_instruktur2">
                                    </div>
                                    <div class="form-group">
                                        <label for="kompetensi_instruktur">Kompetensi</label>
                                        <input type="text" class="form-control" id="kompetensi_instruktur2"
                                            name="kompetensi_instruktur2">
                                    </div>
                                    <div class="form-group">
                                        <label for="status_instruktur">Status</label>
                                        <input type="text" class="form-control" id="status_instruktur2"
                                            name="status_instruktur2">
                                    </div>
                                    <div class="form-group">
                                        <label for="hp_instruktur">HP</label>
                                        <input type="text" class="form-control" id="hp_instruktur2"
                                            name="hp_instruktur2">
                                    </div>
                                    <div class="form-group">
                                        <label for="email_instruktur">Email</label>
                                        <input type="text" class="form-control" id="email_instruktur2"
                                            name="email_instruktur2">
                                    </div>
                                    <div class="form-group">
                                        <label for="sertifikasi_tot">Sertifikasi TOT</label>
                                        <input type="text" class="form-control" id="sertifikasi_tot2"
                                            name="sertifikasi_tot2">
                                    </div>
                                    <div class="form-group">
                                        <label for="kualifikasi_instruktur">Kualifikasi</label>
                                        <input type="text" class="form-control" id="kualifikasi_instruktur2"
                                            name="kualifikasi_instruktur2">
                                    </div>
                                    <div class="form-group">
                                        <label for="kampus_instruktur">Kampus</label>
                                        <input type="text" class="form-control" id="kampus_instruktur2"
                                            name="kampus_instruktur2">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-secondary" data-dismiss="modal"
                                    onclick="submitForm()">Submit</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <div class="modal fade" id="deletePegawaiModal" tabindex="-1" role="dialog"
                aria-labelledby="deletePegawaiLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deletePegawaiLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('DeleteDataPegawai') }}"
                                id="deletePegawaiModalForm">
                                @csrf
                                <input type="hidden" name="nid" id="nid">
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
            document.getElementById('deletePegawaiModalForm').submit();">Delete</button>
                        </div>
                    </div>
                </div>
            </div>


        @endsection


        @section('script-js')
            <script>
                $(document).ready(function() {
                    $('#tablePegawai thead tr')
                        .clone(true)
                        .addClass('filters')
                        .appendTo('#tablePegawai thead');

                    $('#tablePegawai').DataTable({
                        "scrollX": true,
                        "order": [],
                        orderCellsTop: true,
                        fixedHeader: true,
                        initComplete: function() {
                            var api = this.api();

                            // For each column
                            api
                                .columns()
                                .eq(0)
                                .each(function(colIdx) {
                                    // Set the header cell to contain the input element
                                    var cell = $('.filters th').eq(
                                        $(api.column(colIdx).header()).index()
                                    );
                                    var title = $(cell).text();
                                    $(cell).html('<input type="text" placeholder="' + title + '" />');

                                    // On every keypress in this input
                                    $(
                                            'input',
                                            $('.filters th').eq($(api.column(colIdx).header()).index())
                                        )
                                        .off('keyup change')
                                        .on('change', function(e) {
                                            // Get the search value
                                            $(this).attr('title', $(this).val());
                                            var regexr =
                                                '({search})'; //$(this).parents('th').find('select').val();

                                            var cursorPosition = this.selectionStart;
                                            // Search the column for that value
                                            api
                                                .column(colIdx)
                                                .search(
                                                    this.value != '' ?
                                                    regexr.replace('{search}', '(((' + this.value +
                                                        ')))') :
                                                    '',
                                                    this.value != '',
                                                    this.value == ''
                                                )
                                                .draw();
                                        })
                                        .on('keyup', function(e) {
                                            e.stopPropagation();

                                            $(this).trigger('change');
                                            $(this)
                                                .focus()[0]
                                                .setSelectionRange(cursorPosition, cursorPosition);
                                        });
                                });
                        },
                    });
                });

                function showDetail(nid) {
                    console.log('showDetail clicked');
                    //console.log(nid);
                    $("#dataTidakAdaDetailModal").hide();
                    $("#dataDetail").hide();
                    $("#loadingDetailModal").show();

                    $.ajax({
                        url: "{!! route('getDetailPegawai') !!}",
                        data: {
                            nid : nid
                        },
                        dataType: 'json',
                        success: function(data) {
                            console.log(data);
                            let noTable = 1;
                            if (data) {
                                $("#nid").val(data.nid === null ? 'XXX' : data.nid)
                                $("#nama_instruktur").val(data.nama_insturktur === null ? 'XXX' : data.nama_insturktur)
                                $("#status_instruktur").val(data.status_instruktur === null ? 'XXX' : data
                                    .status_instruktur)
                                $("#hp_instruktur").val(data.hp_instruktur === null ? 'XXX' : data.hp_instruktur)
                                $("#email_instruktur").val(data.email_instruktur === null ? 'XXX' : data
                                    .email_instruktur)
                                $("#kualifikasi_instruktur").val(data.kualifikasi_instruktur === null ? 'XXX' : data
                                    .kualifikasi_instruktur)
                                $("#kampus_instruktur").val(data.kampus_instruktur === null ? 'XXX' : data
                                    .kampus_instruktur)
                                $("#sertifikasi_tot").val(data.sertifikasi_tot === null ? 'XXX' : data.sertifikasi_tot)
                                $("#kompetensi_instruktur").val(data.kompetensi_instruktur === null ? 'XXX' : data
                                    .kompetensi_instruktur)
                                $("#loadingDetailModal").hide();
                                $("#dataDetail").show();
                            } else {
                                $("#loadingDetailModal").hide();
                                $("#dataTidakAdaDetailModal").show();
                            }
                        }
                    })
                }

                function showEdit(nid) {
                    // console.log('showEdit clicked');
                    //console.log(nid);
                    $("#dataTidakAdaEditModal").hide();
                    $("#dataEdit").hide();
                    $("#loadingEditModal").show();

                    $.ajax({
                        url: "{!! route('getEditPegawai') !!}",
                        data: {
                            nid : nid
                        },
                        dataType: 'json',
                        success: function(data) {
                            //console.log(data);
                            let noTable = 1;

                            if (data) {

                                $("#idKey").val(data.id);
                                //alert($("#idKey").val());
                                $("#nid").val(data.nid === null ? 'XXX' : data.nid)
                                $("#nama_instruktur2").val(data.nama_insturktur === null ? 'XXX' : data.nama_instruktur)
                                $("#kompetensi_instruktur2").val(data.kompetensi_instruktur === null ? 'XXX' : data
                                    .kompetensi_instruktur)
                                $("#status_instruktur2").val(data.status_instruktur === null ? 'XXX' : data
                                    .status_instruktur)
                                $("#hp_instruktur2").val(data.hp_instruktur === null ? 'XXX' : data.hp_instruktur)
                                $("#email_instruktur2").val(data.email_instruktur === null ? 'XXX' : data
                                    .email_instruktur)
                                $("#sertifikasi_tot2").val(data.sertifikasi_tot === null ? 'XXX' : data.sertifikasi_tot)
                                $("#kualifikasi_instruktur2").val(data.kualifikasi_instruktur === null ? 'XXX' : data
                                    .kualifikasi_instruktur)
                                $("#kampus_instruktur2").val(data.kampus_instruktur === null ? 'XXX' : data
                                    .kampus_instruktur)
                                $("#update_terakhir2").val(data.update_terakhir)
                                $("#loadingEditModal").hide();
                                $("#dataEdit").show();
                            } else {
                                $("#loadingEditModal").hide();
                                $("#dataTidakAdaEditModal").show();
                            }
                        }
                    })
                }

                function submitForm() {
                    $("#form_edit").submit()
                }

                function SubmitEditPegawai(nid) {
                    console.log('showEdit clicked');
                    //console.log(nid);
                    $("#dataTidakAdaEditModal").hide();
                    $("#dataEdit").hide();
                    $("#loadingEditModal").show();

                    $.ajax({
                        url: "{!! route('PostEditPegawai') !!}",
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
                $('#deletePegawaiModal').on('show.bs.modal', function(e) {

                    //get data-id attribute of the clicked element
                    var nid = $(e.relatedTarget).data('pegawai-id');
                    //console.log(instruk);
                    //populate the textbox
                    //alert(nid)
                    $(e.currentTarget).find('input[name="nid"]').val(nid);
                });
            </script>
        @endsection
