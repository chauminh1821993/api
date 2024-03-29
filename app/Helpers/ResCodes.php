<?php


namespace App\Helpers;


class ResCodes
{
    // 1xx: Informational (Communicates transfer protocol-level information.)

    // 2xx: Success (Indicates that the client’s request was accepted successfully.)
    const OK = 200; // get data successfully
    const CREATED = 201; // created successfully
    const ACCEPTED = 202; // updated successfully
    const NO_CONTENT = 204;

    // 3xx: Redirection (Indicates that the client must take some additional action in order to complete their request.)

    // 4xx: Client Error (This category of error status codes points the finger at clients.)
    const BAD_REQUEST = 400; // wrong endpoint (url)
    const UNAUTHORIZED = 401; // authentication failed
    const PAYMENT_REQUIRED = 402; //payment Required
    const FORBIDDEN = 403;
    const NOT_FOUND = 404;
    const METHOD_NOT_ALLOWED = 405; // wrong http request method
    const REQUEST_TIME_OUT = 408;
    const PRECONDITION_FAILED = 412;
    const UNSUPPORTED_MEDIA_TYPE = 415;
    const UNPROCESSABLE_ENTITY = 422;
    const FAILED_DEPENDENCY = 424; //The request failed because it depended on another request and that request failed
    // 5xx: Server Error (The server takes responsibility for these error status codes.)
    const SERVER_ERROR = 500;

    //Platform API response codes
    const PLATFORM_OK = 100;

    //DEFINSE STATUS CODE
    const STATUS_OK ='OK';
    const STATUS_NOT_OK ='NG';

}
