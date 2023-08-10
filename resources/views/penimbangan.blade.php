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
                                <h4 class="card-title">Tabel Penimbangan Balita</h4>
                            </div>
                            <div class="col-md-6 col-6 d-flex justify-content-center justify-content-md-end mt-2 mt-md-0">
                                <button class="btn btn-primary btn-round btn-sm d-block d-md-none ml-3" data-toggle="modal" data-target="#addRowModal">
                                    <i class="fa fa-plus mr-2"></i>
                                    Tambah
                                </button>
                                <button class="btn btn-primary btn-round btn-md d-none d-md-block ml-3" data-toggle="modal" data-target="#addRowModal">
                                    <i class="fa fa-plus mr-2"></i>
                                    Tambah
                                </button>
                                <button class="btn btn-default btn-round btn-sm d-block d-md-none ml-2" data-toggle="modal" data-target="#pilihDusunModal">
                                    <i class="fa fa-map-pin mr-2"></i>
                                    Pilih Dusun
                                </button>
                                <button class="btn btn-default btn-round btn-md d-none d-md-block ml-2" data-toggle="modal" data-target="#pilihDusunModal">
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
                                                        <input type="number" min="0" class="form-control" id="beratbadan" placeholder="Masukkan Berat Badan Balita">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tinggibadan">Tinggi Badan Balita</label>
                                                        <input type="number" min="0" class="form-control" id="tinggibadan" placeholder="Masukkan Tinggi Badan Balita">
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
                            <table id="add-row" class="display table table-striped table-hover" >
                                <thead>
                                    <tr>
                                        <th>Nomor</th>
                                        <th>Nama Dusun</th>
                                        <th>Nama Balita</th>
                                        <th>Bulan</th>
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
                                        <th>Bulan</th>
                                        <th>Berat Badan</th>
                                        <th>Tinggi Badan</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Dusun Galiran</td>
                                        <td>Putri Cantika Maharani</td>
                                        <td>Agustus</td>
                                        <td>13,5 kg</td>
                                        <td>120 cm</td>
                                        <td>Keterangan</td>
                                        <td>
                                            <div class="form-button-action">
                                                <button type="button" data-toggle="tooltip" class="btn btn-link btn-primary">
                                                    <span class="btn-label">
                                                        <i class="fa fa-edit"></i>
                                                    </span>
                                                    Edit
                                                </button>
                                                <button type="button" data-toggle="tooltip" class="btn btn-link btn-danger">
                                                    <span class="btn-label">
                                                        <i class="fa fa-trash"></i>
                                                    </span>
                                                    Hapus
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
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
                    <form>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Pilih Nama Dusun</label>
                                    <select class="form-control" name="id_dusun" id="namaDusun">
                                        <option value="">Pilih Dusun</option>
                                        @foreach ($dataDusun as $index => $dt)
                                        <option value="{{ $dt->id }}">{{ $dt->nama_dusun }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer no-bd">
                    <button type="submit" class="btn btn-primary">Pilih</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    @parent
    <script>
        $(document).ready(function() {
            $('#basic-datatables').DataTable();
        });
    </script>
@endsection
