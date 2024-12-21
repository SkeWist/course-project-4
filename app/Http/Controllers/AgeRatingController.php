<?php

namespace App\Http\Controllers;

use App\Models\AgeRating;
use App\Http\Request\AgeRating\AgeRatingRequest;
use Illuminate\Http\Request;

class AgeRatingController extends Controller
{
    public function index()
    {
        $ratings = AgeRating::all();
        return response()->json($ratings, 200);
    }

    public function show($id)
    {
        $rating = AgeRating::findOrFail($id);
        return response()->json($rating, 200);
    }

    public function createAgeRating(AgeRatingRequest $request)
    {

        $ageRating = AgeRating::create([
            'name' => $request->validated()['name'],
        ]);


        return response()->json([
            'message' => 'Возрастной рейтинг успешно добавлен.',
            'age_rating' => $ageRating,
        ], 201);
    }

    public function updateAgeRating(AgeRatingRequest $request, $id)
    {

        $ageRating = AgeRating::find($id);

        if (!$ageRating) {
            return response()->json([
                'message' => 'Возрастной рейтинг не найден.',
            ], 404);
        }

        $ageRating->name = $request->validated()['name'];


        $ageRating->save();

        return response()->json([
            'message' => 'Возрастной рейтинг успешно обновлён.',
            'age_rating' => $ageRating,
        ], 200);
    }

    public function deleteAgeRating($id)
    {

        $ageRating = AgeRating::find($id);

        if (!$ageRating) {
            return response()->json([
                'message' => 'Возрастной рейтинг не найден.',
            ], 404);
        }

        $ageRating->delete();
        
        return response()->json([
            'message' => 'Возрастной рейтинг успешно удалён.',
        ], 200);
    }
}
