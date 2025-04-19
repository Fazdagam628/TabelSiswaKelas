<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body style="background: lightgray;">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('students.update', $student->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <h3 class="text-center">EDIT DATA SISWA</h3>
                            <div class="form-group mb-3">
                                <label for="foto" class="font-weigth-bold">FOTO</label>
                                <input type="file" class="form-control @error('foto') is-invalid @enderror"
                                    name="foto">

                                {{-- error message untuk foto --}}
                                @error('foto')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="nama" class="font-weight-bold">NAMA</label>
                                        <input type="text" class="form-control  @error('nama') is-invalid @enderror"
                                            name="nama" value="{{ old('nama', $student->nama) }}"
                                            placeholder="Masukkan nama siswa">

                                        {{-- Error message untuk nama --}}
                                        @error('nama')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="jenis_kelamin" class="font-weight-bold">JENIS KELAMIN</label>
                                        <input type="text"
                                            class="form-control  @error('jenis_kelamin') is-invalid @enderror"
                                            name="jenis_kelamin"
                                            value="{{ old('jenis_kelamin', $student->jenis_kelamin) }}"
                                            placeholder="Format yang benar : L/P">

                                        {{-- Error message untuk nama --}}
                                        @error('nama')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <div class="form-group mb-3">
                                        <label for="tanggal_lahir" class="font-weight-bold">TANGGAL LAHIR</label>
                                        <input type="date"
                                            class="form-control  @error('tanggal_lahir') is-invalid @enderror"
                                            name="tanggal_lahir"
                                            value="{{ old('tanggal_lahir', $student->tanggal_lahir) }}"
                                            placeholder="Masukkan harga">

                                        {{-- Error message untuk title --}}
                                        @error('tanggal_lahir')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="tempat_lahir" class="font-weight-bold">TEMPAT LAHIR</label>
                                        <input type="text"
                                            class="form-control  @error('tempat_lahir') is-invalid @enderror"
                                            name="tempat_lahir"
                                            value="{{ old('tempat_lahir', $student->tempat_lahir) }}"
                                            placeholder="Masukkan tempat lahir">

                                        {{-- Error message untuk title --}}
                                        @error('tempat_lahir')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="nis" class="font-weight-bold">NIS</label>
                                        <input type="number" class="form-control  @error('nis') is-invalid @enderror"
                                            name="nis" value="{{ old('nis', $student->nis) }}"
                                            placeholder="Masukkan nis">

                                        {{-- Error message untuk title --}}
                                        @error('nis')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="alamat" class="font-weight-bold">ALAMAT</label>
                                        <input type="text"
                                            class="form-control  @error('alamat') is-invalid @enderror" name="alamat"
                                            value="{{ old('alamat', $student->alamat) }}"
                                            placeholder="Masukkan alamat">

                                        {{-- Error message untuk title --}}
                                        @error('alamat')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="angkatan" class="font-weight-bold">ANGKATAN</label>
                                        <input type="number"
                                            class="form-control  @error('angkatan') is-invalid @enderror"
                                            name="angkatan" value="{{ old('angkatan', $student->angkatan) }}"
                                            placeholder="Masukkan angkatan">

                                        {{-- Error message untuk title --}}
                                        @error('angkatan')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-md btn-primary me-3">UPDATE</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description');
    </script>

</body>

</html>
