<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Models\Property;
use Exception;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    //listar todas os imoveis
    public function index()
    {
        try {
            $properties = Property::all();
            return ApiResponse::success($properties, 'Imoveis listados com sucesso.');
        } catch (Exception $e) {
            return ApiResponse::error('Erro ao listar imoveis.', 500, [$e->getMessage()]);
        }

    }

    //cadastrar novo imóvel
    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'title' => 'required|string',
                'description' => 'nullable|string',
                'address' => 'required|string',
                'features' => 'nullable|string',
                'price' => 'required|numeric',
                'bedrooms' => 'required|integer',
                'bathrooms' => 'required|integer',
                'land_area' => 'required|numeric',
                'built_area' => 'required|numeric',
                'city_id' => 'required|exists:cities,id',
                'status_id' => 'required|exists:statuses,id',
                'type_id' => 'required|exists:property_types,id'
            ]);

            $property = Property::create($data);

            return ApiResponse::success($property, 'Imóvel cadastrado com sucesso.', 201);

        } catch (Exception $e) {
            return ApiResponse::error('Erro ao cadastrar imóvel.', 500, [$e->getMessage()]);
        }
    }

    //mostra um imóvel
    public function show(string $id)
    {
        try {
            $property = Property::findOrFail($id);
            return ApiResponse::success($property, 'Imóvel encontrado com sucesso.');
        } catch (Exception $e) {
            return ApiResponse::error('Imóvel não encontrado.', 404, [$e->getMessage()]);
        }
    }

    //atualizando um registro de imóvel
    public function update(Request $request, string $id)
    {
        try {
            $data = $request->validate([
                'title' => 'required',
                'description' => 'nullable',
                'address' => 'required',
                'features' => 'nullable',
                'price' => 'required',
                'bedrooms' => 'required',
                'bathrooms' => 'required',
                'land_area' => 'required',
                'built_area' => 'required',
                'city_id' => 'required|exists:cities,id',
                'status_id' => 'required|exists:statuses,id',
                'type_id' => 'required|exists:property_types,id'
            ]);

            $city = Property::findOrFail($id);
            $city->update($data);

            return ApiResponse::success($city, 'Imóvel atualizado com sucesso.');

        } catch (Exception $e) {
            return ApiResponse::error('Erro ao atualizar imóvel.', 500, [$e->getMessage()]);
        }
    }

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
