<?php
namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ResponseForm
{
    private $_success = "success";
    private $_failed = "fail";

    /**
     * @param $msg
     * @param $statusCode
     * @return JsonResponse
     */
    public function returnError($msg, $statusCode): JsonResponse
    {
        return response()->json([
            "status" => $this->_failed,
            "msg" => $msg
        ], $statusCode);
    }

    /**
     * @param $msg
     * @param int $statusCode
     * @return JsonResponse
     */
    public function returnSuccessMessage($msg, int $statusCode = 200): JsonResponse
    {
        return response()->json([
            "status" => $this->_success,
            "msg" => $msg
        ], $statusCode);
    }

    /**
     * @param $key
     * @param $data
     * @param string $msg
     * @param int $statusCode
     * @return JsonResponse
     */
    public function returnData($key, $data, string $msg = "", int $statusCode = 200): JsonResponse
    {
        return response()->json([
            "status" => $this->_success,
            "msg" => $msg,
            $key => $data,
        ], $statusCode);
    }

    public function returnValidationError($validator): JsonResponse
    {
        return $this->returnError($validator->errors()->first(), 400);
    }

}