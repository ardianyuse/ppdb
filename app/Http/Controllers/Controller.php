<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as DasarController;
use Illuminate\Support\Facades\DB;

// class Avanza (1.3, 1.5) extends AstraDaihatsu extends Mobil
// class Xenia (1L, 1.3L) extends AstraDaihatsu extends Mobil
// class CX5 extends Mazda extends Mobil
// class 2 extends Mazda extends Mobil

// https://laravel.com/docs/9.x/controllers
class Controller extends DasarController
{
    public function index()
    {
    	// mengambil data dari table syllabus
    	$datapelajaran = DB::table('syllabus')->get();
    	$datasiswa = Siswa->get();
 
    	// mengirim data syllabus ke view index
    	return view('welcome', ['datapelajaran' => $datapelajaran]);
    }
}
