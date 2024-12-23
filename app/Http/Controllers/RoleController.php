<?php

namespace App\Http\Controllers;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return response()->json($roles, 200);
    }

    public function show($id)
    {
        $role = Role::findOrFail($id);
        return response()->json($role, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:role,name',
        ]);

        $role = Role::create($request->all());
        return response()->json($role, 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:role,name,' . $id,
        ]);

        $role = Role::findOrFail($id);
        $role->update($request->all());
        return response()->json($role, 200);
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        return response()->json(['message' => 'Роль удалена.'], 200);
    }
}
