<?php
    class authMiddleware extends middleware {
        public function handle(){
            $response = new Response();
            if(!isset($_SESSION['acc'])){
                $response->redirect('');
            }
        }
    }
?>