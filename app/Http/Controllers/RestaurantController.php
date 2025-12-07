<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RestaurantController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        Log::info('🍽️ Restaurants index page accessed', [
            'user_id' => auth()->id(),
            'timestamp' => now()->toDateTimeString()
        ]);

        return view("restaurants.index");
    }

    public function control()
    {
        Log::info('🎛️ Restaurant Control page accessed', [
            'user_id' => auth()->id(),
            'timestamp' => now()->toDateTimeString()
        ]);

        return view("restaurants.control");
    }

    public function view($id)
    {
        Log::info('👁️ Restaurant View page accessed', [
            'user_id' => auth()->id(),
            'restaurant_id' => $id,
            'timestamp' => now()->toDateTimeString()
        ]);

        return view("restaurants.view")->with('id', $id);
    }

    public function edit($id)
    {
        Log::info('✏️ Restaurant Edit page accessed', [
            'user_id' => auth()->id(),
            'restaurant_id' => $id,
            'timestamp' => now()->toDateTimeString()
        ]);

        return view("restaurants.edit")->with('id', $id);
    }

    public function create()
    {
        Log::info('➕ Restaurant Create page accessed', [
            'user_id' => auth()->id(),
            'timestamp' => now()->toDateTimeString()
        ]);

        return view("restaurants.create");
    }

    public function promos($id)
    {
        Log::info('🎁 Restaurant Promos page accessed', [
            'user_id' => auth()->id(),
            'restaurant_id' => $id,
            'timestamp' => now()->toDateTimeString()
        ]);

        return view("restaurants.promos")->with('id', $id);
    }

    public function log(Request $request)
    {
        Log::info('📝 Restaurant log action', [
            'user_id' => auth()->id(),
            'data' => $request->all(),
            'timestamp' => now()->toDateTimeString()
        ]);

        return response()->json(['success' => true]);
    }

    public function editNew($id)
    {
        Log::info('🆕 Restaurant Edit New page accessed', [
            'user_id' => auth()->id(),
            'restaurant_id' => $id,
            'timestamp' => now()->toDateTimeString()
        ]);

        return view("restaurants.edit_tab")->with('id', $id);
    }
}
