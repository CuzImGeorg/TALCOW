<?php
require_once('AbstractBase.php');

class IndexController extends AbstractBase {


   public function login() {
        if($_POST){
            $user = Qser::getByNickNameAndPassword($_POST['nickname'], $_POST['password']);
            if(!$user)  {

            }else {
                $this->addContext("user", $user);
                $this->setTemplate("dashboardAktion");
            }
        }
        else{

        }

   }

   public function registry() {
        if($_POST) {
            if($_POST['password'] === $_POST['confpassword']){
                try {
                    $b = new Benutzer($_POST);
                    $b->speichere();
                } catch (PDOException $e) {
                    redirect("index.php?aktion=error&msg=ungültiger%20Nickname");
                }
                redirect("index.php?");
            }else {
                redirect("index.php?aktion=error&msg=Passwörter%20stimmen%20nicht%20überrein");
            }
        }
   }

   public function dashboard() {

   }





}





?>