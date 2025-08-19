<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Models\Neighborhood;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Exception;

class NeighborhoodController extends Controller
{

    public function index(Request $request)
    {
        $query = Neighborhood::query();

        if ($request->filled('city_id')) {
            $query->where('city_id', $request->integer('city_id'));
        }

        if ($request->filled('q')) {
            $q = trim($request->input('q'));
            $query->where('name', 'LIKE', "%{$q}%");
        }

        $neighborhoods = $query
            ->with('city:id,name')
            ->orderBy('name')
            ->get();

        return ApiResponse::success($neighborhoods);
    }


    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'name' => ['required', 'string', 'max:100'],
                'city_id' => ['required', 'integer', 'exists:cities,id'],
            ]);

            // Unicidade do nome dentro da mesma cidade
            $request->validate([
                'name' => [
                    'required',
                    'string',
                    'max:100',
                    Rule::unique('neighborhoods', 'name')
                        ->where('city_id', $data['city_id']),
                ],
            ]);

            $neighborhood = Neighborhood::create($data);

            return ApiResponse::success($neighborhood->load('city:id,name'), 'Bairro cadastrado com sucesso.', 201);
        } catch (Exception $e) {
            return ApiResponse::error('Erro ao cadastrar bairro.', 500, [$e->getMessage()]);
        }
    }


    public function show(string $id)
    {
        try {
            $neighborhood = Neighborhood::with('city:id,name')->findOrFail($id);
            return ApiResponse::success($neighborhood, 'Bairro encontrado com sucesso.');
        } catch (Exception $e) {
            return ApiResponse::error('Bairro não encontrado.', 404, [$e->getMessage()]);
        }
    }

    public function update(Request $request, string $id)
    {
        try {
            $neighborhood = Neighborhood::findOrFail($id);

            $data = $request->validate([
                'name' => ['sometimes', 'required', 'string', 'max:100'],
                'city_id' => ['sometimes', 'required', 'integer', 'exists:cities,id'],
            ]);

            // Para validar unicidade por cidade no update:
            $name = $data['name'] ?? $neighborhood->name;
            $city_id = $data['city_id'] ?? $neighborhood->city_id;

            $request->validate([
                'name' => [
                    'sometimes',
                    'required',
                    'string',
                    'max:100',
                    Rule::unique('neighborhoods', 'name')
                        ->where('city_id', $city_id)
                        ->ignore($neighborhood->id),
                ],
            ]);

            $neighborhood->update($data);

            return ApiResponse::success($neighborhood->load('city:id,name'), 'Bairro atualizado com sucesso.');
        } catch (Exception $e) {
            return ApiResponse::error('Erro ao atualizar bairro.', 500, [$e->getMessage()]);
        }
    }

    public function destroy(string $id)
    {
        try {
            $neighborhood = Neighborhood::findOrFail($id);
            $neighborhood->delete();

            return ApiResponse::success([], 'Bairro removido com sucesso.');
        } catch (Exception $e) {
            return ApiResponse::error('Erro ao remover bairro.', 500, [$e->getMessage()]);
        }
    }
}
