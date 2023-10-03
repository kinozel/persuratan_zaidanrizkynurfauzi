@extends('layout.layout')
@section('title', 'Daftar Surat')
@section('content')
    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <span class="h2">Daftar Surat</span>
                </div>
                <div class="card-body">
                    <table class="table table-hovered table-bordered DataTable">
                        <thead>
                            <tr>
                                <th>
                                    NO
                                </th>
                                <th>
                                    Jenis Surat
                                </th>
                                <th>
                                    User
                                </th>
                                <th>
                                    Tanggal Surat
                                </th>
                                <th>
                                    Ringkasan
                                </th>
                                <th>
                                    File
                                </th>
                                <th>
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            ?>
                            @foreach ($surat as $srt)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $srt->tanggal_surat }}</td>
                                    {{-- <td>{{ $brg->id_barang }}</td> --}}
                                    <td>
                                        <a href="{{ url('/dashboard') }}/surat/edit/{{ $srt->id_surat }}">
                                            <btn class="btn btn-primary">Edit</btn>
                                        </a>
                                        <btn class="hapusBtn btn btn-danger" idSurat="{{ $srt->id_surat }}">Hapus</btn>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <a href="{{ url('/dashboard') }}/surat/tambah" data-bs-toggle="modal" data-bs-target="#modalTambah">
                        <btn class="btn btn-success">Tambah </btn>
                    </a>
                </div>
            </div>
        </div>


        <!-- Button trigger modal -->

        <!-- Modal -->
        <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTambahLabel">Tambah</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="tambah-surat-form" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Tanggal Surat</label>
                                <input type="datetime-local" name="tanggal_surat" id="tanggalSurat"
                                    class="form-control mb-3">
                                <label>Ringkasan</label>
                                <textarea name="ringkasan" class="form-control mb-3" rows="7" placeholder="Tulis ringkasan surat disini..."
                                    style="resize: none"></textarea>
                                <label class="d-block">File : </label>
                                <div class="row d-flex align-items-center">
                                    <div class="col-3">
                                        <label for="fileUpload"
                                            class="btn p-1 w-100 btn-outline-success form-control">Upload
                                            File</label>
                                        <input type="file" accept=".pdf" name="file" id="fileUpload" class="d-none">
                                    </div>
                                    <div class="col p-0">
                                        <p class="fileName m-0 d-inline-block"></p>
                                    </div>
                                </div>
                                @csrf
                            </div>
                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>



    </div>







    <script type="module">
        $('.DataTable tbody').on('click', '.hapusBtn', function(a) {
            a.preventDefault();
            let idBarang = $(this).closest('.hapusBtn').attr('idBarang');
            swal.fire({
                title: "Apakah anda ingin menghapus data ini?",
                showCancelButton: true,
                confirmButtonText: 'Setuju',
                cancelButtonText: `Batal`,
                confirmButtonColor: 'red'
            }).then((result) => {
                if (result.isConfirmed) {
                    //dilakukan proses hapus
                    axios.delete('barang/hapus/' + idBarang).then(function(response) {
                        console.log(response);
                        if (response.data.success) {
                            swal.fire('Berhasil di hapus!', '', 'success').then(function() {
                                //Refresh Halaman
                                location.reload();
                            });
                        } else {
                            swal.fire('Gagal di hapus!', '', 'warning').then(function() {
                                //Refresh Halaman
                                location.reload();
                            });
                        }
                    }).catch(function(error) {
                        swal.fire('Data gagal di hapus!', '', 'error').then(function() {
                            //Refresh Halaman

                        });
                    });
                }
            });
        });
        $('.DataTable').DataTable();
    </script>

@endsection
