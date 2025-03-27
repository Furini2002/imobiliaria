<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Models\Testimonial;
use Exception;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /*
     * Lista todos os depoimentos
     */
    public function index()
    {
        try {
            $testimonials = Testimonial::all();
            return ApiResponse::success($testimonials, 'Depoimentos listados com sucesso.');
        } catch (Exception $e) {
            return ApiResponse::error('Erro ao listar depoimentos.', 500, [$e->getMessage()]);
        }

    }

    /*
     * Cadastra um novo depoimento
     */
    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'name' => 'required|string',
                'city_id' => 'required|exists:cities,id',
                'text' => 'required|string',
                'photo' => 'required|string',
                'status' => 'required|string'
            ]);

            $testimonial = Testimonial::create($data);
            return ApiResponse::success($testimonial, 'Depoimento cadastrado com sucesso.', 201);

        } catch (Exception $e) {
            return ApiResponse::error('Erro ao cadastrar depoimento.', 500, [$e->getMessage()]);
        }
    }

    /*
     * Mostra um depoimento específico
     */
    public function show(string $id)
    {
        try {
            $testimonial = Testimonial::findOrFail($id);
            return ApiResponse::success($testimonial, 'Depoimento encontrado com sucesso.');
        } catch (Exception $e) {
            return ApiResponse::error('Depoimento não encontrado.', 404, [$e->getMessage()]);
        }
    }

    /*
     * Atualiza um depoimento
     */
    public function update(Request $request, string $id)
    {
        try {
            $data = $request->validate([
                'name' => 'sometimes|required|string',
                'city_id' => 'sometimes|required|exists:cities,id',
                'text' => 'sometimes|required|string',
                'photo' => 'sometimes|required|string',
                'status' => 'sometimes|required|string'
            ]);

            $testimonial = Testimonial::findOrFail($id);
            $testimonial->update($data);

            return ApiResponse::success($testimonial, 'Depoimento atualizado com sucesso.');

        } catch (Exception $e) {
            return ApiResponse::error('Erro ao atualizar depoimento.', 500, [$e->getMessage()]);
        }
    }

    /*
     * Deleta um depoimento
     */
    public function destroy(string $id)
    {
        try {
            $testimonial = Testimonial::findOrFail($id);
            $testimonial->delete();

            return ApiResponse::success([], 'Depoimento removido com sucesso.');
        } catch (Exception $e) {
            return ApiResponse::error('Erro ao remover depoimento.', 500, [$e->getMessage()]);
        }
    }
}
