@foreach ($data as $item)

<form action="{{ url('/mahasiswa/' . $item->nim) }}" method="POST">
    @csrf
    @method('DELETE')
    <div class="modal fade text-left" id="del{{$item->nim}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fa-solid fa-triangle-exclamation" style="color: #ff0000;"></i>   Menghapus data {{ $item->nim }}</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </button>
                </div>
                <div class="modal-body text-danger text-center">
                    <h1><i class="fa-solid fa-circle-exclamation" style="color: #ff0000;"></i></h1>
                    <h2>PERHATIAN</h2>
                    <h4>Data yang anda hapus</h4>
                    <div class="text-left text-black">
                        <table class="table">
                            <thead>
                                <tr class="text-primary">
                                    <th class="col-md-1">NIM</th>
                                    <th class="col-md-4">Nama</th>
                                    <th class="col-md-2">Jurusan</th>
                                </tr>
                            </thead>
                        <tr>
                    <td>{{ $item->nim }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->jurusan }}</td>
                        </tr>
                        </table>
                </div>
                    <h4>Data yang terhapus tak dapat di pulihkan kembali, anda setuju menghapus data ini ?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Urungkan</button>
                    <button type="submit" class="btn btn-danger" name="submit">Ya</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endforeach

