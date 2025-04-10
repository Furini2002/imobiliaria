<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Http\Requests\StoreCityRequest;
use App\Http\Requests\UpdateCityRequest;
use App\Models\City;
use Exception;

class CityController extends Controller
{
    /*
     * Lista todas as cidades
     */
    public function index()
    {
        try {
            $cities = City::all();
            return ApiResponse::success($cities, 'Cidades listadas com sucesso.');
        } catch (Exception $e) {
            return ApiResponse::error('Erro ao listar cidades.', 500, [$e->getMessage()]);
        }

    }

    /*
     * Cadastra uma cidade
     */
    public function store(StoreCityRequest $request)
    {
        try {
            $city = City::create($request->validated());
            return ApiResponse::success($city, 'Cidade cadastrada com sucesso.', 201);

        } catch (Exception $e) {
            return ApiResponse::error('Erro ao cadastrar cidade.', 500, [$e->getMessage()]);
        }
    }

    /*
     * Mostra uma cidade específica
     */
    public function show(string $id)
    {
        try {
            $city = City::findOrFail($id);
            return ApiResponse::success($city, 'Cidade encontrada com sucesso.');
        } catch (Exception $e) {
            return ApiResponse::error('Cidade não encontrada.', 404, [$e->getMessage()]);
        }
    }

    /*
     * Atualiza uma cidade
     */
    public function update(UpdateCityRequest $request, string $id)
    {
        try {
            $city = City::findOrFail($id);
            $city->update($request->validated());

            return ApiResponse::success($city, 'Cidade atualizada com sucesso.');

        } catch (Exception $e) {
            return ApiResponse::error('Erro ao atualizar cidade.', 500, [$e->getMessage()]);
        }
    }

    /*
     * Deleta uma cidade
     */
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
