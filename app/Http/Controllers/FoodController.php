<?php

namespace App\Http\Controllers;

use App\Http\Requests\FoodRequest;
use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index()
    {
        $food = Food::paginate('10');
        return view('food/index', ['food' => $food]);
    }

    public function create()
    {
        return view('food/create');
    }

    public function store(FoodRequest $request)
    {
        try {
            $data = $request->all();
            if ($request->file('picture_path')) {
                $data['picturePath'] = $request->file('picture_path')->store('assets/food', 'public');
            }
            Food::create($data);
            return redirect()->route('food.index');
        } catch (\Exception $e) {
            return back()->withErrors(['message' => $e->getMessage()]);
        }
    }

    public function show(Food $food)
    {
        //
    }

    public function edit(Food $food)
    {
        return view('food.edit', ['food' => $food]);
    }

    public function update(FoodRequest $request, Food $food)
    {
        $data = $request->all();

        if ($request->file('picture_path')) {
            $data['picturePath'] = $request->file('picture_path')->store('assets/food', 'public');
        }
        $food->update($data);
        return redirect()->route('food.index');
    }

    public function destroy(Food $food)
    {
        $food->delete();
        return back();
    }
}
