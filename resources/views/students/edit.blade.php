@extends('layouts.main')

@section('container')
<div class="row">
    <div class="col-lg-8 mt-5">
        <div class="alert bg-warning">Edit Data Siswa</div>
        <form action="{{ url('/student/' . $student->id) }}" method="post">
            @csrf
            @method("patch")
            <input type="hidden" name="id" id="id" value="{{ $student->id }}" id="id" />
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" value="{{ $student->nama }}">
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="kelas" class="form-label">Kelas</label>
                <input type="text" class="form-control @error('kelas') is-invalid @enderror" name="kelas" id="kelas" value="{{ $student->kelas }}">
                @error('kelas')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="jurusan">Jurusan</label>
                <input type="text" class="form-control @error('jurusan') is-invalid @enderror" name="jurusan" id="jurusan" value="{{ $student->jurusan }}">
                @error('jurusan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="alamat_rumah">Alamat Rumah</label>
                <input type="text" class="form-control @error('alamat_rumah') is-invalid @enderror" name="alamat_rumah" id="alamat_rumah" value="{{ $student->alamat_rumah }}">
                @error('alamat_rumah')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="email">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ $student->email }}">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
</div>
@endsection