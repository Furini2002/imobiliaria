<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Http\Requests\StatusRequest;
use App\Models\Status;
use Exception;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /*
     * Lista todos os status
     */
    public function index()
    {
        try {
            $statuses = Status::all();
            return ApiResponse::success($statuses, 'Status listados com sucesso.');
        } catch (Exception $e) {
            return ApiResponse::error('Erro ao listar status.', 500, [$e->getMessage()]);
        }

    }

    /*
     * Cadastra um novo status
     */
    public function store(StatusRequest $request)
    {
        try {
            $status = Status::create($request->validate());
            return ApiResponse::success($status, 'Status cadastrado com sucesso.', 201);

        } catch (Exception $e) {
            return ApiResponse::error('Erro ao cadastrar status.', 500, [$e->getMessage()]);
        }
    }

    /*
     * Mostra um status específico
     */
    public function show(string $id)
    {
        try {
            $status = Status::findOrFail($id);
            return ApiResponse::success($status, 'Status encontrado com sucesso.');
        } catch (Exception $e) {
            return ApiResponse::error('Status não encontrado.', 404, [$e->getMessage()]);
        }
    }

    /*
     * Atualiza um status
     */
    public function update(Request $request, string $id)
    {
        try {
            $status = Status::findOrFail($id);
            $status->update($request->validate());

            return ApiResponse::success($status, 'Status atualizado com sucesso.');

        } catch (Exception $e) {
            return ApiResponse::error('Erro ao atualizar status.', 500, [$e->getMessage()]);
        }
    }

    /*
     * Deleta um status
     */
    public function destroy(string $id)
    {
        try {
            $status = Status::findOrFail($id);
            $status->delete();

            return ApiResponse::success([], 'Status removido com sucesso.');
        } catch (Exception $e) {
            return ApiResponse::error('Erro ao remover status.', 500, [$e->getMessage()]);
        }
    }
}
