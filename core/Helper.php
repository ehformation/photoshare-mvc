<?php

namespace Core;

class Helper {
    public static function redirect($path) {
        $base_url = BASE_URL;
        $url = rtrim($base_url, '/') . '/' . ltrim($path, '/');

        header("Location: $url");
        exit();
    }
}