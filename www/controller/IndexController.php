<?php
require_once('AbstractBase.php');

class IndexController extends AbstractBase {


   public function login() {
        if($_POST){
            $b = Benutzer::getByNickNameAndPassword($_POST['nickname'], $_POST['password']);
            if(!$b)  {

            }else {
                $this->addContext("user", $b);
                $this->setTemplate("dashboard");
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

   public function mgruser() {

   }



}





?>