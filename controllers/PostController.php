<?php 
namespace Controllers;

use Core\Controller;
use Core\Helper;
use Models\PostModel;

class PostController extends Controller {

    public function addPost(){
        if(!isset($_SESSION['user'])){
           Helper::redirect('/login');
        }
    
        if(isset($_POST['legende']) && isset($_FILES['image'])) {
            
            $user_id = $_SESSION['user']['id'];
            $legende = $_POST['legende'];
            $image = $_FILES['image'];
        

            $upload = Helper::uploadFile($image, "post-img");
            
            if(is_array($upload)){
                $this->render('home', $upload );
            }else{
                $postModel = new PostModel();
                $res = $postModel->addPost($upload, $legende, $user_id);
        
                if ($res) {
                    Helper::redirect('/');
                }
            }
            $this->render('home');
        }
    }
}

