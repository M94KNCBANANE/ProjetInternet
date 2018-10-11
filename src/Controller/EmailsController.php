<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Mailer\Email;
class EmailsController extends AppController{

    public function initialize()
    {
        parent::initialize();
    $this->Auth->allow(['index']);
    }   


    public function index(){
        $email = new Email('default');
        $emailaddress = $this->request->getQuery('email');
        $uuid = $this->request->getQuery('uuid');
        $confirmlink = "http://". $_SERVER['HTTP_HOST'].$this->request->webroot."Users/confirm?uuid=".$uuid;
        $email->to($emailaddress)->subject('Confirmation - TP1 Frederik Sylvain')->send(
            'Your confirmation link is: ' . $confirmlink);
    }
}
?>