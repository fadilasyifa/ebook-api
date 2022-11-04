<?php

namespace App\Http\Controllers;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $author = Author::all();

        return response()->json([
            "message"=>"load data success",
            "data"=> $author
        ],200);
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
        $message = [
            "nama" => "Masukan nama",
            "email" => "Masukan email",
            "gender" => "Masukan gender",
            "no_hp" => "Masukan Nomor Hp",
            "tanggal_lahir" => "Masukan Tanggal Lahir",
            "tempat_lahir" => "Masukan Tempat lahir"
        ];
        $validasi = Validator::make($request->all(),[
            "nama" => "required",
            "email" => "required",
            "gender" => "required",
            "no_hp" => "required",
            "tanggal_lahir" => "required",
            "tempat_lahir" => "required"
        ], $message);
        if ($validasi ->fails()) {
            return $validasi -> errors();
        }
        $authors = Author::create($validasi->validate());
        $authors->save();

        return response()->json([
            "message"=>"data success",
            "data"=> $authors
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $authorid = Author::find($id);
        if($authorid){
            return $authorid;
        }else{
            return ["message" => "Data tidak ditemukan"];
        }
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
        $auhtorup = Author::findOrFail($id);
        $auhtorup->update($request->all());
        $auhtorup->save();

        return $auhtorup;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delauthor = Author::find($id);
        if($delauthor){
            $delauthor->delete();
            return ["message" => "Delete Berhasil dihapus"];
        }else{
            return ["message" => "Delete tidak ditemukan"];
        }
    }
}
