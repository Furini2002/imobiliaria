<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Models\PropertyImage;
use Exception;
use Illuminate\Http\Request;

class PropertyImageController extends Controller
{
    //listando todas as imagens de um imóvel
    public function indexByProperty(string $propertyId)
    {
        try {
            $images = PropertyImage::where('property_id', $propertyId)->get();

            return ApiResponse::success($images, 'Imagens do imóvel listadas com sucesso.');
        } catch (Exception $e) {
            return ApiResponse::error('Erro ao buscar imagens do imóvel.', 500, [$e->getMessage()]);
        }
    }

    //cadastrar nova imagem
    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'image_path' => 'required|string',
                'property_id' => 'required|integer'
            ]);

            $propertyImages = PropertyImage::create($data);

            return ApiResponse::success($propertyImages, 'Imagem cadastrada com sucesso.', 201);

        } catch (Exception $e) {
            return ApiResponse::error('Erro ao cadastrar imagem.', 500, [$e->getMessage()]);
        }
    }

    //mostra uma imagem
    public function show(string $id)
    {
        try {
            $propertyImages = PropertyImage::findOrFail($id);
            return ApiResponse::success($propertyImages, 'Imagem encontrada com sucesso.');
        } catch (Exception $e) {
            return ApiResponse::error('Imagem não encontrada.', 404, [$e->getMessage()]);
        }
    }

    //atualizando uma imagem
    public function update(Request $request, string $id)
    {
        try {
            $data = $request->validate([
                'image_path' => 'required|string',
                'property_id' => 'required|integer'
            ]);

            $propertyImages = PropertyImage::findOrFail($id);
            $propertyImages->update($data);

            return ApiResponse::success($propertyImages, 'Imagem atualizada com sucesso.');

        } catch (Exception $e) {
            return ApiResponse::error('Erro ao atualizar imagem.', 500, [$e->getMessage()]);
        }
    }

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
