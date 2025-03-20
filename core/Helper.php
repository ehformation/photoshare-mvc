<?php

namespace Core;
use DateTime;

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

    //2025-03-20 14:07:54 --> il y'a 5min 
    public static function calculaleLastUpdate($created) {

        date_default_timezone_set('Europe/Paris');

        $created = new Datetime($created);
        $now = new Datetime();
        $diff = $created->diff($now);

        switch(true) {
            case($diff->y > 0):
                return "Il y'a " . $diff->y . " an" . ($diff->y > 1 ? 's' : '');
            case($diff->m > 0):
                return "Il y'a " . $diff->m . " mois";
            case($diff->d > 0):
                return "Il y'a " . $diff->d . " jour" . ($diff->d > 1 ? 's' : '');
            case($diff->h > 0):
                return "Il y'a " . $diff->h . " heure" . ($diff->h > 1 ? 's' : '');
            case($diff->i > 0):
                return "Il y'a " . $diff->i . " minute" . ($diff->i > 1 ? 's' : '');
            default:
                return "A l'instant";
        }
    }
}