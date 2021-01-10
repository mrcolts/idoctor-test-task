<?php


namespace App\Core\Traits;


use Illuminate\Http\JsonResponse;

trait ResponseTrait
{
    final public function success(mixed $result, string $message): JsonResponse
    {
        $response = [
            'success' => true,
            'data' => $result,
            'message' => $message,
        ];

        return response()->json($response, 200);
    }

    final public function error(mixed $error, array $error_messages = [], int $code = 404): JsonResponse
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];


        if (!empty($error_messages)) {
            $response['data'] = $error_messages;
        }

        return response()->json($response, $code);
    }
}
