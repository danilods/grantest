<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use InfyOm\Generator\Utils\ResponseUtil;
use Illuminate\Http\Response;

/**
 * @SWG\Swagger(
 *   basePath="/api/v1",
 *   @SWG\Info(
 *     title="Laravel Generator APIs",
 *     version="1.0.0",
 *   )
 * )
 * This class should be parent class for other API controllers
 * Class AppBaseController
 */
class AppBaseController extends Controller
{
    public function sendResponse($result, $message)
    {
        return Response::json_encode(ResponseUtil::makeResponse($message, $result));
    }

    public function sendError($error, $code = 404)
    {
        return Response::json_encode(ResponseUtil::makeError($error), $code);
    }

    public function sendSuccess($message)
    {
        return Response::json([
            'success' => true,
            'message' => $message
        ], 200);
    }
}
