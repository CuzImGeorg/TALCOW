<?php
require_once('AbstractBase.php');

class IndexController extends AbstractBase {


   public function login() {
        if($_POST){
            $user = Qser::getByNickNameAndPassword($_POST['nickname'], $_POST['password']);
            if(!$user)  {

            }else {
                if($user->isActive() && $user->getName() != "system") {
                    $this->addContext("user", $user);
                    $this->setTemplate("dashboardAktion");
                }

            }
        }
   }

   public function dashboard() {


   }

}





?>