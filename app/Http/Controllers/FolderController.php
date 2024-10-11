<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FolderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $folders = Folder::all();

        return view('folder.index', compact('folders'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        Folder::create([
            'name' => $request->input('name'),
            'year' => $request->input('year'),
            'user_id' => auth()->id(),
        ]);

        alert()->success('Folder Created Successfully!');

        return redirect()->route('folder.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Folder $folder): RedirectResponse
    {
        $folder->delete();

        alert()->success('Folder Deleted Successfully!');

        return redirect()->route('folder.index');
    }
}
