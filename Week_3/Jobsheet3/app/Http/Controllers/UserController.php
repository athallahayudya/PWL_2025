<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){

        $data = [
            'nama' => 'Pelanggan Pertama',
        ];
       // UserModel::insert($data); //tambah data ke tabel m_user
       UserModel::where('username', 'customer-1')->update($data);
        //coba akses model UserMosel
        $user = UserModel::all();
        return view('user', ['data' => $user]);
    }
}
