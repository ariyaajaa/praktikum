<?php
if (!function_exists('MessageError')){
    function MessageError($messages){
        if(is_array($messages)){
            $responseError='';
            foreach ($messages as $key => $value) {
                $responseError=$key.":".$value[0].",";
            }
            return response()->json($responseError,422);
        }
        throw new Exception("Messages not array tyyped");
    }
}
