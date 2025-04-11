<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Http\Requests\TypeRequest;
use App\Models\PropertyType;
use Exception;

class PropertyTypeController extends Controller
{
    /*
     * Lista todos os tipos
     */
    public function index()
    {
        try {
            $types = PropertyType::all();
            return ApiResponse::success($types, 'Tipos listados com sucesso.');
        } catch (Exception $e) {
            return ApiResponse::error('Erro ao listar tipos.', 500, [$e->getMessage()]);
        }

    }

    /*
     * Cadastra um novo tipo
     */
    public function store(TypeRequest $request)
    {
        try {
            $type = PropertyType::create($request->validated());
            return ApiResponse::success($type, 'Tipo cadastrado com sucesso.', 201);

        } catch (Exception $e) {
            return ApiResponse::error('Erro ao cadastrar tipo.', 500, [$e->getMessage()]);
        }
    }

    /*
     * Mostra um tipo específico
     */
    public function show(string $id)
    {
        try {
            $type = PropertyType::findOrFail($id);
            return ApiResponse::success($type, 'Tipo encontrado com sucesso.');
        } catch (Exception $e) {
            return ApiResponse::error('Tipo não encontrado.', 404, [$e->getMessage()]);
        }
    }

    /*
     * Atualiza um tipo
     */
    public function update(TypeRequest $request, string $id)
    {
        try {
            $type = PropertyType::findOrFail($id);
            $type->update($request->validated());

            return ApiResponse::success($type, 'Tipo atualizado com sucesso.');

        } catch (Exception $e) {
            return ApiResponse::error('Erro ao atualizar tipo.', 500, [$e->getMessage()]);
        }
    }

    /*
     * Deleta um tipo
     */
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
