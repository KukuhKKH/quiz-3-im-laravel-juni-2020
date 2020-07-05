<?php

namespace App\Http\Controllers;

use App\Models\TagModel;
use App\Models\ArtikelModel;
use Illuminate\Http\Request;
use App\Http\Requests\ArtikelCreateRequest;
use App\Http\Requests\ArtikelUpdateRequest;

class ArtikelController extends Controller
{
    public function index() {
        $no= 1;
        $artikel = ArtikelModel::get_all();
        return view('pages.index', compact('artikel', 'no'));
    }

    public function create() {
        $tags = TagModel::get_all();
        return view('pages.create', compact('tags'));
    }

    public function store(ArtikelCreateRequest $request) {
        $insert = ArtikelModel::insert($request->all());
        if($insert == "true"){
            return redirect()->route('artikel.index');
        } else{
            return response()->json([
                'error' => $insert
            ]);
        }
    }

    public function show($id) {
        $artikel = ArtikelModel::find($id);
        $tag = explode(',', $artikel->tags);
        return view('pages.show', compact('artikel', 'tag'));
    }

    public function edit($id) {
        $artikel = ArtikelModel::find($id);
        $tag = explode(',', $artikel->tags);
        $tags = TagModel::get_all();
        return view('pages.update', compact('artikel', 'tag', 'tags'));
    }

    public function update($id, ArtikelUpdateRequest $request) {
        $update = ArtikelModel::update_data($request->all(), $id);
        if($update == "true"){
            return redirect()->route('artikel.index');
        } else{
            return response()->json([
                'error' => $update
            ]);
        }
    }

    public static function destroy($id) {
        $delete = ArtikelModel::destroy_data($id);
        if($delete) {
            return redirect()->route('artikel.index');
        } else{
            return response()->json([
                'error' => $update
            ]);
        }
    }
}
