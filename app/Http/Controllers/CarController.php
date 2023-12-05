<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::all();
        if($cars->isEmpty()){
            return response()->json(['message' => 'No cars found'], 404);
        }
        return response()->json($cars);
    }

    public function store(Request $request)
    {
        $car = Car::create($request->all());
        return response()->json($car, 201);
    }

    public function show($id)
    {
        $car = Car::find($id);
        if(!$car){
            return response()->json(['message' => 'Car not found'], 404);
        }
        return response()->json($car);
    }

    public function update(Request $request, $id)
    {
        $car = Car::find($id);
        if(!$car){
            return response()->json(['message' => 'Car not found'], 404);
        }
        $car->update($request->all());
        return response()->json($car, 200);
    }

    public function destroy($id)
    {
        $car = Car::find($id);
        if(!$car){
            return response()->json(['message' => 'Car not found'], 404);
        }
        $car->delete();
        return response()->json(null, 204);
    }
}
