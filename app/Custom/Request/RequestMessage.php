<?php

namespace App\Custom\Request;

class RequestMessage
{
    const STATUS_SUCCESS = 'success';
    const STATUS_ERROR = 'error';
    const STATUS_WARNING = 'warning';
    const PATTERN_ERROR = 'Infelizmente não conseguimos completar sua requisição. Tente recarregar a página.';

    public static function response($data = null, $message = '', $status = self::STATUS_SUCCESS)
    {
        return response()->json(['status' => $status, 'message' => $message, 'response' => $data]);
    }

    public static function error($e)
    {
        return self::response($e, self::PATTERN_ERROR, self::STATUS_ERROR);
    }

    public static function success($data = null, $message = '')
    {
        return self::response($data, $message);
    }

    public static function warning($data = null, $message = '')
    {
        return self::response($data, $message, self::STATUS_WARNING);
    }
}