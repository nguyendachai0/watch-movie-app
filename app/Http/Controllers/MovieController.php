<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Country;
use App\Models\Genre;
use App\Models\Movie;

class MovieController extends Controller
{
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::pluck('title', 'id');
        $genre = Genre::pluck('title', 'id');
        $country = Country::pluck('title', 'id');
        $list = Movie::all();
        return view('admincp.movie.form', compact('list', 'category', 'genre', 'country'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $movie = new Movie();
        $movie->title = $data['title'];
        $movie->description = $data['description'];
        $movie->slug = $data['slug'];
        $movie->status = $data['status'];
        $movie->category_id = $data['category_id'];
        $movie->genre_id = $data['genre_id'];
        $movie->country_id = $data['country_id'];
        $get_image = $request->file('image');
        $path = 'uploads/movie/';
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 9999) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $movie->image = $new_image;
        }
        $movie->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::pluck('title', 'id');
        $genre = Genre::pluck('title', 'id');
        $country = Country::pluck('title', 'id');
        $list = Movie::with('category', 'genre', 'country')->orderBy('id', 'DESC')->get();
        $movie = Movie::find($id);
        return view('admincp.movie.form', compact('list', 'category', 'genre', 'country', 'movie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $movie =  Movie::find($id);
        $movie->title = $data['title'];
        $movie->description = $data['description'];
        $movie->slug = $data['slug'];
        $movie->status = $data['status'];
        $movie->category_id = $data['category_id'];
        $movie->genre_id = $data['genre_id'];
        $movie->country_id = $data['country_id'];
        $get_image = $request->file('image');
        $path = 'uploads/movie/';
        if ($get_image) {
            if (!empty($movie->image)) {
                unlink('uploads/movie/' . $movie->image);
            }
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 9999) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $movie->image = $new_image;
        }
        $movie->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $movie =  Movie::find($id);
        if (!empty($movie->image)) {
            unlink('uploads/movie/' . $movie->image);
        }
        $movie->delete();
        return redirect()->back();
    }
}
