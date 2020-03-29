<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

class ResponseController extends Controller
{

    public static function message($message = null)
    {
        if (isset($message)) {
            return response()->json([
                'sucesso' => true,
                'mensagem' => $message
            ]);
        }
        throw new \Exception('mensagem não definida');
    }

    public static function created($data, $message = null)
    {
        $output = [];
        $output['sucesso'] = true;

        if ($message != null) {
            $output['mensagem'] = $message;
        }

        if ($data != []) {
            $output['data'] = $data;
        }

        return response()->json($output, 201);
    }

    public static function success($data, $message = null)
    {
        $output = [];
        $output['sucesso'] = true;

        if ($message != null) {
            $output['mensagem'] = $message;
        }

        if ($data != []) {
            $output['data'] = $data;
        }

        return response()->json($output, 200);
    }

    public static function fileDownload($pathToFile)
    {
        return response()->download($pathToFile);
    }

    public static function businessLogicError($data, $additionalInfo = null, $code = 200)
    {

        $responseData = [
            'sucesso' => false,
            'mensagem' => $data,
        ];

        if (isset($additionalInfo) and !config('app.isProduction')) {
            $responseData['info'] = $additionalInfo;
        }

        return response()->json($responseData, $code);
    }

    public static function badRequest($message = 'Requisição mal construida', $additionalInfo = null)
    {

        $requestData = [
            'sucesso' => false,
            'mensagem' => $message,
        ];

        if (!config('app.isProduction') and isset($additionalInfo)) {
            $requestData['info'] = $additionalInfo;
        }

        return response()->json($requestData, 400);
    }

    public static function unauthorized($additionalInfo = null)
    {

        $json = [
            'sucesso' => false,
            'mensagem' => 'Não autorizado',
        ];

        if (!config('app.isProduction') and isset($additionalInfo)) {
            $json['info'] = $additionalInfo;
        }

        return response()->json($json, 401);
    }

    public static function forbidden($additionalInfo = null)
    {

        $json = [
            'sucesso' => false,
            'mensagem' => 'Não autorizado',
        ];

        if (!config('app.isProduction') and isset($additionalInfo)) {
            $json['info'] = $additionalInfo;
        }

        return response()->json($json, 403);
    }

    public static function notFound($message = 'Recurso não encontrado', $additionalInfo = null)
    {

        $responseData = [
            'sucesso' => false,
            'mensagem' => $message,
        ];

        if (!config('app.isProduction') and isset($additionalInfo)) {
            $responseData['info'] = $additionalInfo;
        }

        return response()->json($responseData, 200);

    }

    public static function notAcceptable($message = 'Inaceitável', $additionalInfo = null)
    {
        $responseData = [
            'sucesso' => false,
            'mensagem' => $message,
        ];

        if (!config('app.isProduction') and isset($additionalInfo)) {
            $responseData['info'] = $additionalInfo;
        }

        return response()->json($responseData, 406);
    }

    public static function internalServerError($message = 'Erro desconhecido, favor contactar o suporte.')
    {

        /* @TODO: escrever inserção no LOG */
        return response()->json([
            'sucesso' => false,
            'mensagem' => $message,
        ], 500);
    }
}
