<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Loan;
use Illuminate\Http\Request;

class DashboardLoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.loans.index', [ 
            'loans' => Loan::all(),
            // 'car' => Car::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.loans.create', [
            'cars' => Car::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'car_id' => 'required',
            'tgl_mulai' => 'date|required',
            'tgl_selesai' => 'date|required',
        ]);

        Loan::create($validatedData);

        return redirect('/dashboard/loans')->with('success', 'Pinjaman baru sudah ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Loan $loan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Loan $loan)
    {
        return view('dashboard.loans.edit', [
            'loan' => $loan,
            'cars' => Car::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Loan $loan)
    {
        $rules = [
            'car_id' => 'required',
            'tgl_mulai' => 'date|required',
            'tgl_selesai' => 'date|required'
        ];

        $validatedData = $request->validate($rules);

        Loan::where('id', $loan->id)
            ->update($validatedData);

        return redirect('/dashboard/loans')->with('success', 'Pinjaman berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Loan $loan)
    {
        Loan::destroy($loan->id);

        return redirect('/dashboard/loans')->with('success', 'Pinjaman sudah dihapus!');
    }
}
