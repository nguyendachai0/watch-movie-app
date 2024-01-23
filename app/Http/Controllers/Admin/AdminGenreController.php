<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;

class AdminGenreController extends Controller
{
    public function index()
    {
        $listGenres = Genre::all();
        return view('admin.genre.index', compact('listGenres'));
    }
    public function create()
    {
        $listGenres = Genre::all();
        return view('admin.genre.index', compact('listGenres'));
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $genre = new Genre();
        $genre->title = $data['title'];
        $genre->description = $data['description'];
        $genre->slug = $data['slug'];
        $genre->status = $data['status'];
        $genre->save();
        return redirect()->back();
    }
    public function show(string $id)
    {
    }
    public function edit(string $id)
    {
        $genreToEdit = Genre::find($id);
        $listGenres = Genre::all();
        return view('admin.genre.index', compact('genreToEdit', 'listGenres'));
    }
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $genre = Genre::find($id);
        $genre->title = $data['title'];
        $genre->description = $data['description'];
        $genre->slug = $data['slug'];
        $genre->status = $data['status'];
        $genre->save();
        return redirect()->back();
    }
    public function destroy(string $id)
    {
        Genre::find($id)->delete();
        return redirect()->back();
    }
}
