<?php

function errorResponse($message, $statusCode = 401)
{
    $statusCode = ($statusCode) ?: 401;

    return response()->json(['success' => false, 'message' => $message], $statusCode);
}

function successResponse($message = '', $data = '', $statusCode = 200)
{
    $response = ['success' => true];

    // if message given
    if (!empty($message)) {
        $response['message'] = $message;
    }

    // If data given
    if (!empty($data)) {
        $response['data'] = $data;
    }
    return response()->json($response, $statusCode);
}
