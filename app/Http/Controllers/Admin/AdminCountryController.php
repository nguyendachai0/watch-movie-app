<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class AdminCountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listCountries = Country::all();
        return view('admin.country.index', compact('listCountries'));
    }
    public function create()
    {
        $listCountries = Country::all();
        return view('admin.country.form', compact('listCountries'));
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $country = new Country();
        $country->title = $data['title'];
        $country->description = $data['description'];
        $country->slug = $data['slug'];
        $country->status = $data['status'];
        $country->save();
        return redirect()->back();
    }
    public function show(string $id)
    {
        //
    }
    public function edit(string $id)
    {
        $countryToEdit = Country::find($id);
        $listCountries = Country::all();
        return view('admin.country.index', compact('listCountries', 'countryToEdit'));
    }
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $country = Country::find($id);
        $country->title = $data['title'];
        $country->description = $data['description'];
        $country->slug = $data['slug'];
        $country->status = $data['status'];
        $country->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Country::find($id)->delete();
        return redirect()->back();
    }
}
