<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Http\Requests\StoreTestimonialRequest;
use App\Http\Requests\UpdateTestimonialRequest;
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
    public function store(StoreTestimonialRequest $request)
    {
        try {
            $testimonial = Testimonial::create($request->validated());
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
    public function update(UpdateTestimonialRequest $request, string $id)
    {
        try {
            $testimonial = Testimonial::findOrFail($id);
            $testimonial->update($request->validated());

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
