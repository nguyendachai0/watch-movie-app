<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Country;
use App\Models\Genre;
use App\Models\Movie;

class AdminMovieController extends Controller
{
    public function index()
    {
        $listCategoriesToChoose = Category::pluck('name', 'id');
        $listGenresToChoose = Genre::pluck('name', 'id');
        $listCountriesToChoose = Country::pluck('name', 'id');
        $listMovies = Movie::all();
        return view('admin.movie.index', compact('listMovies', 'listCategoriesToChoose', 'listGenresToChoose', 'listCountriesToChoose'));
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
        $movie->actor = $data['actor'];
        $movie->slug = $data['slug'];
        $movie->status = $data['status'];
        $movie->link_stream = $data['link_stream'];
        $movie->link_trailer = $data['link_trailer'];
        $movie->category_id = $data['category_id'];
        $movie->genre_id = $data['genre_id'];
        $movie->country_id = $data['country_id'];
        $get_image = $request->file('image');
        $get_poster = $request->file('poster');
        $path = 'uploads/movie/';
        $path_poster = 'uploads/movie/poster';
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 9999) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $movie->image = $new_image;
        }
        if ($get_poster) {
            $get_name_poster = $get_poster->getClientOriginalName();
            $name_poster = current(explode('.', $get_name_poster));
            $new_poster = $name_poster . rand(0, 9999) . '.' . $get_poster->getClientOriginalExtension();
            $get_poster->move($path_poster, $new_poster);
            $movie->poster = $new_poster;
        }
        $movie->save();
        return redirect()->back();
    }
    public function show(string $id)
    {
        //
    }
    public function edit(string $id)
    {
        $listCategoriesToChoose = Category::pluck('title', 'id');
        $listGenresToChoose = Genre::pluck('title', 'id');
        $listCountriesToChoose = Country::pluck('title', 'id');
        $listMovies = Movie::all();
        $movieToEdit = Movie::find($id);
        return view('admin.movie.index', compact('movieToEdit', 'listMovies', 'listCategoriesToChoose', 'listGenresToChoose', 'listCountriesToChoose'));
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
        $movie->actor = $data['actor'];
        $movie->slug = $data['slug'];
        $movie->status = $data['status'];
        $movie->link_stream = $data['link_stream'];
        $movie->link_trailer = $data['link_trailer'];
        $movie->category_id = $data['category_id'];
        $movie->genre_id = $data['genre_id'];
        $movie->country_id = $data['country_id'];
        $get_image = $request->file('image');
        $get_poster = $request->file('poster');
        $path = 'uploads/movie/';
        $path_poster = 'uploads/movie/poster';
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
        if ($get_poster) {
            if (!empty($movie->poster)) {
                $filePath = 'uploads/movie/poster/' . $movie->image;
                if (file_exists($filePath)) {
                    unlink($filePath);
                } else {
                    echo "File not found or already deleted.";
                }
            }
            $get_name_poster = $get_poster->getClientOriginalName();
            $name_poster = current(explode('.', $get_name_poster));
            $new_poster = $name_poster . rand(0, 9999) . '.' . $get_poster->getClientOriginalExtension();
            $get_poster->move($path_poster, $new_poster);
            $movie->poster = $new_poster;
        }
        $movie->save();
        return redirect()->back();
    }
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
