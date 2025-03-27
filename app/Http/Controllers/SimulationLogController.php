<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Models\SimulationLog;
use Exception;
use Illuminate\Http\Request;

class SimulationLogController extends Controller
{
    //listar todos os logs
    public function index()
    {
        try {
            $logs = SimulationLog::all();
            return ApiResponse::success($logs, 'Logs listados com sucesso.');
        } catch (Exception $e) {
            return ApiResponse::error('Erro ao listar Logs.', 500, [$e->getMessage()]);
        }

    }

    //cadastrar novo log
    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'name' => 'required|string',
                'email' => 'required|email',
                'property_value' => 'required|numeric'
            ]);

            $log = SimulationLog::create($data);
            return ApiResponse::success($log, 'Log cadastrado com sucesso.', 201);

        } catch (Exception $e) {
            return ApiResponse::error('Erro ao cadastrar log.', 500, [$e->getMessage()]);
        }
    }

    //mostrar um log específico
    public function show(string $id)
    {
        try {
            $log = SimulationLog::findOrFail($id);
            return ApiResponse::success($log, 'Log encontrado com sucesso.');
        } catch (Exception $e) {
            return ApiResponse::error('Log não encontrado.', 404, [$e->getMessage()]);
        }
    }

    //atualizando um log
    public function update(Request $request, string $id)
    {
        try {
            //something, só valida o campo caso ele estiver no request
            $data = $request->validate([
                'name' => 'sometimes|required|string',
                'email' => 'sometimes|required|email',
                'property_value' => 'sometimes|required|numeric',
            ]);

            $log = SimulationLog::findOrFail($id);
            $log->update($data);

            return ApiResponse::success($log, 'Log atualizado com sucesso.');

        } catch (Exception $e) {
            return ApiResponse::error('Erro ao atualizar log.', 500, [$e->getMessage()]);
        }
    }

    //deletando log
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
