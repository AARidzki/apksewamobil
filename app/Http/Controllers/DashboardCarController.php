<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class DashboardCarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        return view('dashboard.cars.index', [
            'cars' => Car::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.cars.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'merek' => 'required',
            'model' => 'required',
            'noplat' => 'required',
            'tarif' => 'required',
            'stok' => 'required',

        ]);

        Car::create($validatedData);

        return redirect('/dashboard/cars')->with('success', 'Mobil baru sudah ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        return view('dashboard.cars.edit', [
            'car' => $car
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        $rules = [
            'merek' => 'required',
            'model' => 'required',
            'noplat' => 'required',
            'tarif' => 'required',
            'stok' => 'required',
        ];

        $validatedData = $request->validate($rules);

        Car::where('id', $car->id)
            ->update($validatedData);

        return redirect('/dashboard/cars')->with('success', 'Mobil berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        Car::destroy($car->id);

        return redirect('/dashboard/cars')->with('success', 'Mobil sudah dihapus!');
    }
}
