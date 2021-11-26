<?php


namespace App\Http\Controllers\API;

class ResponseFormatter{

    protected static $response = [
        "meta" => [
            "code" => 200,
            "status" => "success",
            "message" => Null
        ],
        "data" => Null
    ];

    public static function success($data = Null, $message = Null)
    {
        self::$response["meta"]["message"] = $message;
        self::$response["data"] = $data;

        return response()->json(self::$response, self::$response["meta"]["code"]);
    }

    public function error($data = Null, $message = Null, $code = Null)
    {
        self::$response["meta"]["code"] = $code;
        self::$response["meta"]["status"] = "error";
        self::$response["meta"]["message"] = $message;
        self::$response["data"] = $data;

        return response()->json(self::$response, self::$response["meta"]["code"]);
    }
}