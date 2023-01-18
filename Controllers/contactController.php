<?php
require_once(ROOT_PATH .'Models/contactLogic.php');
class contactController
{
    public $name;
    public $kana;
    public $tel;
    public $email;
    public $body;

    public function __construct(){
        session_start();
    }

    public function contact(){
    //POSTされた情報が正しいかのチェックを行う
        $error = [];
        if(parse_url($_SERVER['HTTP_REFERER'])['path'] !== '/contactCheck.php'){
            $_SESSION = [];
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_SESSION = $_POST; 

            if ($_POST['name'] === '') {
                $error['name'] = 'blank';
            } else if (10 < mb_strlen($_POST['name'])) {
                $error['name']= 'name';
            }
            
            if ($_POST['kana'] === '') {
                $error['kana'] = 'blank';
            } else if (10 < mb_strlen($_POST['kana'])) {
                $error['kana']= 'kana';
            }
        
            if (!preg_match("/^(0{1}\d{9,10})$/",$_POST['tel']) && 0 < mb_strlen($_POST['tel'])) {
                $error['tel'] = 'tel';
            } 
        
            if ($_POST['email'] === '') {
                $error['email'] = 'blank';
            } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $error['email']= 'email';
            }
        
            if ($_POST['body'] === '') {
                $error['body'] = 'blank';
            } 

            if($error === []){
                header('Location: contactCheck.php');
                exit();
            }
        }
        return $error;
    }

    public function delete($id){
        $contactModel = new contactLogic();
        $contactModel -> deleteContact($id);
    }

    public function contactCheck(){
        if(empty($_SESSION)){
            header('Location: index.php');
            exit();
        }
    }

    public function contactEnd(){
        if(parse_url($_SERVER['HTTP_REFERER'])['path'] !== '/contactCheck.php'){
            header('Location: index.php');
            exit();
        }

        $name = $_SESSION['name'];
        $kana = $_SESSION['kana'];
        $tel = $_SESSION['tel'];
        $email = $_SESSION['email'];
        $body = $_SESSION['body'];

        $contactModel = new contactLogic();

        if(empty($_SESSION['editId'])){
            $contactModel -> addContact($name, $kana, $tel, $email, $body);
        }else if($_SESSION['editId']){
            $contactModel -> updateContact($_SESSION['editId'], $name, $kana, $tel, $email, $body);
        }
    }
}
?>