@extends('layouts.main')
@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Data Timbangan Balita</h4>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6 col-12">
                                @if (isset($judulSiap) === true)
                                    <h4 class="card-title"> Tabel Penimbangan {{ $data[0]->dusun->nama_dusun }}</h4>
                                @else
                                    <h4 class="card-title">Tabel Penimbangan Balita</h4>
                                @endif
                            </div>
                            <div class="col-md-6 col-6 d-flex justify-content-center justify-content-md-end mt-2 mt-md-0">
                                @if (isset($tambahSiap) && isset($idDusun))
                                    <a href="{{ route('form.index', ['id' => $idDusun]) }}"
                                        class="btn btn-primary btn-round btn-sm d-block d-md-none ml-3">
                                        <i class="fa fa-plus mr-2"></i>
                                        Tambah
                                    </a>
                                    <a href="{{ route('form.index', ['id' => $idDusun]) }}"
                                        class="btn btn-primary btn-round btn-md d-none d-md-block ml-3">
                                        <i class="fa fa-plus mr-2"></i>
                                        Tambah
                                    </a>
                                @endif
                                <button class="btn btn-default btn-round btn-sm d-block d-md-none ml-2" data-toggle="modal"
                                    data-target="#pilihDusunModal">
                                    <i class="fa fa-map-pin mr-2"></i>
                                    Pilih Dusun
                                </button>
                                <button class="btn btn-default btn-round btn-md d-none d-md-block ml-2" data-toggle="modal"
                                    data-target="#pilihDusunModal">
                                    <i class="fa fa-map-pin mr-2"></i>
                                    Pilih Dusun
                                </button>
                            </div>
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
                                                Tambah Data Timbangan</span>
                                        </h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect1">Pilih Nama Balita</label>
                                                        <select class="form-control" id="exampleFormControlSelect1">
                                                            <option>Cantika Maharani</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect1">Pilih Nama Bulan</label>
                                                        <select class="form-control" id="exampleFormControlSelect1">
                                                            <option>Januari</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="beratbadan">Berat Badan Balita</label>
                                                        <input type="number" min="0" class="form-control"
                                                            id="beratbadan" placeholder="Masukkan Berat Badan Balita">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tinggibadan">Tinggi Badan Balita</label>
                                                        <input type="number" min="0" class="form-control"
                                                            id="tinggibadan" placeholder="Masukkan Tinggi Badan Balita">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect1">Keterangan</label>
                                                        <select class="form-control" id="exampleFormControlSelect1">
                                                            <option>T</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer no-bd">
                                        <button type="submit" class="btn btn-primary">Tambah</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Nomor</th>
                                        <th>Nama Dusun</th>
                                        <th>Nama Balita</th>
                                        <th>Tanggal</th>
                                        <th>Berat Badan</th>
                                        <th>Tinggi Badan</th>
                                        <th>Keterangan</th>
                                        <th style="width: 10%">Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Nomor</th>
                                        <th>Nama Dusun</th>
                                        <th>Nama Balita</th>
                                        <th>Tanggal</th>
                                        <th>Berat Badan</th>
                                        <th>Tinggi Badan</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($data as $index => $dt)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $dt->balita->dusun->nama_dusun }}</td>
                                            <td>{{ $dt->balita->nama_balita }}</td>
                                            <td>{{ $dt->tgl_timbangan }}</td>
                                            <td>{{ $dt->berat_badan }}</td>
                                            <td>{{ $dt->tinggi_badan }}</td>
                                            <td class="text-center">{{ $dt->keterangan->label_keterangan }}</td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="{{ route('form.show', ['id' => $dt->id_balita]) }}"
                                                        class="btn btn-link btn-primary">
                                                        <span class="btn-label">
                                                            <i class="fa fa-edit"></i>
                                                        </span>
                                                        Edit
                                                    </a>
                                                    <button type="button" data-id="{{ $dt->id }}"
                                                        class="btn btn-link btn-danger hapus-dusun">
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
            </div>
        </div>
    </div>
    <div class="modal fade" id="pilihDusunModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header no-bd">
                    <h3 class="modal-title">
                        <span class="fw-bold">
                            Data Dusun</span>
                    </h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('penimbangan.dusun') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Pilih Nama Dusun</label>
                                    <select class="form-control" name="id_dusun" id="namaDusun">
                                        <option value="" disabled>Pilih Dusun</option>
                                        <option value="0" class="fw-bold">Semua Dusun</option>
                                        @foreach ($dataDusun as $index => $dt)
                                            <option value="{{ $dt->id }}">{{ $dt->nama_dusun }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                </div>
                <div class="modal-footer no-bd">
                    <button type="submit" class="btn btn-primary">Pilih</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Motif cantik1 -->
    <script src="{{ asset('assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>




    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.edit-button').click(function() {
                var namaDusun = $(this).data('nama');
                var idPenimbangan = $(this).data('id');

                $('#id-dusun').val(idPenimbangan);
                $('#nama-dusun').val(namaDusun);

            });

            $('.hapus-dusun').click(function() {
                var idPenimbangan = $(this).data('id');

                swal({
                    title: 'Hapus Data Penimbangan!',
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
                        window.location.href = '/penimbangan/delete/' + idPenimbangan;
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
