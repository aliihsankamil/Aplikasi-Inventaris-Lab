@extends('layoutDashboard')

@section('konten')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Kategori Management</h1>
</div>

<!-- Content Row -->
<div class="row">

    <!-- Content Column -->
    <div class="col-lg-12 mb-4">

        <!-- Project Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Kategori</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ url('dashboard/kategori/create') }}">
                    @csrf
                    {{-- @method('PUT') --}}
                    <div class="mb-3">
                        <label for="nama">Nama Kategori</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama">
                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="/dashboard/kategori" class="btn btn-danger">Kembali</a>
                </form>
            </div>
        </div>

    </div>

</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
@endsection