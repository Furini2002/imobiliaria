<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Http\Requests\FilterPropertyRequest;
use App\Http\Requests\StorePropertyRequest;
use App\Http\Requests\UpdatePropertyRequest;
use App\Models\Property;
use Exception;

class PropertyController extends Controller
{
    /*
     * Lista todas os imóveis
     */
    public function index(FilterPropertyRequest $request)
    {
        $query = Property::query();

        if ($request->filled('status')) {
            $query->where('status_id', $request->status);
        }
        if ($request->filled('city')) {
            $query->where('city_id', $request->city);
        }
        if ($request->filled('type')) {
            $query->where('type_id', $request->type);
        }

        return ApiResponse::success($query->get());
    }

    public function indexBrief(FilterPropertyRequest $request)
    {
        $query = Property::query();

        if ($request->filled('status')) {
            $query->where('status_id', $request->status);
        }
        if ($request->filled('city')) {
            $query->where('city_id', $request->city);
        }
        if ($request->filled('type')) {
            $query->where('type_id', $request->type);
        }

        $properties = $query->with(['city', 'images'])->get();

        $result = $properties->map(function ($property) {
            return [
                'id' => $property->id,
                'title' => $property->title,
                'price' => $property->price,
                'bathrooms' => $property->bathrooms,
                'bedrooms' => $property->bedrooms,
                'built_area' => $property->built_area,
                'city' => $property->city ? $property->city->name : null,
                'image' => $property->images->first() ? $property->images->first()->url : null,
            ];
        });

        if ($result->isEmpty()) {
            return ApiResponse::success([], 'Nenhum imóvel encontrado.');
        }

        return ApiResponse::success($result);
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

        \Log::info("Tentando buscar imóvel com ID: {$id}");
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
