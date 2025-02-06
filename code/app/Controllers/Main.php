<?php namespace App\Controllers;

use App\Models\UsersModel;

class Main extends BaseController
{
    protected $session;
    protected $userModel;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->userModel = new UsersModel;
    }

    public function index()
    {
        return view('html/index');

        #---------------------------------------------------------------------------------------------------#

        // $user_id = 4;
        // $user_pass = 'johnny2007';

        // $db_pass = $this->userModel->select('password')->where('id', $user_id)->get()->getResultArray();
        
        // echo '<pre>';
        // print_r($db_pass[0]['password']);

        // if(password_verify($user_pass, $db_pass[0]['password']))
        // {
        //     echo '<br><br>correto';
        // }
        // else
        // {
        //     echo 'incorreto';
        // }

        #---------------------------------------------------------------------------------------------------#

        // $userInfo = [
        //     'email' => 'ana@gmail.com',
        //     'password' => password_hash('nini2003', PASSWORD_DEFAULT)
        // ];

        // $this->userModel->createUser($userInfo);

        #---------------------------------------------------------------------------------------------------#

        // $user_id = 4;
        // $this->userModel->delete($user_id);

        // echo '<pre>';
        // print_r($this->userModel->withDeleted()->findAll());
    }
}