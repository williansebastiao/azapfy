<?php

namespace App\Business\Enum;

use Symfony\Component\HttpFoundation\Response;

class StatusCode
{


    const SUCCESS = Response::HTTP_OK;
    const CREATED = Response::HTTP_CREATED;
    const BAD_REQUEST = Response::HTTP_BAD_REQUEST;
    const UNAUTHORIZED = Response::HTTP_UNAUTHORIZED;
    const UNPROCESSABLE_ENTITY = Response::HTTP_UNPROCESSABLE_ENTITY;
    const INTERNAL_SERVER_ERROR = Response::HTTP_INTERNAL_SERVER_ERROR;

}
