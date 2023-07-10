@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">My Loans</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-8" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive col-lg-8">
        <a href="/dashboard/loans/create" class="btn btn-primary mb-3">Create new Loan</a>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Merek</th>
                    <th scope="col">Model</th>
                    <th scope="col">Nomor Plat</th>
                    <th scope="col">Tarif /day</th>
                    <th scope="col">Tanggal Mulai</th>
                    <th scope="col">Tanggal Selesai</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($loans as $loan)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $loan->car->merek }}</td>
                        <td>{{ $loan->car->model }}</td>
                        <td>{{ $loan->car->noplat }}</td>
                        <td>Rp {{number_format($loan->car->tarif) }}</td>
                        <td>{{ $loan->tgl_mulai }}</td>
                        <td>{{ $loan->tgl_selesai }}</td>

                        <td>
                            {{-- <a href="/dashboard/books/{{ $book->id }}" class="badge bg-info"><span
                                    data-feather="eye"></span></a> --}}
                            {{-- <a href="/dashboard/loans/{{ $loan->id }}/edit" class="badge bg-warning"><span
                                    data-feather="edit"></span></a> --}}
                            <form action="/dashboard/loans/{{ $loan->id }}" method="post" class="d-inline">
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




