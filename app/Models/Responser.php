<?php
/**
 * Created by PhpStorm.
 * User: Jeremiah
 * Date: 21/10/2019
 * Time: 01:39 PM
 */

namespace App\Models;

class Responser
{
    public static function error($code = 400, $message = null)
    {
        // check if $message is object and transforms it into an array
        if (is_object($message) && !is_null($message)) {
            $message = $message->toArray();
        }

        switch ($code) {
            case \Illuminate\Http\Response::HTTP_NOT_FOUND:
                $code_message = 'The requested resource was not found';
                break;
            default:
                $code_message = 'Error ocurred';
                break;
        }

        $data = array(
            'code' => $code,
            'message' => $code_message,
            'data' => $message
        );

        // return an error
        return response()->json($data)->setStatusCode($code);
    }

}