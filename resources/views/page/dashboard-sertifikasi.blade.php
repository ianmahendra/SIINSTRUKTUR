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
                    <h6 class="m-0 font-weight-bold text-black" style="font-size:30px"> Data Sertifikasi</h6>
                </div>
                <div class="card-body">
                    <button type="button" class="btn btn-black" data-toggle="modal" data-target="#addModal">
                        <i class="fa fa-plus"> </i> <span> Tambah Sertifikasi </span>
                    </button>
                    <div class="table-responsive mt-3">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered" id="tableSertifikasi" role="grid"
                                    aria-describedby="dataTable_info" style="width: 100%;" width="100%" cellspacing="0">
                                    <thead>
                                        <th>ID Sertifikasi</th>
                                        <th>Nama Sertifikasi</th>
                                        <th>Competency Level</th>
                                        <th>Action</th>
                                    </thead>

                                    <tbody>
                                        @foreach ($dataSertifikasis as $sertifikasi)
                                            <tr role="row" class="odd">
                                                <td>{{ $sertifikasi->id_skillcomp }}</td>
                                                <td>{{ $sertifikasi->skill_comp }}</td>
                                                <td>{{ $sertifikasi->competency_level }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                        data-target="#detailModal"
                                                        onclick="showDetail('{{ $sertifikasi->id_skillcomp }}')">
                                                        <i class="fas fa-list"> </i>
                                                    </button>
                                                    <button type="button" class="btn btn-info btn-sm btn-warning"
                                                        data-toggle="modal" data-target="#editModal"
                                                        onclick="showEdit('{{ $sertifikasi->id_skillcomp }}')">
                                                        <i class="fa fa-pencil"> </i>
                                                    </button>
                                                    <button type="button"
                                                        data-sertifikasi-id= '{{$sertifikasi->id_skillcomp}}'
                                                        data-toggle="modal" data-target="#deleteSertifikasiModal"
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
                        <form id="form_add" action="{{ route('PostAddSertifikasi') }}" method="POST">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Tambah Sertifikasi</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <div id="dataadd">
                                    <div class="form-group">
                                        <label for="id_skillcomp">ID</label>
                                        <input type="text" class="form-control" name="id_skillcomp2">
                                    </div>
                                    <div class="form-group">
                                        <label for="skill_comp">Nama Sertifikasi</label>
                                        <input type="text" class="form-control" name="skill_comp2">
                                    </div>
                                    <div class="form-group">
                                        <label for="competency_level">Competency Level</label>
                                        <input type="text" class="form-control" name="competency_level2">
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
                            <h5 class="modal-title" id="detailModalLabel">Detail Sertifikasi</h5>
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
                                    <label for="id_skillcomp">ID</label>
                                    <input type="text" class="form-control" id="id_skillcomp" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="skill_comp">Nama Sertifikasi</label>
                                    <input type="text" class="form-control" id="skill_comp" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="competency_level">Status</label>
                                    <input type="text" class="form-control" id="competency_level" readonly>
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
                        <form id="form_edit" action="{{ route('PostEditSertifikasi') }}" method="POST">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Edit Sertifikasi</h5>
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
                                        <label for="id_skillcomp">ID</label>
                                        <input type="text" class="form-control" id="id_skillcomp2"
                                            name="id_skillcomp2">
                                    </div>
                                    <div class="form-group">
                                        <label for="skill_comp">Nama Sertifikasi</label>
                                        <input type="text" class="form-control" id="skill_comp2"
                                            name="skill_comp2">
                                    </div>
                                    <div class="form-group">
                                        <label for="competency_level">Kompetensi</label>
                                        <input type="text" class="form-control" id="competency_level2"
                                            name="competency_level2">
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

            <div class="modal fade" id="deleteSertifikasiModal" tabindex="-1" role="dialog"
                aria-labelledby="deleteSertifikasiLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteSertifikasiLabel">Menghapus Data Sertifikasi</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('DeleteDataSertifikasi') }}"
                                id="deleteSertifikasiModalForm">
                                @csrf
                                <input type="hidden" name="id_skillcomp" id="id_skillcomp">
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
            document.getElementById('deleteSertifikasiModalForm').submit();">Delete</button>
                        </div>
                    </div>
                </div>
            </div>


        @endsection


        @section('script-js')
            <script>
                $(document).ready(function() {
                    $('#tableSertifikasi thead tr')
                        .clone(true)
                        .addClass('filters')
                        .appendTo('#tableSertifikasi thead');

                    $('#tableSertifikasi').DataTable({
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

                function showDetail(id_skillcomp) {
                    console.log('showDetail clicked');
                    //console.log(id_instruktur);
                    $("#dataTidakAdaDetailModal").hide();
                    $("#dataDetail").hide();
                    $("#loadingDetailModal").show();

                    $.ajax({
                        url: "{!! route('getDetailSertifikasi') !!}",
                        data: {
                            id_skillcomp : id_skillcomp
                        },
                        dataType: 'json',
                        success: function(data) {
                            console.log(data);
                            let noTable = 1;
                            if (data) {
                                $("#id_skillcomp").val(data.id_skillcomp === null ? 'XXX' : data.id_skillcomp)
                                $("#skill_comp").val(data.skill_comp === null ? 'XXX' : data.skill_comp)
                                $("#competency_level").val(data.competency_level === null ? 'XXX' : data.competency_level)
                                $("#loadingDetailModal").hide();
                                $("#dataDetail").show();
                            } else {
                                $("#loadingDetailModal").hide();
                                $("#dataTidakAdaDetailModal").show();
                            }
                        }
                    })
                }

                function showEdit(id_skillcomp) {
                    // console.log('showEdit clicked');
                    //console.log(id_instruktur);
                    $("#dataTidakAdaEditModal").hide();
                    $("#dataEdit").hide();
                    $("#loadingEditModal").show();

                    $.ajax({
                        url: "{!! route('getEditSertifikasi') !!}",
                        data: {
                            id_skillcomp: id_skillcomp
                        },
                        dataType: 'json',
                        success: function(data) {
                            //console.log(data);
                            let noTable = 1;

                            if (data) {

                                $("#idKey").val(data.id);
                                //alert($("#idKey").val());
                                $("#id_skillcomp2").val(data.id_skillcomp === null ? 'XXX' : data.id_skillcomp)
                                $("#skill_comp2").val(data.skill_comp === null ? 'XXX' : data.skill_comp)
                                $("#competency_level2").val(data.competency_level === null ? 'XXX' : data.competency_level)
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

                function SubmitEditSertifikasi(id_skillcomp) {
                    console.log('showEdit clicked');
                    //console.log(id_skillcomp);
                    $("#dataTidakAdaEditModal").hide();
                    $("#dataEdit").hide();
                    $("#loadingEditModal").show();

                    $.ajax({
                        url: "{!! route('PostEditSertifikasi') !!}",
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
                $('#deleteSertifikasiModal').on('show.bs.modal', function(e) {

                    //get data-id attribute of the clicked element
                    var id_skillcomp = $(e.relatedTarget).data('sertifikasi-id');
                    //console.log(instruk);
                    //populate the textbox
                    //alert(id_skillcomp)
                    $(e.currentTarget).find('input[name="id_skillcomp"]').val(id_skillcomp);
                });
            </script>
        @endsection
