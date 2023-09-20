<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;

class IndoRegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinces = Province::all();
        // $regencies = Regency::all();
        // $districts = District::all();
        // $villages  = Village::all();

        return view('form', compact('provinces'));
    }

    public function kabupaten(request $request) {
        $id_provinsi = $request->id_provinsi;

        $kabupaten = Regency::where('province_id', $id_provinsi)->get();

        $option = "  <option selected class='text-center'>-- Pilih Kabupaten --</option>";

        foreach ($kabupaten as $kabupaten) {
            $option.="<option value='$kabupaten->id'>$kabupaten->name </option>";
        }

        echo $option;
    }

    public function kecamatan(request $request) {
        $id_kabupaten = $request->id_kabupaten;

        $kecamatan = District::where('regency_id', $id_kabupaten)->get();

        $option = "  <option selected class='text-center'>-- Pilih Kecamatan --</option>";

        foreach ($kecamatan as $kecamatan) {
            $option.="<option value='$kecamatan->id'>$kecamatan->name </option>";
        }

        echo $option;
    }
    public function desa(request $request) {
        $id_kecamatan = $request->id_kecamatan;

        $desa = Village::where('district_id', $id_kecamatan)->get();

        $option = "  <option selected class='text-center'>-- Pilih Desa --</option>";

        foreach ($desa as $desa) {
            $option.="<option value='$desa->id'>$desa->name </option>";
        }
        echo $option;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
