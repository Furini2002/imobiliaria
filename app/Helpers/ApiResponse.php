<?php

namespace App\Helpers;

    use Illuminate\Http\JsonResponse;

    class ApiResponse
    {
        public static function success($data = [], $message = 'Operação realizada com sucesso.', $code = 200): JsonResponse
        {
            return response()->json([
                'success' => true,
                'message' => $message,
                'data'    => $data
            ], $code);
        }

        public static function error($message = 'Ocorreu um erro.', $code = 400, $errors = []): JsonResponse
        {
            return response()->json([
                'success' => false,
                'message' => $message,
                'errors'  => $errors
            ], $code);
        }
    }

