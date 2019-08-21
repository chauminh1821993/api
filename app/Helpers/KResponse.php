<?php


namespace App\Helpers;

class KResponse
{
    /**
     *
     * @param array|object|string $result
     * @param string $status
     * @param int $statusCode
     * @param array $errors
     * @param array $headers
     * @return \Illuminate\Http\JsonResponse
     */
    public static function send($result = [], $status = ResCodes::STATUS_OK, $statusCode = ResCodes::OK, $errors = [], $headers = [])
    {
        $data = [];
        $data['status'] = $status;
        $data['results'] = [];
        if ($result) {
            $data['results'] = $result;
        }
        if ($errors) {
            $data['errors'] = $errors;
        }
        return response()->json(
            $data,
            $statusCode,
            $headers,
            JSON_UNESCAPED_UNICODE
        );
    }
}
