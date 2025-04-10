<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Http\Requests\StorePropertyRequest;
use App\Http\Requests\UpdatePropertyRequest;
use App\Models\Property;
use Exception;

class PropertyController extends Controller
{
    /*
     * Lista todas os imóveis
     */
    public function index()
    {
        try {
            $properties = Property::all();
            return ApiResponse::success($properties, 'Imoveis listados com sucesso.');
        } catch (Exception $e) {
            return ApiResponse::error('Erro ao listar imoveis.', 500, [$e->getMessage()]);
        }

    }

    /*
     * Cadastra um novo imóvel
     */
    public function store(StorePropertyRequest $request)
    {
        try {
            $property = Property::create($request->validated());

            return ApiResponse::success($property, 'Imóvel cadastrado com sucesso.', 201);

        } catch (Exception $e) {
            return ApiResponse::error('Erro ao cadastrar imóvel.', 500, [$e->getMessage()]);
        }
    }

    /*
     * Mostra um imóvel específico
     */
    public function show(string $id)
    {
        try {
            $property = Property::findOrFail($id);
            return ApiResponse::success($property, 'Imóvel encontrado com sucesso.');
        } catch (Exception $e) {
            return ApiResponse::error('Imóvel não encontrado.', 404, [$e->getMessage()]);
        }
    }

    /*
     * Atualiza um imóvel específico
     */
    public function update(UpdatePropertyRequest $request, string $id)
    {
        try {
            $city = Property::findOrFail($id);
            $city->update($request->validated());

            return ApiResponse::success($city, 'Imóvel atualizado com sucesso.');

        } catch (Exception $e) {
            return ApiResponse::error('Erro ao atualizar imóvel.', 500, [$e->getMessage()]);
        }
    }

    /*
     * Deleta um imóvel
     */
    public function destroy(string $id)
    {
        try {
            $city = Property::findOrFail($id);
            $city->delete();

            return ApiResponse::success([], 'Imóvel removido com sucesso.');
        } catch (Exception $e) {
            return ApiResponse::error('Erro ao remover imóvel.', 500, [$e->getMessage()]);
        }
    }
}
