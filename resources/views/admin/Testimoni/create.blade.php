@extends('layouts.admin')
@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">ADD USERS</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Admin</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ Route('testimoni.index') }}" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    </div>

    <h6 class="mb-0 text-uppercase"> ADD USERS </h6>
    <hr>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('testimoni.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="id_pengguna">pengguna</label>
                    <select name="id_pengguna" id="id_pengguna" class="form-control">
                        @foreach ($pengguna as $item)
                            <option value="{{$item->id}}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="email">Email</label>
                    <select name="email" id="email" class="form-control">
                        @foreach ($pengguna as $item)
                            <option value="{{$item->id}}">{{ $item->email }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="tanggapan" class="form-label"> Tangapan </label>
                    <input class="form-control @error('tanggapan') is-invalid @enderror" type="text" name="tanggapan"
                        id="tanggapan">
                    @error('tanggapan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="float-end">
                    <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                    <button type="reset" class="btn btn-sm btn-warning">Reset</button>
                </div>
            </form>
        </div>
    </div>
@endsection
