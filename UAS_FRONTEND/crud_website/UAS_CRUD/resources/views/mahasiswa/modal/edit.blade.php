@foreach ($data as $item)
    <form action='{{ route('mahasiswa.update', [$item->nim]) }}' method='post'>
        @csrf
        @method('PUT')
        <div class="modal fade text-left" id="edit{{ $item->nim }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Data</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="mb-3 row">
                            <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                            <div class="col-sm-10">
                                {{ $item->nim }}
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name='nama' value="{{ $item->nama }}"
                                    id="nama">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name='jurusan' value="{{ $item->jurusan }}"
                                    id="jurusan">
                            </div>
                        </div>
                        <div class="text-center">
                            <i class="fa-solid fa-triangle-exclamation text-warning d-inline"></i>
                            <p class="text-danger m-0 d-inline"> <b>Data yang diperbarui tak dapat dikembalikan!</b> </p>
                            <i class="fa-solid fa-triangle-exclamation text-warning d-inline"></i>
                        </div>

                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Urungkan</button>
                        <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
                    </div>

                </div>
            </div>
        </div>
    </form>
@endforeach
