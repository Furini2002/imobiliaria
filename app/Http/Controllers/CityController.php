<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Models\City;
use Illuminate\Http\Request;
use Exception;

class CityController extends Controller
{
    //listar todas as cidades
    public function index()
    {
        try {
            $cities = City::all();
            return ApiResponse::success($cities, 'Cidades listadas com sucesso.');
        } catch (Exception $e) {
            return ApiResponse::error('Erro ao listar cidades.', 500, [$e->getMessage()]);
        }

    }

    //cadastrar nova cidade
    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'name' => 'required',
                'state' => 'required'
            ]);

            $city = City::create($data);
            return ApiResponse::success($city, 'Cidade cadastrada com sucesso.', 201);

        } catch (Exception $e) {
            return ApiResponse::error('Erro ao cadastrar cidade.', 500, [$e->getMessage()]);
        }
    }

    public function show(string $id)
    {
        try {
            $city = City::findOrFail($id);
            return ApiResponse::success($city, 'Cidade encontrada com sucesso.');
        } catch (Exception $e) {
            return ApiResponse::error('Cidade não encontrada.', 404, [$e->getMessage()]);
        }
    }

    public function update(Request $request, string $id)
    {
        try {
            $data = $request->validate([
                'name' => 'required',
                'state' => 'required'
            ]);

            $city = City::findOrFail($id);
            $city->update($data);

            return ApiResponse::success($city, 'Cidade atualizada com sucesso.');

        } catch (Exception $e) {
            return ApiResponse::error('Erro ao atualizar cidade.', 500, [$e->getMessage()]);
        }
    }

    public function destroy(string $id)
    {
        try {
            $city = City::findOrFail($id);
            $city->delete();

            return ApiResponse::success([], 'Cidade removida com sucesso.');
        } catch (Exception $e) {
            return ApiResponse::error('Erro ao remover cidade.', 500, [$e->getMessage()]);
        }
    }
}
