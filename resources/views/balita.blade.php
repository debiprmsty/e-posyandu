@extends('layouts.main')
@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Data Balita</h4>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Tabel Balita</h4>
                            <button class="btn btn-primary btn-round ml-auto tambah-balita" data-toggle="modal"
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
                                                Tambah Data Balita</span>
                                        </h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('balita.tambah') }}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="nikbalita">NIK Balita</label>
                                                        <input type="number" min="0" class="form-control"
                                                            id="nikbalita" name="nik_balita"
                                                            placeholder="Masukkan NIK Balita" value="0">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="balita">Nama Balita</label>
                                                        <input type="text" class="form-control" id="balita"
                                                            name="nama_balita" placeholder="Masukkan Nama Balita">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tgllahir">Tanggal Lahir</label>
                                                        <input type="date" name="tanggal_lahir" class="form-control"
                                                            id="tgllahir" placeholder="Masukkan Tangga Lahir Balita">
                                                    </div>
                                                    <div class="form-check">
                                                        <label>Jenis Kelamin</label><br />
                                                        <label class="form-radio-label">
                                                            <input class="form-radio-input" type="radio"
                                                                name="jenis_kelamin" value="Laki-Laki">
                                                            <span class="form-radio-sign">Laki-Laki</span>
                                                        </label>
                                                        <label class="form-radio-label ml-3">
                                                            <input class="form-radio-input" type="radio"
                                                                name="jenis_kelamin" value="Perempuan">
                                                            <span class="form-radio-sign">Perempuan</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect1">Pilih Nama Orang Tua</label>
                                                        <select class="form-control" name="id_orangtua" id="pilihOrtu">
                                                            <option value="">Pilih Data Orang Tua</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group", style="margin-top: -20px;">
                                                        <input type="hidden" name="id_dusun" class="form-control"
                                                            id="idDusunOrtu">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="dusun">Nama Dusun</label>
                                                        <input type="text" class="form-control" id="namaDusunOrtu"
                                                            placeholder="Nama Dusun" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="modal-footer no-bd">
                                        <button type="submit" class="btn btn-primary">Tambah</button>
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
                                        <th>NIK Balita</th>
                                        <th>Nama Balita</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Nama Bapak</th>
                                        <th>Nama Ibu</th>
                                        <th>Nama Dusun</th>
                                        <th style="width: 10%">Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Nomor</th>
                                        <th>NIK Balita</th>
                                        <th>Nama Balita</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Jenis Kelamin</th>
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
                                            <td>{{ $dt->nik_balita }}</td>
                                            <td>{{ $dt->nama_balita }}</td>
                                            <td>{{ $dt->tanggal_lahir }}</td>
                                            <td>{{ $dt->jenis_kelamin }}</td>
                                            <td>{{ $dt->ortu->nama_bapak }}</td>
                                            <td>{{ $dt->ortu->nama_ibu }}</td>
                                            <td>{{ $dt->dusun->nama_dusun }}</td>
                                            <td>
                                                <div class="form-button-action">
                                                    <button type="button" class="btn btn-link btn-primary edit-balita"
                                                        data-toggle="modal" data-target="#updateRowModal"
                                                        data-id="{{ $dt->id }}" data-nkb="{{ $dt->nik_balita }}"
                                                        data-nbl="{{ $dt->nama_balita }}"
                                                        data-tgl="{{ $dt->tanggal_lahir }}"
                                                        data-jk="{{ $dt->jenis_kelamin }}"
                                                        data-ortu="{{ $dt->ortu }}"
                                                        data-dusun="{{ $dt->dusun }}">
                                                        <span class="btn-label">
                                                            <i class="fa fa-edit"></i>
                                                        </span>
                                                        Edit
                                                    </button>
                                                    <button type="button" data-id="{{ $dt->id }}"
                                                        class="btn btn-link btn-danger hapus-balita">
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

                <!-- Modal Update -->
                <div class="modal fade" id="updateRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header no-bd">
                                <h3 class="modal-title">
                                    <span class="fw-bold">
                                        Update Data Balita</span>
                                </h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('balita.edit') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group" style="margin-top: -20px;">
                                                <input type="hidden" min="0" class="form-control" id="id_balita"
                                                    name="id_balita" placeholder="Masukkan NIK Balita">
                                            </div>
                                            <div class="form-group">
                                                <label for="nikbalita">NIK Balita</label>
                                                <input type="number" min="0" class="form-control"
                                                    id="nik_balita" name="nik_balita" placeholder="Masukkan NIK Balita">
                                            </div>
                                            <div class="form-group">
                                                <label for="balita">Nama Balita</label>
                                                <input type="text" class="form-control" name="nama_balita"
                                                    id="nama_balita" placeholder="Masukkan Nama Balita">
                                            </div>
                                            <div class="form-group">
                                                <label for="tgllahir">Tanggal Lahir</label>
                                                <input type="date" name="tanggal_lahir" class="form-control"
                                                    id="tanggal_lahir" placeholder="Masukkan Tangga Lahir Balita">
                                            </div>
                                            <div class="form-check">
                                                <label>Jenis Kelamin</label><br />
                                                <label class="form-radio-label">
                                                    <input class="form-radio-input" type="radio" name="jenis_kelamin"
                                                        id="jenis_kelamin" value="Laki-Laki">
                                                    <span class="form-radio-sign">Laki-Laki</span>
                                                </label>
                                                <label class="form-radio-label ml-3">
                                                    <input class="form-radio-input" type="radio" name="jenis_kelamin"
                                                        id="jenis_kelamin" value="Perempuan">
                                                    <span class="form-radio-sign">Perempuan</span>
                                                </label>
                                            </div>
                                            <div class="form-group" style="margin-top: -20px;">
                                                <input type="hidden" class="form-control" name="id_orangtua"
                                                    id="id_orangtua">
                                            </div>
                                            <div class="form-group">
                                                <label for="orangtua">Nama Orang Tua</label>
                                                <input type="text" class="form-control" name="nama_orangtua"
                                                    id="nama_orangtua" disabled>
                                            </div>
                                            <div class="form-group", style="margin-top: -20px;">
                                                <input type="hidden" name="id_dusun" class="form-control"
                                                    id="idDusunOrtu">
                                            </div>
                                            <div class="form-group">
                                                <label for="dusun">Nama Dusun</label>
                                                <input type="text" class="form-control" id="namaDusunOrtu"
                                                    placeholder="Nama Dusun" disabled>
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

            $('.tambah-balita').click(function() {
                $.ajax({
                    url: "/balita/ortu",
                    type: "GET",
                    dataType: "json",
                    success: (response) => {
                        var selectOrtu = $("#addRowModal #pilihOrtu");

                        $.each(response.data, (index, ortu) => {
                            if (ortu.nama_bapak == null) {
                                selectOrtu.append($('<option>').text(index + 1 + '.' +
                                    ' ' +
                                    ortu.nama_ibu).attr(
                                    'value', ortu.id));
                            } else if (ortu.nama_ibu == null) {
                                selectOrtu.append($('<option>').text(index + 1 + '.' +
                                    ' ' +
                                    ortu.nama_bapak).attr(
                                    'value', ortu.id));
                            } else {
                                selectOrtu.append($('<option>').text(index + 1 + '.' +
                                    ' ' +
                                    ortu.nama_bapak + '/' + ortu.nama_ibu).attr(
                                    'value', ortu.id));
                            }
                        })
                    },
                    error: (xhr, status, error) => {
                        console.log(error)
                    }
                })
            });

            $('.edit-balita').click(function() {
                var idBalita = $(this).data("id");
                var nikBalita = $(this).data("nkb");
                var namaBalita = $(this).data("nbl");
                var tanggalLahir = $(this).data("tgl");
                var jenisKelamin = $(this).data("jk");
                var ortu = $(this).data("ortu");
                var dusun = $(this).data("dusun");

                $("#updateRowModal #id_balita").val(idBalita);
                $("#updateRowModal #nik_balita").val(nikBalita);
                $("#updateRowModal #nama_balita").val(namaBalita);
                $("#updateRowModal #tanggal_lahir").val(tanggalLahir);
                $("#updateRowModal #jenis_kelamin").filter('[value="' + jenisKelamin + '"]').prop('checked',
                    true);
                $("#updateRowModal #id_orangtua").val(ortu.id);
                if (ortu.nama_bapak == null) {
                    $("#updateRowModal #nama_orangtua").val(ortu.nama_ibu);
                } else if (ortu.nama_ibu == null) {
                    $("#updateRowModal #nama_orangtua").val(ortu.nama_bapak);
                } else {
                    $("#updateRowModal #nama_orangtua").val(ortu.nama_bapak + '/' + ortu.nama_ibu);
                }
                $("#updateRowModal #idDusunOrtu").val(dusun.id);
                $("#updateRowModal #namaDusunOrtu").val(dusun.nama_dusun);


            })

            $("#pilihOrtu").change(function() {
                var selectedId = $(this).val();
                if (selectedId !== '') {
                    $.ajax({
                        url: "/balita/dusun-ortu/" + selectedId,
                        type: "GET",
                        dataType: 'json',
                        success: (res) => {
                            console.log(res);
                            $("#addRowModal #idDusunOrtu").val(res.data.id);
                            $("#addRowModal #namaDusunOrtu").val(res.data.nama_dusun);
                        },
                        error: (xhr, status, error) => {
                            console.log(error);
                        }
                    })
                }
            })

            $('.hapus-balita').click(function() {
                var balitaId = $(this).data('id');

                swal({
                    title: 'Hapus Data Balita!',
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
                        window.location.href = '/balita/delete/' + balitaId;
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
