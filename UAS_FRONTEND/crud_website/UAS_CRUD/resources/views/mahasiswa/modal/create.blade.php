<form action='{{ url('/mahasiswa') }}' method='post'>
    @csrf
    <div class="modal fade text-left" id="ModalCreate" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </button>
                </div>
                <div class="modal-body">
                        <div class="mb-3 row">
                            <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name='nim' value="{{ Session::get('nim') }}" id="nim">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name='nama' value="{{ Session::get('nama') }}"
                                    id="nama">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name='jurusan' value="{{ Session::get('jurusan') }}"
                                    id="jurusan">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <a href='{{url('/mahasiswa')}}' class="btn btn-danger">Reset dan kembali</a>
                    <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Urungkan</button>
                    <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>

