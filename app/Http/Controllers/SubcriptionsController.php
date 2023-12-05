<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\subscriptions;

class SubcriptionsController extends Controller
{
    public function index()
    {
        $subcriptions = subscriptions::all();
        if ($subcriptions->isEmpty()) {
            return response()->json(['error' => 'No subscriptions found'], 404);
        }
        return response()->json($subcriptions);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_user' => 'required',
            'tipe' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
        ]);
    
        $user = User::find($request->id_user);
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }
    
        $subcription = subscriptions::create($request->all());
        return response()->json($subcription, 201);
    }
    
    public function show($id)
    {
        $subcriptions = subscriptions::where('id_user', $id)->get();
        if ($subcriptions->isEmpty()) {
            return response()->json(['error' => 'No subscriptions found for this user'], 404);
        }
        return response()->json($subcriptions);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_user' => 'required',
            'tipe' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
        ]);
    
        $user = User::find($request->id_user);
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }
    
        $subcription = subscriptions::findOrFail($id);
        $subcription->update($request->all());
        return response()->json($subcription, 200);
    }    

    public function destroy($id)
    {
        subscriptions::destroy($id);
        return response()->json(null, 204);
    }
}
