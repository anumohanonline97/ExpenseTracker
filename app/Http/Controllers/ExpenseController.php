<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    public function index()
    {
        $expenses = Expense::with('category')->where('user_id', Auth::id())->get();
        return response()->json($expenses);
    }

    public function show($id)
    {
        $expense = Expense::with('category')->find($id);

        if (!$expense) {
            return response()->json(['message' => 'Expense not found'], 404);
        }

        return response()->json($expense);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'amount' => 'required|numeric',
            'description' => 'nullable|string',
            'date' => 'required|date',
        ]);

        $validated['user_id'] = Auth::id();

        $expense = Expense::create($validated);

        return response()->json($expense, 201);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'amount' => 'required|numeric',
            'description' => 'nullable|string',
            'date' => 'required|date',
        ]);

        $expense = Expense::where('user_id', Auth::id())->findOrFail($id);
        $expense->update($validated);

        return response()->json($expense);
    }

    public function destroy($id)
    {
        $expense = Expense::where('user_id', Auth::id())->findOrFail($id);
        $expense->delete();

        return response()->json(['message' => 'Expense deleted successfully.']);
    }
}
