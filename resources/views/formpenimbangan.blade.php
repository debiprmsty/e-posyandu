@extends('layouts.main')
@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Form Penimbangan</h4>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex ">
                            @if ($isAdd == true)
                                <h4 class="card-title">Masukkan Data Penimbangan</h4>
                            @elseif ($isAdd == false)
                                <h4 class="card-title">Update Data Penimbangan</h4>
                            @endif
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="col-md-10 col-lg-12">
                            @if ($isAdd == true)
                                <form action="{{ route('form.store') }}" id="form-balita" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <input type="hidden" name="id_dusun" class="form-control"
                                            placeholder="Masukkan tinggi badan..." value="{{ $idDusun }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Balita :</label>
                                        <div class="input-group mb-3">
                                            <select name="id_balita" id="id_balita" class="form-control"
                                                style="-webkit-appearance: none;
                                        -moz-appearance: none;
                                        appearance: none;">
                                            </select>
                                            <div class="input-group-append">
                                                <button type="button" class="input-group-text btn btn-primary text-white"
                                                    data-toggle="modal" data-target="#pilihBalita">Pilih Balita</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Penimbangan:</label>
                                        <input type="date" class="form-control" name="tgl_timbangan">
                                    </div>
                                    <div class="form-group">
                                        <label>Berat Badan</label>
                                        <input type="text" class="form-control" placeholder="Masukkan tinggi badan..."
                                            name="berat_badan" value="0">
                                    </div>
                                    <div class="form-group">
                                        <label>Tinggi Badan</label>
                                        <input type="text" class="form-control" placeholder="Masukkan berat badan..."
                                            name="tinggi_badan" value="0">
                                    </div>
                                    <button type="submit" class="btn btn-md m-2 btn-primary">Tambah</button>
                                </form>
                            @elseif ($isAdd == false)
                                <form action="{{ route('form.update') }}" id="form-balita" method="POST">
                                    @csrf
                                    <div class="form-group" style="display: none;">
                                        <input type="hidden" name="id_penimbangan" class="form-control"
                                            placeholder="Masukkan tinggi badan..." value="{{ $idPenimbangan }}">
                                    </div>
                                    <div class="form-group" style="display: none;">
                                        <input type="hidden" name="id_balita" class="form-control"
                                            placeholder="Masukkan tinggi badan..." value="{{ $dataBalita[0]['id'] }}">
                                    </div>
                                    <div class="form-group" style="display: none;">
                                        <input type="hidden" name="id_dusun" class="form-control"
                                            placeholder="Masukkan tinggi badan..." value="{{ $idDusun }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Balita :</label>
                                        <div class="input-group mb-3">
                                            <select name="id_balita" id="id_balita" class="form-control"
                                                style="-webkit-appearance: none;
                                        -moz-appearance: none;
                                        appearance: none;">
                                                <option value="{{ $dataBalita[0]['id'] }}">
                                                    {{ $dataBalita[0]['nama_balita'] }}</option>
                                            </select>
                                            {{-- <div class="input-group-append">
                                                <button type="button" class="input-group-text btn btn-primary text-white"
                                                    data-toggle="modal" data-target="#pilihBalita">Pilih Balita</button>
                                            </div> --}}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Penimbangan:</label>
                                        <input type="date" class="form-control" name="tgl_timbangan"
                                            value="{{ $dataBalita[0]['tgl_timbangan'] }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Berat Badan</label>
                                        <input type="text" class="form-control" placeholder="Masukkan tinggi badan..."
                                            name="berat_badan" value="{{ $dataBalita[0]['berat_badan'] }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Tinggi Badan</label>
                                        <input type="text" class="form-control" placeholder="Masukkan berat badan..."
                                            name="tinggi_badan" value="{{ $dataBalita[0]['tinggi_badan'] }}">
                                    </div>
                                    <button type="submit" class="btn btn-md m-2 btn-primary">Update</button>
                                </form>
                            @endif
                        </div>
                    </div>

                    {{-- Modal Tambah --}}
                    <div class="modal fade" id="pilihBalita" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header no-bd">
                                    <h3 class="modal-title">
                                        <span class="fw-bold">
                                            Data Balita</span>
                                    </h3>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="table-responsive">
                                        <table id="add-row" class="display table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Nomor</th>
                                                    <th class="text-center">Nama Balita</th>
                                                    <th style="width: 10%" class="text-center">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th class="text-center">Nomor</th>
                                                    <th class="text-center">Nama Dusun</th>
                                                    <th class="text-center">Aksi</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                @foreach ($dataBalita as $index => $db)
                                                    <tr>
                                                        <td class="text-center">{{ $loop->iteration }}</td>
                                                        <td class="text-center">{{ $db['nama_balita'] }}</td>
                                                        <td class="text-center">
                                                            <button type="button" data-dismiss="modal"
                                                                class="btn btn-info btn-sm pilih-balita"
                                                                data-id="{{ $db['id'] }}"
                                                                data-nama="{{ $db['nama_balita'] }}">Pilih</button>
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
            </div>
        </div>
    </div>

    <!-- Motif cantik1 -->
    <script src="{{ asset('assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>




    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.pilih-balita').click(function() {
                var namaBalita = $(this).data('nama');
                var idBalita = $(this).data('id');

                var inputBalita = $("#form-balita #id_balita");
                inputBalita.empty();
                inputBalita.append($('<option>').text(namaBalita).attr('value', idBalita));

            });

            //  swal({
            //          title: 'Hapus Data Dusun!',
            //          text: "Anda yakin ingin menghapus data ini ?",
            //          type: 'warning',
            //          buttons: {
            //              confirm: {
            //                  text : 'Iya, hapus!',
            //                  className : 'btn btn-success'
            //              },
            //              cancel: {
            //                  text : 'Batal',
            //                  visible: true,
            //                  className: 'btn btn-danger'
            //              }
            //          }
            //      }).then((Delete) => {
            //          if (Delete) {
            //              // Redirect ke URL penghapusan dengan parameter ID
            //              window.location.href = '/dusun/delete/' + dusunId;
            //          } else {
            //              swal.close();
            //          }
            //      });

        });

        // Notif cantik2
        //  @if (session('success'))
        //      swal({
        //              title: "Sukses",
        //              text: '{{ session('success') }}',
        //              icon: "success",
        //              buttons: {
        //                  confirm: {
        //                      text: "OKE",
        //                      value: true,
        //                      visible: true,
        //                      className: "btn btn-success",
        //                      closeModal: true
        //                  }
        //              }
        //          });
        //  @endif
    </script>
@endsection
