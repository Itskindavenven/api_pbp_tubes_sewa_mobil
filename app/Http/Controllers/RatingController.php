<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;
use App\Models\Car;

class RatingController extends Controller
{
    public function index()
    {
        $ratings = Rating::all();
        if ($ratings->isEmpty()) {
            return response()->json(['error' => 'No ratings found'], 404);
        }
        return response()->json($ratings);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_car' => 'required',
            'deskripsi' => 'required',
            'bintang' => 'required'
        ]);

        $car = Car::find($request->id_car);
        if (!$car) {
            return response()->json(['error' => 'Car not found'], 404);
        }

        $rating = Rating::create($request->all());
        return response()->json($rating, 201);
    }


    public function show($id)
    {
        $ratings = Rating::where('id_car', $id)->get();
        if ($ratings->isEmpty()) {
            return response()->json(['error' => 'No ratings found for this car ID'], 404);
        }
        return response()->json($ratings);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_car' => 'required',
            'deskripsi' => 'required',
            'bintang' => 'required'
        ]);

        $rating = Rating::findOrFail($id);
        $rating->update($request->all());
        return response()->json($rating, 200);
    }

    public function destroy($id)
    {
        Rating::destroy($id);
        return response()->json(null, 204);
    }
}
