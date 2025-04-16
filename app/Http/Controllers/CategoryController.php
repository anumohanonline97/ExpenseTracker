<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index() 
    {
        return response()->json(Category::all());
    }

    public function store(Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $category = Category::create(['name' => $request->name]);
        return response()->json(['message' => 'Category created!', 'data' => $category], 201);
    }

    public function show($id) 
    {
        $category = Category::find($id);
        return $category ? response()->json($category) : response()->json(['message' => 'Not found'], 404);
    }

    public function update(Request $request, $id) 
    {
        $category = Category::find($id);
        if (!$category) return response()->json(['message' => 'Not found'], 404);

        $category->update(['name' => $request->name]);
        return response()->json(['message' => 'Updated!', 'data' => $category]);
    }

    public function destroy($id) 
    {
        $category = Category::find($id);
        if (!$category) return response()->json(['message' => 'Not found'], 404);

        $category->delete();
        return response()->json(['message' => 'Deleted!']);
    }
}

