<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Siswa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background: lightgray;">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Tabel Siswa</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('students.create') }}" class="btn btn-md btn-success mb-3">TAMBAH SISWA</a>
                        <table class="table table-bordered">

                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">FOTO</th>
                                    <th scope="col" class="text-center">NAMA</th>
                                    <th scope="col" class="text-center">JENIS KELAMIN</th>
                                    <th scope="col" class="text-center">ANGKATAN</th>
                                    <th scope="col" class="text-center">TEMPAT LAHIR</th>
                                    <th scope="col" style="width: 20%" class="text-center">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($students as $student)
                                    <tr>
                                        <td class="text-center"><img
                                                src="{{ asset('/storage/foto/' . $student->foto) }}"
                                                alt=""class="rounded" style="width: 150px">
                                        </td>
                                        <td>{{ $student->nama }}</td>
                                        <td>
                                            @if ($student->jenis_kelamin == 'L' || $student->jenis_kelamin == 'l')
                                                Laki-laki
                                            @else
                                                Perempuan
                                            @endif
                                        </td>
                                        <td>{{ $student->angkatan }}</td>
                                        <td>{{ $student->tempat_lahir }}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah anda yakin!');"
                                                action="{{ route('students.destroy', $student->id) }}" method="POST">
                                                <a href="{{ route('students.show', $student->id) }}"
                                                    class="btn btn-sm btn-dark">SHOW</a>
                                                <a href="{{ route('students.edit', $student->id) }}"
                                                    class="btn btn-sm btn-primary">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>

                                            </form>
                                        </td>
                                    </tr>

                                @empty
                                    <div class="alert alert-danger">
                                        Data siswa belum ada.
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $students->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Message with sweetalert2
        @if (session('success'))
            Swal.fire({
                icon: "success",
                title: "BERHASIL!",
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @elseif (session('error'))
            Swal.fire({
                icon: "error",
                title: "GAGAL!",
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @endif
    </script>
</body>

</html>
