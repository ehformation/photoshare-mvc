<?php

namespace Core;

class Helper {
    public static function redirect($path) {
        $base_url = BASE_URL;
        $url = rtrim($base_url, '/') . '/' . ltrim($path, '/');

        header("Location: $url");
        exit();
    }

    public static function uploadFile($file, $destinationPath) {
        
        //Config image 
        $maxImageSize = 5 * 1024 * 1024; //5Mo
        $allowedImageTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/webp'];

        $imageName      = $file['name']; //yoyo.png
        $imageTmpPath   = $file['tmp_name']; //chemin tampon
        $imageSize      = $file['size']; //Taille de l'image
        $imageType      = mime_content_type($imageTmpPath); //Type de l'image

        if($imageSize > $maxImageSize){
            return ["error" => "L'image est trop lourde"];
        }
        if(!in_array($imageType, $allowedImageTypes)){
            return ["error" => "Le type de fichier n'est pas autorisé."];
        }

        $imageName = time() . '_' . basename($imageName);

        $destinationPath = __DIR__ . '/../public/' . $destinationPath . '/' . $imageName;
        
        var_dump($destinationPath);
        if (!move_uploaded_file($imageTmpPath, $destinationPath)) {
            return ["error" => "Erreur lors de l'envoi de l'image."];
        }

        return $imageName;
    }
}