@extends('layoutDashboard')

@section('konten')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Kategori Management</h1>
    <a href="/dashboard/kategori/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-plus fa-sm text-white-50"></i> Tambah Kategori</a>
</div>

<!-- Content Row -->
<div class="row">

    <!-- Content Column -->
    <div class="col-lg-12 mb-4">

        <!-- Project Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Kategori</h6>
            </div>
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($kategories as $dkategori)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $dkategori->nama }}</td>
                                <td style="text-align: center">
                                    {{-- tmbl edit --}}
                                    <a href="/dashboard/kategori/{{ $dkategori->id }}/edit" class="btn btn-success btn-circle editbtn"><i class="fas fa-edit"></i></a>
                                    {{-- tmbl hapus --}}
                                    <form action="/dashboard/kategori/{{ $dkategori->id }}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger btn-circle deletebtn" onclick="return confirm('Apakah kamu yakin ingin menghapus data?')"><i class="fas fa-trash"></i></button>
                                    </form>
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
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
@endsection