@extends('layout.template')

@section('konten')

    <!-- START DATA -->
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <!-- FORM PENCARIAN -->
        <div class="pb-3">
            <form class="d-flex" action="{{ url('/mahasiswa') }}" method="get">
                <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}"
                    placeholder="Masukkan kata kunci" aria-label="Search">
                <button class="btn btn-secondary" type="submit"><i class="fa-solid fa-magnifying-glass" style="color: #ffffff;"></i></button>
            </form>
        </div>

        <!-- TOMBOL TAMBAH DATA -->
        <div class="pb-3">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ModalCreate"><i class="fa-regular fa-square-plus"></i> Tambah
                Data</button>
        </div>

        <table class="table table-striped">
            <thead>
                <tr class="text-primary">
                    <th class="col-md-1">No</th>
                    <th class="col-md-3 text-decoration-none">@sortablelink('nim')</th>
                    <th class="col-md-4 text-decoration-none">@sortablelink('nama')</th>
                    <th class="col-md-2 text-decoration-none">@sortablelink('jurusan')</th>
                    <th class="col-md-2 ">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = $data->firstItem(); ?>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $item->nim }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->jurusan }}</td>
                        <td>
                            <button data-bs-target="#edit{{$item->nim}}" data-bs-toggle="modal" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></button>
                            <button data-bs-target="#del{{$item->nim}}" data-bs-toggle="modal" class="btn btn-danger btn-sm"><i class="fa-solid fa-square-xmark"></i></button>
                            {{-- <form onsubmit="return confirm('Anda yakin akan mengdelete data?')" class="d-inline"
                                action="{{ url('/mahasiswa/' . $item->nim) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                            </form> --}}
                        </td>
                    </tr>
                    <?php $i++; ?>
                @endforeach
            </tbody>
        </table>
        <div>
            Halaman: {{ $data->currentPage() }} <br>
            Jumlah Data: {{ $data->total() }} <br>
            Data per Halaman: {{ $data->perPage() }}
        </div>
        {{ $data->withQueryString()->links() }}
    </div>
    <!-- AKHIR DATA -->
    {{-- END --}}
    @include('mahasiswa.modal.create')
    @include('mahasiswa.modal.edit')
    @include('mahasiswa.modal.delete')
@endsection
