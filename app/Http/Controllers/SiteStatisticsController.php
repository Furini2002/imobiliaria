<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Http\Requests\StoreStatisticsRequest;
use App\Models\SiteStatistics;
use Exception;

class SiteStatisticsController extends Controller
{
    /**
     * Listar todas as estatísticas do site
     */
    public function index()
    {
        try {
            $statistics = SiteStatistics::all();
            return ApiResponse::success($statistics, 'Estatísticas listadas com sucesso.');
        } catch (Exception $e) {
            return ApiResponse::error('Erro ao listar estatísticas.', 500, [$e->getMessage()]);
        }

    }

    /**
     * Cadastrando nova estatística do site
     */
    public function store(StoreStatisticsRequest $request)
    {
        try {
            $statistic = SiteStatistics::create($request->validated());

            return ApiResponse::success($statistic, 'Estatística cadastrada com sucesso.', 201);

        } catch (Exception $e) {
            return ApiResponse::error('Erro ao cadastrar estatística.', 500, [$e->getMessage()]);
        }
    }


    /*
     * Mostra uma estatística específica
     */
    public function show(string $id)
    {
        try {
            $type = SiteStatistics::findOrFail($id);
            return ApiResponse::success($type, 'Estatística encontrada com sucesso.');
        } catch (Exception $e) {
            return ApiResponse::error('Estatística não encontrada.', 404, [$e->getMessage()]);
        }
    }

    /*
     * Deletando estatística
     */
    public function destroy(string $id)
    {
        try {
            $type = SiteStatistics::findOrFail($id);
            $type->delete();

            return ApiResponse::success([], 'Estatística removida com sucesso.');
        } catch (Exception $e) {
            return ApiResponse::error('Erro ao remover estatística.', 500, [$e->getMessage()]);
        }
    }
}
