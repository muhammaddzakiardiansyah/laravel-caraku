@extends('layouts.main')

@section('container')
    <div class="table-responsive">
        <div class="alert bg-primary mt-2"><h3>Aplikasi Pendataan Siswa</h3></div>
        <div class="row">
            <div class="col-lg-6">
              @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif
            </div>
        </div>
        <a href="{{ url('/student/create') }}" class="btn btn-primary mt-5">Tambah Data</a>
        <table class="table mt-5">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Foto</th>
                <th scope="col">Nama</th>
                <th scope="col">Kelas</th>
                <th scope="col">Jurusan</th>
                <th scope="col">Almat Rumah</th>
                <th scope="col">Email</th>
                <th scope="col">Tools</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td><img src="/image/{{ $student->image }}" alt="gambar" width="100"></td>
                        <td>{{ $student->nama }}</td>
                        <td>{{ $student->kelas }}</td>
                        <td>{{ $student->jurusan }}</td>
                        <td>{{ $student->alamat_rumah }}</td>
                        <td>{{ $student->email }}</td>
                        <td>
                            <a href="{{ url('/student/' . $student->id) }}" class="badge bg-info text-decoration-none">Show</a>
                            <a href="{{ url('/student/' . $student->id . '/edit') }}" class="badge bg-warning text-decoration-none">Edit</a>
                            <form action="{{ url('/student/' . $student->id) }}" method="post" class="d-inline">
                                @csrf
                                @method("delete")
                                <button type="submit" class="badge bg-danger border-0" onclick="return confirm('Yakin ingin dihapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
</div>
@endsection