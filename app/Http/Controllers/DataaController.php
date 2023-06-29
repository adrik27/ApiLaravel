<?php

namespace App\Http\Controllers;

use App\Models\Dataa;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DataaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Dataa.index', [
            'datas' => Dataa::all(),
            // 'datas' => Dataa::latest()->Filter(request(['search'])),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Dataa.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateCreate = $request->validate([
            'img'   =>  'required|image|max:2000000',
            'name'  =>  'required',
            'username'  =>  'required'
        ]);

        if ($request->file('img')) {
            $validateCreate['img'] = $request->file('img')->store('img-data');
        }

        Dataa::create($validateCreate);

        return redirect('/dataa')->with('success', 'Data baru berhasil tersimpan !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dataa $dataa)
    {
        return view('Dataa.detail', [
            'dt'    =>  $dataa
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dataa $dataa)
    {
        return view('Dataa.edit', [
            'dt'    =>  $dataa
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dataa $dataa)
    {
        $rules = [
            'img'   =>  'required|image|max:2000000',
            'name'  =>  'required',
            'username'  =>  'required'
        ];

        $validateUpdate = $request->validate($rules);

        if ($request->file('img')) {
            if ($request->oldImg) {
                Storage::delete($request->oldImg);
            }
            $validateUpdate['img'] = $request->file('img')->store('img-data');
        }

        Dataa::where('id', $dataa->id)
            ->update($validateUpdate);

        return redirect('/dataa')->with('success', 'Data berhasil di update !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dataa $dataa)
    {
        if ($dataa->img) {
            Storage::delete($dataa->img);
        }

        Dataa::destroy($dataa->id);

        return redirect()->back()->with('success', 'delete data sukses !');
    }

    // ambil data api
    public function getApi()
    {
        $url = 'https://jsonplaceholder.typicode.com/users';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        $data = json_decode($response, true);

        return $data;
    }

    // simpan data api ke database
    public function simpanApi()
    {
        $api = $this->getApi();

        foreach ($api as $dt) {
            Dataa::create($dt);
        }

        return redirect('/data')->with('success', 'Api Berhasil Di Ambil dan tersimpan !');
    }
}
