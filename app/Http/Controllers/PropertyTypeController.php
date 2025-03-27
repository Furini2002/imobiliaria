<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Models\PropertyType;
use Exception;
use Illuminate\Http\Request;

class PropertyTypeController extends Controller
{
    //listar todos os tipos
    public function index()
    {
        try {
            $types = PropertyType::all();
            return ApiResponse::success($types, 'Tipos listados com sucesso.');
        } catch (Exception $e) {
            return ApiResponse::error('Erro ao listar tipos.', 500, [$e->getMessage()]);
        }

    }

    //cadastrar novo tipo
    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'description' => 'required|string'
            ]);

            $type = PropertyType::create($data);
            return ApiResponse::success($type, 'Tipo cadastrado com sucesso.', 201);

        } catch (Exception $e) {
            return ApiResponse::error('Erro ao cadastrar tipo.', 500, [$e->getMessage()]);
        }
    }

    //mostrar um tipo específico
    public function show(string $id)
    {
        try {
            $type = PropertyType::findOrFail($id);
            return ApiResponse::success($type, 'Tipo encontrado com sucesso.');
        } catch (Exception $e) {
            return ApiResponse::error('Tipo não encontrado.', 404, [$e->getMessage()]);
        }
    }

    public function update(Request $request, string $id)
    {
        try {
            $data = $request->validate([
                'description' => 'required|string'
            ]);

            $type = PropertyType::findOrFail($id);
            $type->update($data);

            return ApiResponse::success($type, 'Tipo atualizado com sucesso.');

        } catch (Exception $e) {
            return ApiResponse::error('Erro ao atualizar tipo.', 500, [$e->getMessage()]);
        }
    }

    //deletando tipo
    public function destroy(string $id)
    {
        try {
            $type = PropertyType::findOrFail($id);
            $type->delete();

            return ApiResponse::success([], 'Tipo removido com sucesso.');
        } catch (Exception $e) {
            return ApiResponse::error('Erro ao remover tipo.', 500, [$e->getMessage()]);
        }
    }
}
