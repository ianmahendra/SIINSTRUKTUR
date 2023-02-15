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
                    <h6 class="m-0 font-weight-bold text-black" style="font-size:30px"> Data Training</h6>
                </div>
                <div class="card-body">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
                        <i class="fa fa-plus"> </i> <span> Tambah Training </span>
                    </button>
                    <div class="table-responsive mt-3">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered" id="tablePelatihan" role="grid"
                                    aria-describedby="dataTable_info" style="width: 100%;" width="100%" cellspacing="0">
                                    <thead>
                                        <th>ID Pelatihan</th>
                                        <th>Judul Training</th>
                                        <th>Jenis Pelatihan</th>
                                        <th>Action</th>
                                    </thead>

                                    <tbody>
                                        @foreach ($dataPelatihans as $pelatihan)
                                            <tr role="row" class="odd">
                                                <td>{{ $pelatihan->course_id }}</td>
                                                <td>{{ $pelatihan->course_title }}</td>
                                                <td>{{ $pelatihan->jenis_pelatihan }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                        data-target="#detailModal"
                                                        onclick="showDetail('{{ $pelatihan->course_id }}')">
                                                        <i class="fas fa-list"> </i>
                                                    </button>
                                                    <button type="button" class="btn btn-info btn-sm btn-warning"
                                                        data-toggle="modal" data-target="#editModal"
                                                        onclick="showEdit('{{ $pelatihan->course_id }}')">
                                                        <i class="fa fa-pencil"> </i>
                                                    </button>
                                                    <button type="button"
                                                        data-pelatihan-id= '{{$pelatihan->course_id}}'
                                                        data-toggle="modal" data-target="#deletePelatihanModal"
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
                        <form id="form_add" action="{{ route('PostAddPelatihan') }}" method="POST">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Tambah Training</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <div id="dataadd">
                                    <div class="form-group">
                                        <label for="course_id">ID</label>
                                        <input type="text" class="form-control" name="course_id2">
                                    </div>
                                    <div class="form-group">
                                        <label for="course_title">Nama Sertifikasi</label>
                                        <input type="text" class="form-control" name="course_title2">
                                    </div>
                                    <div class="form-group">
                                        <label for="jenis_pelatihan">Competency Level</label>
                                        <input type="text" class="form-control" name="jenis_pelatihan2">
                                    </div>
                                    <div class="form-group">
                                        <label for="train_location1">Lokasi Pelatihan 1</label>
                                        <input type="text" class="form-control" name="train_location12">
                                    </div>
                                    <div class="form-group">
                                        <label for="train_location2">Lokasi Pelatihan 2</label>
                                        <input type="text" class="form-control" name="train_location22">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success"> <i class="fa fa-plus"></i> Tambah </button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"> <i class="fas fa-times"></i> Close</button>
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
                            <h5 class="modal-title" id="detailModalLabel">Detail Training</h5>
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
                                    <label for="course_id">ID</label>
                                    <input type="text" class="form-control" id= "course_id" name="course_id" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="course_title">Nama Sertifikasi</label>
                                    <input type="text" class="form-control" id= "course_title" name="course_title" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="jenis_pelatihan">Jenis Pelatihan</label>
                                    <input type="text" class="form-control" id= "jenis_pelatihan" name="jenis_pelatihan" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="train_location1">Lokasi Pelatihan 1</label>
                                    <input type="text" class="form-control" id= "train_location1" name="train_location1" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="train_location2">Lokasi Pelatihan 2</label>
                                    <input type="text" class="form-control" id= "train_location2" name="train_location2" readonly>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
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
                        <form id="form_edit" action="{{ route('PostEditPelatihan') }}" method="POST">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Edit Training</h5>
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
                                        <label for="course_id">ID Training</label>
                                        <input type="text" class="form-control" id="course_id2" name="course_id2">
                                    </div>
                                    <div class="form-group">
                                        <label for="course_title">Nama Training</label>
                                        <input type="text" class="form-control" id="course_title2" name="course_title2">
                                    </div>
                                    <div class="form-group">
                                        <label for="jenis_pelatihan">Jenis Training</label>
                                        <input type="text" class="form-control" id="jenis_pelatihan2" name="jenis_pelatihan2">
                                    </div>
                                    <div class="form-group">
                                        <label for="train_location1">Lokasi Training 1</label>
                                        <input type="text" class="form-control" id="train_location12" name="train_location12">
                                    </div>
                                    <div class="form-group">
                                        <label for="train_location2">Lokasi Training 2</label>
                                        <input type="text" class="form-control" id="train_location22"name="train_location22">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success" data-dismiss="modal"
                                    onclick="submitForm()"><i class="fa fa-pencil"> </i> Submit</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"> </i> Close</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <div class="modal fade" id="deletePelatihanModal" tabindex="-1" role="dialog"
                aria-labelledby="deletePelatihanLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deletePelatihanLabel">Menghapus Data Training</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('DeleteDataPelatihan') }}"
                                id="deletePelatihanModalForm">
                                @csrf
                                <input type="hidden" name="course_id" id="course_id">
                                <div class="text-center">
                                    <p>Anda Yakin Untuk Delete?</p>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger" data-dismiss="modal"
                            onclick="
        event.preventDefault();
        document.getElementById('deletePelatihanModalForm').submit();"> <i class="far fa-trash-alt"></i> Delete</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"> <i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>


        @endsection


        @section('script-js')
            <script>
                $(document).ready(function() {
                    $('#tablePelatihan thead tr')
                        .addClass('filters')
                        .appendTo('#tablePelatihan thead');

                    $('#tablePelatihan').DataTable({
                        "scrollX": true,
                        "order": [],
                        orderCellsTop: true,
                        fixedHeader: true,
                        // // initComplete: function() {
                        // //     var api = this.api();

                        //     // For each column
                        //     api
                        //         .columns()
                        //         .eq(0)
                        //         .each(function(colIdx) {
                        //             // Set the header cell to contain the input element
                        //             var cell = $('.filters th').eq(
                        //                 $(api.column(colIdx).header()).index()
                        //             );
                        //             var title = $(cell).text();
                        //             $(cell).html('<input type="text" placeholder="' + title + '" />');

                        //             // On every keypress in this input
                        //             $(
                        //                     'input',
                        //                     $('.filters th').eq($(api.column(colIdx).header()).index())
                        //                 )
                        //                 .off('keyup change')
                        //                 .on('change', function(e) {
                        //                     // Get the search value
                        //                     $(this).attr('title', $(this).val());
                        //                     var regexr =
                        //                         '({search})'; //$(this).parents('th').find('select').val();

                        //                     var cursorPosition = this.selectionStart;
                        //                     // Search the column for that value
                        //                     api
                        //                         .column(colIdx)
                        //                         .search(
                        //                             this.value != '' ?
                        //                             regexr.replace('{search}', '(((' + this.value +
                        //                                 ')))') :
                        //                             '',
                        //                             this.value != '',
                        //                             this.value == ''
                        //                         )
                        //                         .draw();
                        //                 })
                        //                 .on('keyup', function(e) {
                        //                     e.stopPropagation();

                        //                     $(this).trigger('change');
                        //                     $(this)
                        //                         .focus()[0]
                        //                         .setSelectionRange(cursorPosition, cursorPosition);
                        //                 });
                        //         });
                        // },
                    });
                });

                function showDetail(course_id) {
                    console.log('showDetail clicked');
                    //console.log(course_id);
                    $("#dataTidakAdaDetailModal").hide();
                    $("#dataDetail").hide();
                    $("#loadingDetailModal").show();

                    $.ajax({
                        url: "{!! route('getDetailPelatihan') !!}",
                        data: {
                            course_id : course_id
                        },
                        dataType: 'json',
                        success: function(data) {
                            console.log(data);
                            let noTable = 1;
                            if (data) {
                                $("#course_id").val(data.course_id === null ? 'XXX' : data.course_id)
                                $("#course_title").val(data.course_title === null ? 'XXX' : data.course_title)
                                $("#jenis_pelatihan").val(data.jenis_pelatihan === null ? 'XXX' : data.jenis_pelatihan)
                                $("#train_location1").val(data.train_location1 === null ? 'XXX' : data.train_location1)
                                $("#train_location2").val(data.train_location2 === null ? 'XXX' : data.train_location2)
                                $("#loadingDetailModal").hide();
                                $("#dataDetail").show();
                            } else {
                                $("#loadingDetailModal").hide();
                                $("#dataTidakAdaDetailModal").show();
                            }
                        }
                    })
                }

                function showEdit(course_id) {
                    // console.log('showEdit clicked');
                    //console.log(id_instruktur);
                    $("#dataTidakAdaEditModal").hide();
                    $("#dataEdit").hide();
                    $("#loadingEditModal").show();

                    $.ajax({
                        url: "{!! route('getEditPelatihan') !!}",
                        data: {
                            course_id : course_id
                        },
                        dataType: 'json',
                        success: function(data) {
                            //console.log(data);
                            let noTable = 1;

                            if (data) {

                                $("#idKey").val(data.id);
                                //alert($("#idKey").val());
                                $("#course_id2").val(data.course_id === null ? 'XXX' : data.course_id)
                                $("#course_title2").val(data.course_title === null ? 'XXX' : data.course_title)
                                $("#jenis_pelatihan2").val(data.jenis_pelatihan === null ? 'XXX' : data.jenis_pelatihan)
                                $("#train_location12").val(data.train_location1 === null ? 'XXX' : data.train_location1)
                                $("#train_location22").val(data.train_location2 === null ? 'XXX' : data.train_location2)
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

                function SubmitEditPelatihan(course_id) {
                    console.log('showEdit clicked');
                    //console.log(course_id);
                    $("#dataTidakAdaEditModal").hide();
                    $("#dataEdit").hide();
                    $("#loadingEditModal").show();

                    $.ajax({
                        url: "{!! route('PostEditPelatihan') !!}",
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
                $('#deletePelatihanModal').on('show.bs.modal', function(e) {

                    //get data-id attribute of the clicked element
                    var course_id = $(e.relatedTarget).data('pelatihan-id');
                    //console.log(instruk);
                    //populate the textbox
                    //alert(id_skillcomp)
                    $(e.currentTarget).find('input[name="course_id"]').val(course_id);
                });
            </script>
        @endsection
