<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Http\Requests\StoreSimulationLogRequest;
use App\Http\Requests\UpdateSimulationLogRequest;
use App\Models\SimulationLog;
use Exception;

class SimulationLogController extends Controller
{
    /*
     * Lista todos os logs
     */
    public function index()
    {
        try {
            $logs = SimulationLog::all();
            return ApiResponse::success($logs, 'Logs listados com sucesso.');
        } catch (Exception $e) {
            return ApiResponse::error('Erro ao listar Logs.', 500, [$e->getMessage()]);
        }

    }

    /*
     * Cadastra um novo log
     */
    public function store(StoreSimulationLogRequest $request)
    {
        try {
            $log = SimulationLog::create($request->validated());
            return ApiResponse::success($log, 'Log cadastrado com sucesso.', 201);

        } catch (Exception $e) {
            return ApiResponse::error('Erro ao cadastrar log.', 500, [$e->getMessage()]);
        }
    }

    /*
     * Mostra um log específico
     */
    public function show(string $id)
    {
        try {
            $log = SimulationLog::findOrFail($id);
            return ApiResponse::success($log, 'Log encontrado com sucesso.');
        } catch (Exception $e) {
            return ApiResponse::error('Log não encontrado.', 404, [$e->getMessage()]);
        }
    }

    /*
     * Atualiza um log
     */
    public function update(UpdateSimulationLogRequest $request, string $id)
    {
        try {
            $log = SimulationLog::findOrFail($id);
            $log->update($request->validated());

            return ApiResponse::success($log, 'Log atualizado com sucesso.');

        } catch (Exception $e) {
            return ApiResponse::error('Erro ao atualizar log.', 500, [$e->getMessage()]);
        }
    }

    /*
     * Deleta um log
     */
    public function destroy(string $id)
    {
        try {
            $log = SimulationLog::findOrFail($id);
            $log->delete();

            return ApiResponse::success([], 'Log removido com sucesso.');
        } catch (Exception $e) {
            return ApiResponse::error('Erro ao remover log.', 500, [$e->getMessage()]);
        }
    }
}
