<?php

namespace App\Http\Controllers;

require_once app_path('Helpers/structureHelper.php');

use App\Models\Siege;
use App\Models\Structure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StructureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $structures = Structure::with('children')->with('parent')->get();
        return view('structures.index', compact('structures'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $structures = Structure::whereNull('parent_id')->get();
        $sieges= Siege::all();

        return view('structures.create', compact('structures','sieges'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'parent_id' => 'nullable|exists:structures,id',
        ]);
        $parent=Structure::find($request['parent_id']);

        $request['slug']=Str::slug($request->input('name'), "-");
        $request['position']=++$parent->position;

        $structure = Structure::create($request->all());

        return redirect()->route('structures.index')->with('success', 'structure created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
    $structure = $this->find($slug);

    if (!$structure)
        abort(403,'unexisisting Record');

    $structures = Structure::where('slug', '<>', $slug)->get();
    $sieges= Siege::all();


    return view('structures.edit', compact('structure', 'structures','sieges'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'parent_id' => 'nullable|exists:structures,id',
        ]);

        $structure = $this->find($slug);

        $structure->name = $request->input('name');
        $structure->slug=Str::slug($structure->name, "-");
        $structure->description = $request->input('description');
        $structure->parent_id = $request->input('parent_id');
        $structure->is_enabled = $request->input('is_enabled');
        $structure->siege_id = $request->input('siege_id');
        $structure->position=$this->position($structure);
        $structure->save();

       return redirect()->route('structures.index')->with('success', 'structure updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $structure=$this->find($slug);
        $structure->delete();

        return redirect()->route('structures.index')->with('success', 'structure deleted successfully.');
    }

    public function find($slug)
    {
        return Structure::firstwhere('slug', $slug);
    }


    protected function position (Structure $structure){
        if($structure->parent===null)
            return 0 ; //default starting position
        return ++$structure->parent->position;
    }
}
