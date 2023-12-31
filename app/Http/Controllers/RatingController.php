<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;
use App\Models\Car;
use App\Models\User;

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
            'id_user' => 'required',
            'id_car' => 'required',
            'deskripsi' => 'required'
        ]);

        $car = Car::find($request->id_car);
        if (!$car) {
            return response()->json(['error' => 'Car not found'], 404);
        }

        $rating = Rating::create($request->all());
        return response()->json($rating, 201);
    }


    public function show($id_user, $id)
    {
        $user = User::find($id_user);

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'User not found',
                'data' => null
            ], 404);
        }

        $rating = Rating::find($id);

        if ($rating->isEmpty()) {
            return response()->json(['error' => 'Rating Not Found'], 404);
        }
        return response()->json([
                    'status'=> true,
                    'message'=> 'Berhasil ambil data',
                    'data'=> $rating
                ], 200);
    }

    public function update(Request $request, $id)
    {
        $rating = Rating::find($id);

        $request->validate([
            'id_user' => 'required',
            'id_car' => 'required',
            'deskripsi' => 'required'
        ]);

        $rating->update($request->all());
         return response()->json([
                'status' => true,
                'message' => 'Data berhasil diperbarui',
                'data' => $rating
            ], 200);
    }

    public function destroy($id)
    {
        try {
            $rating = Rating::find($id);
    
            if (!$rating) {
                return response()->json([
                    'status' => false,
                    'message' => 'Data not found',
                    'data' => null
                ], 404);
            }
    
            $rating->delete();
    
            return response()->json([
                'status' => true,
                'message' => 'Data berhasil dihapus',
                'data' => null
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
                'data' => []
            ], 400);
        }
    }
}