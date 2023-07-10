@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New Loan</h1>
</div>

<div class="col-lg-8">
    <form method="POST" action="/dashboard/loans" class="mb-5" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="car" class="form-label">Mobil</label>
            <select class="form-select" name="car_id">
                @foreach ($cars as $car)
                    @if (old('car_id') == $car->id)
                        <option value="{{ $car->id }}" selected>{{ $car->merek }} {{ $car->model }}</option>
                    @else
                        <option value="{{ $car->id }}">{{ $car->merek }} {{ $car->model }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="tgl_mulai" class="form-label">Tanggal Mulai</label>
            <input type="date" class="form-control @error('tgl_mulai') is-invalid @enderror" id="tgl_mulai" name="tgl_mulai"
                required autofocus value="{{ old('tgl_mulai') }}">
            @error('tgl_mulai')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="tgl_selesai" class="form-label">Tanggal Selesai</label>
            <input type="date" class="form-control @error('tgl_selesai') is-invalid @enderror" id="tgl_selesai" name="tgl_selesai"
                required autofocus value="{{ old('tgl_selesai') }}">
            @error('tgl_selesai')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Sewa Mobil</button>
    </form>
</div>

@endsection