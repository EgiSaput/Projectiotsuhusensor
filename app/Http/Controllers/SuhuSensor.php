<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MSensor;

class SuhuSensor extends Controller
{
    public function bacasuhu()
    {
        // baca nilai / isi tabel tb_sensor dan ambil nilai suhu
        $sensor = MSensor::select('*')->get();
        //kirim ke tampilan baca suhu (buat view bacasuhu)
        return view('bacasuhu', ['nilaisensor' => $sensor]);
    
    }

    public function bacakelembaban()
    {
        // baca nilai / isi tabel tb_sensor dan ambil nilai suhu
        $sensor = MSensor::select('*')->get();
        //kirim ke tampilan baca suhu (buat view bacasuhu)
        return view('bacakelembaban', ['nilaisensor' => $sensor]);
    
    }

    

    public function simpansensor(String $suhu,String $kelembaban)
    {
        $dhtData = MSensor::first();

        if ($dhtData !== null) {

            MSensor::where('id', $dhtData->id)->update([
                'suhu' => $suhu,
                'kelembaban' => $kelembaban,
            ]);

        } else {

            $dhtData = MSensor::create([
                "suhu" => $suhu,
                "kelembaban" => $kelembaban
            ]);
        }

    }
}
