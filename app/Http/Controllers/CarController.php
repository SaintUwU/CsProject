<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;

class CarController extends Controller
{
   /**
     * Instantiate a new ProductController instance.
     */
    public function __construct()
    {
       $this->middleware('auth');
       $this->middleware('permission:create-car|edit-car|delete-car', ['only' => ['index','show']]);
       $this->middleware('permission:create-car', ['only' => ['create','store']]);
       $this->middleware('permission:edit-car', ['only' => ['edit','update']]);
       $this->middleware('permission:delete-car', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('car.index', [
            'car' => Product::latest()->paginate(3)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('car.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCarRequest $request): RedirectResponse
    {
        Car::create($request->all());
        return redirect()->route('car.index')
                ->withSuccess('New Car is added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car): View
    {
        return view('car.show', [
            'car' => $car
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car): View
    {
        return view('car.edit', [
            'car' => $car
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCarRequest $request, Car $car): RedirectResponse
    {
        $car->update($request->all());
        return redirect()->back()
                ->withSuccess('Car is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car): RedirectResponse
    {
        $car->delete();
        return redirect()->route('car.index')
                ->withSuccess('Car is deleted successfully.');
    }
}
