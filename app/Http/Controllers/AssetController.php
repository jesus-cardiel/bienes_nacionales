<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Category;
use App\Models\Department;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    public function index()
    {
        $assets = Asset::with(['category', 'department'])->get();
        return view('assets.index', compact('assets'));
    }

    public function create()
    {
        $categories = Category::all();
        $departments = Department::all();
        return view('assets.create', compact('categories', 'departments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|unique:assets',
            'description' => 'required',
            'status' => 'required',
            'category_id' => 'required',
            'department_id' => 'required',
        ]);
        Asset::create($request->all());
        return redirect()->route('assets.index')->with('success', 'Bien Nacional registrado exitosamente.');
    }

    public function edit(Asset $asset)
    {
        $categories = Category::all();
        $departments = Department::all();
        return view('assets.edit', compact('asset', 'categories', 'departments'));
    }

    public function update(Request $request, Asset $asset)
    {
        $request->validate([
            'codigo' => 'required|unique:assets,codigo,'.$asset->id,
            'description' => 'required',
            'category_id' => 'required',
            'department_id' => 'required',
        ]);
        $asset->update($request->all());
        return redirect()->route('assets.index')->with('success', 'Bien Nacional actualizado.');
    }

    public function destroy(Asset $asset)
    {
        $asset->delete();
        return redirect()->route('assets.index')->with('success', 'Bien eliminado.');
    }
}
