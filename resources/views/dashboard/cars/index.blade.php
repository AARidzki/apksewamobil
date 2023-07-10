@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">My Cars</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-8" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive col-lg-8">
        <a href="/dashboard/cars/create" class="btn btn-primary mb-3">Create new Car</a>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Merek</th>
                    <th scope="col">Model</th>
                    <th scope="col">Nomor Plat</th>
                    <th scope="col">Tarif /day</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($cars as $car)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $car->merek }}</td>
                        <td>{{ $car->model }}</td>
                        <td>{{ $car->noplat }}</td>
                        <td>Rp {{number_format($car->tarif) }}</td>
                        <td>{{ $car->stok }}</td>
                        <td>
                            {{-- @if ($car->stok > 0)
                                <a href="/dashboard/loans/{{ $car->id }}/create" class="btn btn-primary">Sewa</a>
                            @else
                                <a href="/dashboard/loans/{{ $car->id }}/create" class="btn btn-primary disabled">Sewa</a>
                            @endif --}}
                            {{-- <a href="/dashboard/books/{{ $car->id }}" class="badge bg-info"><span
                                    data-feather="eye"></span></a> --}}
                            <a href="/dashboard/cars/{{ $car->id }}/edit" class="badge bg-warning"><span
                                    data-feather="edit"></span></a>
                            <form action="/dashboard/cars/{{ $car->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0" onclick="return confirm('are you sure?')"><span
                                        data-feather="x-circle"></span></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection




