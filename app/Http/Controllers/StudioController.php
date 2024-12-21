<?php

namespace App\Http\Controllers;

use App\Models\Studio;
use App\Http\Request\Studio\StudioRequest;
use Illuminate\Http\Request;

class StudioController extends Controller
{
    public function index()
    {
        $studios = Studio::all();
        return response()->json($studios, 200);
    }

    public function show($id)
    {
        $studio = Studio::findOrFail($id);
        return response()->json($studio, 200);
    }

    public function createStudio(StudioRequest $request)
    {
        $studio = Studio::create([
            'name' => $request->validated()['name'],
        ]);

        return response()->json([
            'message' => 'Студия успешно добавлена.',
            'studio' => $studio,
        ], 201);
    }

    public function updateStudio(StudioRequest $request, $id)
    {
        $studio = Studio::find($id);

        if (!$studio) {
            return response()->json([
                'message' => 'Студия не найдена.',
            ], 404);
        }

        $studio->name = $request->validated()['name'];

        $studio->save();

        return response()->json([
            'message' => 'Студия успешно обновлена.',
            'studio' => $studio,
        ], 200);
    }

    public function deleteStudio($id)
    {
        $studio = Studio::find($id);

        if (!$studio) {
            return response()->json([
                'message' => 'Студия не найдена.',
            ], 404);
        }

        $studio->delete();

        return response()->json([
            'message' => 'Студия успешно удалена.',
        ], 200);
    }
}
