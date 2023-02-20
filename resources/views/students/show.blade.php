@extends('layouts.main')

@section('container')
    <div class="row mt-5">
        <div class="col-lg-8">
            <div class="card" style="width: 18rem;">
                <img src="/image/{{ $student->image }}" class="card-img-top" alt="gambar">
                <div class="card-body">
                    <h5 class="card-title"><strong>Nama :</strong> {{ $student->nama }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted"><strong>Kelas :</strong> {{ $student->kelas }}</h6>
                    <p class="card-text"><strong>Jurusan :</strong> {{ $student->jurusan }}</p>
                    <p class="card-text"><strong>Alamat Rumah :</strong> {{ $student->alamat_rumah }}</p>
                    <p class="card-text"><strong>Email :</strong> {{ $student->email }}</p>
                    <a href="/student" class="badge bg-success text-decoration-none">Back</a>
                </div>
              </div>
        </div>
    </div>
@endsection