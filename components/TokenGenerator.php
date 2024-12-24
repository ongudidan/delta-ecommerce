<?php

namespace app\components;

class TokenGenerator
{
    /**
     * Generate a Basic Auth Token
     *
     * @return string
     */
    public static function generateBasicAuthToken()
    {
        // Ensure API_USERNAME and API_PASSWORD are defined in your application parameters or constants
        $credentials = 'U0qaWjs2nGbR3gLfMNNK' . ':' . 'SO2NaCopeyALR6OHGTvBjgLTjzwpblnRJZsL81en';
        $encodedCredentials = base64_encode($credentials);
        return 'Basic ' . $encodedCredentials;
    }
}
