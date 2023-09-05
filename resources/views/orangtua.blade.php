@extends('layouts.main')
@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Data Orang Tua</h4>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Tabel Orang Tua</h4>
                            <button class="btn btn-primary btn-round ml-auto tambah-ortu" data-toggle="modal"
                                data-target="#addRowModal">
                                <i class="fa fa-plus"></i>
                                Tambah
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Modal Tambah -->
                        <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header no-bd">
                                        <h3 class="modal-title">
                                            <span class="fw-bold">
                                                Tambah Data Orang Tua</span>
                                        </h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="tambahData" action="{{ route('ortu.tambah') }}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="nikbapak">NIK Bapak</label>
                                                        <input type="number" min="0" class="form-control"
                                                            id="nikbapak" name="nik_bapak" placeholder="Masukkan NIK Bapak"
                                                            value="0">
                                                        <small class="text-danger font-italic" id="nikBapakError"></small>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="nikibu">NIK Ibu</label>
                                                        <input type="number" name="nik_ibu" min="0"
                                                            class="form-control" id="nikibu"
                                                            placeholder="Masukkan NIK Ibu" value="0">
                                                        <small class="text-danger font-italic" id="nikIbuError"></small>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="bapak">Nama Bapak</label>
                                                        <input type="text" name="nama_bapak" class="form-control"
                                                            id="namabapak" placeholder="Masukkan Nama Bapak" value="">
                                                        <small class="text-danger font-italic" id="namaBapakError"></small>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="ibu">Nama Ibu</label>
                                                        <input type="text" name="nama_ibu" class="form-control"
                                                            id="namaibu" placeholder="Masukkan Nama Ibu" value="">
                                                        <small class="text-danger font-italic" id="namaIbuError"></small>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect1">Pilih Nama Dusun</label>
                                                        <select class="form-control" name="id_dusun" id="namaDusun"
                                                            required>
                                                            <option value="">Pilih Dusun</option>
                                                            @foreach ($dataDusun as $index => $dt)
                                                                <option value="{{ $dt->id }}">{{ $dt->nama_dusun }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <small class="text-danger font-italic" id="namaDusunError"></small>
                                                    </div>
                                                </div>
                                            </div>

                                    </div>
                                    <div class="modal-footer no-bd">
                                        <button class="btn btn-primary tambah-data">Tambah</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Nomor</th>
                                        <th>NIK Bapak</th>
                                        <th>NIK Ibu</th>
                                        <th>Nama Bapak</th>
                                        <th>Nama Ibu</th>
                                        <th>Nama Dusun</th>
                                        <th style="width: 10%">Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Nomor</th>
                                        <th>NIK Bapak</th>
                                        <th>NIK Ibu</th>
                                        <th>Nama Bapak</th>
                                        <th>Nama Ibu</th>
                                        <th>Nama Dusun</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($data as $index => $dt)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $dt->nik_bapak }}</td>
                                            <td>{{ $dt->nik_ibu }}</td>
                                            <td>{{ $dt->nama_bapak }}</td>
                                            <td>{{ $dt->nama_ibu }}</td>
                                            <td>{{ $dt->dusun->nama_dusun }}</td>
                                            <td>
                                                <div class="form-button-action">
                                                    <button type="button" class="btn btn-link btn-primary edit-ortu"
                                                        data-toggle="modal" data-target="#editRowModal"
                                                        data-id="{{ $dt->id }}" data-nb="{{ $dt->nama_bapak }}"
                                                        data-ni="{{ $dt->nama_ibu }}" data-nkb="{{ $dt->nik_bapak }}"
                                                        data-nki="{{ $dt->nik_ibu }}" data-idds="{{ $dt->dusun->id }}">
                                                        <span class="btn-label">
                                                            <i class="fa fa-edit"></i>
                                                        </span>
                                                        Edit
                                                    </button>
                                                    <button type="button" data-id="{{ $dt->id }}"
                                                        class="btn btn-link btn-danger hapus-ortu">
                                                        <span class="btn-label">
                                                            <i class="fa fa-trash"></i>
                                                        </span>
                                                        Hapus
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Modal edit -->
                <div class="modal fade" id="editRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header no-bd">
                                <h3 class="modal-title">
                                    <span class="fw-bold">
                                        Edit Data Orang Tua</span>
                                </h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('ortu.edit') }}" method="POST">
                                    @csrf
                                    <div class="row" id="edit-form">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <input type="hidden" min="0" class="form-control" id="id-ortu"
                                                    name="id_ortu">
                                            </div>
                                            <div class="form-group">
                                                <label for="nikbapak">NIK Bapak</label>
                                                <input type="number" min="0" class="form-control" id="nikbapak"
                                                    name="nik_bapak" placeholder="Masukkan NIK Bapak">
                                            </div>
                                            <div class="form-group">
                                                <label for="nikibu">NIK Ibu</label>
                                                <input type="number" name="nik_ibu" min="0" class="form-control"
                                                    id="nikibu" placeholder="Masukkan NIK Ibu">
                                            </div>
                                            <div class="form-group">
                                                <label for="bapak">Nama Bapak</label>
                                                <input type="text" name="nama_bapak" class="form-control"
                                                    id="bapak" placeholder="Masukkan Nama Bapak">
                                            </div>
                                            <div class="form-group">
                                                <label for="ibu">Nama Ibu</label>
                                                <input type="text" name="nama_ibu" class="form-control"
                                                    id="ibu" placeholder="Masukkan Nama Ibu">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Pilih Nama Dusun</label>
                                                <select class="form-control" name="id_dusun" id="namaDusun">
                                                </select>

                                            </div>
                                        </div>
                                    </div>

                            </div>
                            <div class="modal-footer no-bd">
                                <button type="submit" class="btn btn-primary">Edit</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Motif cantik1 -->
    <script src="{{ asset('assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {

            var namaDusun = $("#tambahData #namaDusun");
            var namaDusunError = $("#tambahData #namaDusunError");

            $(namaDusun).on('input', function() {
                namaDusunError.text('');
            });

            $(".tambah-data").click(function(e) {
                e.preventDefault();

                if (!namaDusun.val()) {
                    namaDusunError.text('Nama Dusun wajib diiisi')
                } else {
                    namaDusunError.text('');
                    $("#tambahData").submit();
                }

            });



            $('.edit-ortu').click(function() {
                var dataId = $(this).data("id");
                var namaBapak = $(this).data("nb");
                var namaIbu = $(this).data("ni");
                var nikBapak = $(this).data("nkb");
                var nikIbu = $(this).data("nki");
                var idDusun = $(this).data("idds");

                $('#edit-form #id-ortu').val(dataId);
                $('#edit-form #nikbapak').val(nikBapak);
                $("#edit-form #nikibu").val(nikIbu);
                $("#edit-form #bapak").val(namaBapak);
                $("#edit-form #ibu").val(namaIbu);


                $.ajax({
                    url: '/orangtua/dusun/' + idDusun,
                    type: "GET",
                    dataType: 'json',
                    success: (res) => {
                        var dusun = $("#edit-form #namaDusun");
                        dusun.append($('<option>').text(res.data.nama_dusun).attr('value', res
                            .data.id));
                    },
                    error: (xhr, status, error) => {
                        console.log(error);
                    }
                })

            });

            $('.hapus-ortu').click(function() {
                var ortuId = $(this).data('id');

                swal({
                    title: 'Hapus Data Orang Tua!',
                    text: "Anda yakin ingin menghapus data ini ?",
                    type: 'warning',
                    buttons: {
                        confirm: {
                            text: 'Iya, hapus!',
                            className: 'btn btn-success'
                        },
                        cancel: {
                            text: 'Batal',
                            visible: true,
                            className: 'btn btn-danger'
                        }
                    }
                }).then((Delete) => {
                    if (Delete) {
                        // Redirect ke URL penghapusan dengan parameter ID
                        window.location.href = '/orangtua/delete/' + ortuId;
                    } else {
                        swal.close();
                    }
                });
            })
        });

        // Notif cantik2
        @if (session('success'))
            swal({
                title: "Sukses",
                text: '{{ session('success') }}',
                icon: "success",
                buttons: {
                    confirm: {
                        text: "OKE",
                        value: true,
                        visible: true,
                        className: "btn btn-success",
                        closeModal: true
                    }
                }
            });
        @endif
    </script>
@endsection
