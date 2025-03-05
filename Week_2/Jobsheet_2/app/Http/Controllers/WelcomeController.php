<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function hello() {
        return 'Hello World';
    }

    public function greeting(){
        return view('blog.hello')
        -> with ('name','Athal')
        -> with ('occupation', 'Damkar');
    }

    public function index() {
        return 'Selamat Datang';
    }

    public function about() {
        return '2341760061 / Athallah Ayudya';
    }

    public function articles($id) {
        return 'Halaman Artikel dengan ID '.$id;
    }
}
