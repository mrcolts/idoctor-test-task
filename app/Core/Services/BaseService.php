<?php


namespace App\Core\Services;


use App\Core\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

class BaseService
{
    use ResponseTrait;

    final public function sendResponse(mixed $result, string $message): JsonResponse
    {
        return $this->success($result, $message);
    }

    final public function sentPaginatedResponse(mixed $resource,
                                                mixed $result,
                                                string $message): JsonResponse
    {
        $paginated = [
            'result' => $resource::collection($result),
            'pagination' => [
                'totalRows' => $result->total(),
                'perPage' => $result->perPage(),
                'currentPage' => $result->currentPage(),
                'totalPages' => $result->lastPage()
            ],
        ];

        $response = [
            'success' => true,
            'data' => $paginated,
            'message' => $message,
        ];
        return response()->json($response, 200);
    }

    final public function sendError(mixed $error, array $error_messages = [], int $code = 404): JsonResponse
    {
        return $this->error($error, $error_messages, $code);
    }
}
