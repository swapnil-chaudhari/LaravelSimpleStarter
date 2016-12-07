<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ApiController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function make400Response($message = 'Invalid value given.')
    {
        return $this->makeResponse($message, 'error', 400);
    }

    protected function make401Response($message = 'Invalid value given.')
    {
        return $this->makeResponse($message, 'error', 401);
    }

    protected function make404Response($message = 'No records found.')
    {
        return $this->makeResponse($message, 'not_found', 404);
    }

    protected function make500Response($message = 'Something went wrong.')
    {
        return $this->makeResponse($message, 'error', 500);
    }

    protected function makeResponseWith($result = [], $message = 'Success', $status = 'success', $code = 200)
    {
        return array_merge($this->makeResponse($message, $status, $code), $result);
    }

    protected function makeResponse($message, $status = 'success', $code = 200)
    {
        return [
            'message' => $message,
            'status'  => $status,
            'code'    => $code,
        ];
    }
}