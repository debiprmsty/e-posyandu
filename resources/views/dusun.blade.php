@extends('layouts.main')
@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Data Dusun</h4>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Tabel Dusun</h4>
                            <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
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
                                            Tambah Data Dusun</span> 
                                        </h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('dusun.tambah') }}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="dusun">Nama Dusun</label>
                                                        <input type="text" class="form-control" id="dusun" name="nama_dusun" placeholder="Masukkan Nama Dusun">
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
                            <table id="add-row" class="display table table-striped table-hover" >
                                <thead>
                                    <tr>
                                        <th>Nomor</th>
                                        <th>Nama Dusun</th>
                                        <th style="width: 10%">Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Nomor</th>
                                        <th>Nama Dusun</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($data as $index => $dusun)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $dusun->nama_dusun }}</td>
                                        <td>
                                            <div class="form-button-action">
                                                <button type="button" class="btn btn-link btn-primary edit-button" 
                                                data-toggle="modal" data-target="#editRowModal"
                                                data-nama="{{ $dusun->nama_dusun }}"
                                                data-id="{{ $dusun->id }}"
                                                data-dusun="{{ json_encode($dusun) }}"
                                                >
                                                    <span class="btn-label">
                                                        <i class="fa fa-edit"></i>
                                                    </span>
                                                    Edit
                                                </button>
                                                <button type="button" data-id="{{ $dusun->id }}" class="btn btn-link btn-danger hapus-dusun">
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

                     <!-- Modal Edit -->
                     <div class="modal fade" id="editRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header no-bd">
                                    <h3 class="modal-title">
                                        <span class="fw-bold">
                                        Edit Data Dusun</span> 
                                    </h3>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('dusun.edit') }}" method="POST">
                                        @csrf
                                        <div class="row" id="data-dusun">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <input type="hidden" class="form-control" id="id-dusun" name="id_dusun" placeholder="Masukkan Nama Dusun">
                                                    <label for="dusun">Nama Dusun</label>
                                                    <input type="text" class="form-control" id="nama-dusun" name="nama_dusun" placeholder="Masukkan Nama Dusun">
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
    </div>

    <!-- Motif cantik1 -->
    <script src="{{ asset('assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>




    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    
    $(document).ready(function() {
        $('.edit-button').click(function() {
            var namaDusun = $(this).data('nama');
            var idDusun = $(this).data('id');

            $('#id-dusun').val(idDusun);
            $('#nama-dusun').val(namaDusun);
            
        });

        $('.hapus-dusun').click(function() {
            var dusunId = $(this).data('id');

            swal({
                title: 'Hapus Data Dusun!',
                text: "Anda yakin ingin menghapus data ini ?",
                type: 'warning',
                buttons: {
                    confirm: {
                        text : 'Iya, hapus!',
                        className : 'btn btn-success'
                    },
                    cancel: {
                        text : 'Batal',
                        visible: true,
                        className: 'btn btn-danger'
                    }
                }
            }).then((Delete) => {
                if (Delete) {
                    // Redirect ke URL penghapusan dengan parameter ID
                    window.location.href = '/dusun/delete/' + dusunId;
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
