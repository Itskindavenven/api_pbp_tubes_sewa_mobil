<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        try{
            $user = User::all();
            return response()->json([
                "status"=> true,
                "message"=> 'Berhasil ambil data',
                'data'=> $user
            ], 200);
        }catch(\Exception $e){
            return response()->json([
                'status'=> false,
                'message'=> $e->getMessage(),
                'data'=> []
            ], 400);
        }
    }

    public function register(Request $request)
    {
        try{
            $user = User::create($request->all());
            return response()->json([
                'status'=> true,
                'message'=> 'Berhasil register',
                'data'=> $user
            ], 200);
        }catch(\Exception $e){
            return response()->json([
                'status'=> false,
                'message'=> $e->getMessage(),
                'data'=> []
            ], 400);
        }
    }

    public function login(Request $request)
    {
        try{
            $loginData = $request->all();
            $user = User::where('username', $loginData['username'])->where('password', $loginData['password'])->first();
            if($user){
                return response()->json([
                    'status' => true,
                    'message' => 'Berhasil login',
                    'data' => $user
                ], 200);
            }else{
                return response()->json([
                    'status'=> false,
                    'message'=> 'Gagal Login',
                    'data'=> []
                ], 400);
            }

        }catch(\Exception $e){
            return response()->json([
                'status'=> false,
                'message'=> $e->getMessage(),
                'data'=> []
            ], 400);
        }
        
    }

    public function validasi(Request $request)
    {
        try{
            $validasi = $request->all();
            $user = User::where('email', $validasi['email'])->first();
            if($user){
                return response()->json([
                    'status' => true,
                    'message' => 'Berhasil validasi',
                    'data' => $user
                ], 200);
            }else{
                return response()->json([
                    'status'=> false,
                    'message'=> 'Gagal validasi',
                    'data'=> []
                ], 400);
            }

        }catch(\Exception $e){
            return response()->json([
                'status'=> false,
                'message'=> $e->getMessage(),
                'data'=> []
            ], 400);
        }
        
    }

    
    public function show($id)
    {
        try{
            $user = User::find($id);

            if(!$user) throw new \Exception('User tidak ditemukan');

            return response()->json([
                'status'=> true,
                'message'=> 'Berhasil ambil data user',
                'data'=> $user
            ], 200);
        }catch(\Exception $e){
            return response()->json([
                'status'=> false,
                'message'=> $e->getMessage(),
                'data'=> []
            ], 400);
        }
    }

    public function update(Request $request, $id)
    {
        try{
            $user = User::find($id);

            if(!$user) throw new \Exception('User tidak ditemukan');

            $user->update($request->all());

            return response()->json([
                'status'=> true,
                'message'=> 'Berhasil update data user',
                'data'=> $user
            ], 200);
        }catch(\Exception $e){
            return response()->json([
                'status'=> false,
                'message'=> $e->getMessage(),
                'data'=> []
            ], 400);
        }
    }

    public function updateImage(Request $request, $id)
    {
        try{
            $user = User::find($id);

            if(!$user) throw new \Exception('User tidak ditemukan');

            $user->update($request->only('image'));

            return response()->json([
                'status'=> true,
                'message'=> 'Berhasil update data user',
                'data'=> $user
            ], 200);
        }catch(\Exception $e){
            return response()->json([
                'status'=> false,
                'message'=> $e->getMessage(),
                'data'=> []
            ], 400);
        }
    }

    public function destroy($id)
    {
        try{
            $user = User::find($id);

            if(!$user) throw new \Exception('User tidak ditemukan');

            $user->delete();

            return response()->json([
                'status'=> true,
                'message'=> 'Berhasil delete data user',
                'data'=> $user
            ], 200);
        }catch(\Exception $e){
            return response()->json([
                'status'=> false,
                'message'=> $e->getMessage(),
                'data'=> []
            ], 400);
        }
    }


}
