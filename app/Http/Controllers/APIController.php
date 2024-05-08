<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class APIController extends Controller
{
    public function api()
    {
        $movies = Movie::take(10)->get();

        foreach ($movies as $movie) {
            // Download thumb image
            $thumbUrl = str_replace('15', '16', $movie->thumb);
            $thumbFileName = pathinfo(basename($thumbUrl), PATHINFO_FILENAME) . '.webp';
            $thumbContents = file_get_contents($thumbUrl);
            $thumbPath = 'thumbs/' . $thumbFileName;
            Storage::disk('public')->put($thumbPath, $thumbContents);

            // Update thumb attribute of Movie model
            $movie->thumb = Storage::url($thumbPath);
            // Download poster image
            $posterUrl = str_replace('15', '16', $movie->poster);
            $posterFileName = pathinfo(basename($posterUrl), PATHINFO_FILENAME) . '.webp';
            $posterContents = file_get_contents($posterUrl);
            $posterPath = 'posters/' . $posterFileName;
            Storage::disk('public')->put($posterPath, $posterContents);

            // Update poster attribute of Movie model
            $movie->poster = Storage::url($posterPath);

            // Save changes to Movie model
            $movie->save();
        }

        return response()->json(['message' => 'Images downloaded, saved, and movie attributes updated successfully']);
    }
}
