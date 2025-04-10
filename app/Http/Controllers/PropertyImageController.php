<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Http\Requests\StorePropertyImageRequest;
use App\Http\Requests\UpdatePropertyImageRequest;
use App\Models\PropertyImage;
use Exception;

class PropertyImageController extends Controller
{
    /*
     * Lista as imagens de um imóvel específico
     */
    public function indexByProperty(string $propertyId)
    {
        try {
            $images = PropertyImage::where('property_id', $propertyId)->get();

            return ApiResponse::success($images, 'Imagens do imóvel listadas com sucesso.');
        } catch (Exception $e) {
            return ApiResponse::error('Erro ao buscar imagens do imóvel.', 500, [$e->getMessage()]);
        }
    }

    /*
     * Cadastra a imagem de um imóvel
     */
    public function store(StorePropertyImageRequest $request)
    {
        try {
            $propertyImages = PropertyImage::create($request->validate());

            return ApiResponse::success($propertyImages, 'Imagem cadastrada com sucesso.', 201);

        } catch (Exception $e) {
            return ApiResponse::error('Erro ao cadastrar imagem.', 500, [$e->getMessage()]);
        }
    }

    /*
     * Mostra uma imagem do imóvel
     */
    public function show(string $id)
    {
        try {
            $propertyImages = PropertyImage::findOrFail($id);
            return ApiResponse::success($propertyImages, 'Imagem encontrada com sucesso.');
        } catch (Exception $e) {
            return ApiResponse::error('Imagem não encontrada.', 404, [$e->getMessage()]);
        }
    }

    /*
     * Atualiza uma imagem
     */
    public function update(UpdatePropertyImageRequest $request, string $id)
    {
        try {
            $propertyImages = PropertyImage::findOrFail($id);
            $propertyImages->update($request->validate());

            return ApiResponse::success($propertyImages, 'Imagem atualizada com sucesso.');

        } catch (Exception $e) {
            return ApiResponse::error('Erro ao atualizar imagem.', 500, [$e->getMessage()]);
        }
    }

    /*
     * Deleta uma imagem
     */
    public function destroy(string $id)
    {
        try {
            $propertyImages = PropertyImage::findOrFail($id);
            $propertyImages->delete();

            return ApiResponse::success([], 'Imagem removida com sucesso.');
        } catch (Exception $e) {
            return ApiResponse::error('Erro ao remover imagem.', 500, [$e->getMessage()]);
        }
    }
}
