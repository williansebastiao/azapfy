<?php

namespace App\Helpers;

use App\Business\Enum\StatusCode;
use Illuminate\Http\JsonResponse;

class Response
{

    static function output(int $statusCode, string $message, array|object $data = []): JsonResponse
    {
        $code = $statusCode === 0 ? StatusCode::UNPROCESSABLE_ENTITY : $statusCode;
        return response()->json([
            'status_code' => $code,
            'message' => $message,
            'body' => $data
        ], $code);
    }

}
