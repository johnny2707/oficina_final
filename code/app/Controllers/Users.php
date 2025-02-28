<?php namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\ClientsModel;
use App\Models\LogsModel;
use CodeIgniter\I18n\Time;

class Users extends BaseController 
{
    protected $session;
    protected $usersModel;
    protected $clientsModel;
    protected $res;
    protected $logsModel;
    protected $data;

    public function __construct() 
    {
        $this->session = \Config\Services::session();
        $this->usersModel = new UsersModel;
        $this->clientsModel = new ClientsModel;
        $this->logsModel = new LogsModel;

        helper('uuid');
        
        $this->res = array(
            'error' => FALSE,
            'popUpMessages' => array(),
            'staticMessages' => array()
        );

        $this->data = [
            'customCSS'     => '',
            'customJS'      => '<script src="'. base_url('assets/js/custom/users.js?' . $_ENV['VERSION'] ).'"></script>'
        ];
    }

    public function index() 
    {
        $this->data['title'] = 'My Account';
        $this->data['menu'] = 'ACCOUNT';
        $this->data['userInfo'] = $this->usersModel->getUserDataById($this->session->get('id'));

        return view('html/account/index', $this->data);
    }

    public function createAccountPage($USER_TOKEN) 
    {
        $this->data['title'] = 'user creation';
        $this->data['token'] = $USER_TOKEN;

        return view('html/users/createAccount', $this->data);
    }

    public function createAccount()
    {
        $USER_TOKEN = $this->request->getPost('token');
        $password = $this->request->getPost('password');
        $passwordConfirmation = $this->request->getPost('passwordConfirmation');

        $tokenInfo = $this->usersModel->getTokenInfo($USER_TOKEN);

        if(date('Y-m-d H:i:s') < $tokenInfo[0]['token_expire_date'])
        {
            if($password === $passwordConfirmation)
            {
                $userID = generateUUID();
                $clientInfo = $this->clientsModel->getClientInfoByCode($tokenInfo[0]['token_third_party_id']);

                $userData = array(
                    'user_id'                => $userID,
                    'user_third_party_code'  => $tokenInfo[0]['token_third_party_id'],
                    'user_name'              => $clientInfo[0]['client_name'],
                    'user_email'             => $clientInfo[0]['contact_email'],
                    'user_password'          => password_hash($password, PASSWORD_DEFAULT),
                    'user_group_id'          => 2,
                );

                if($this->usersModel->createUser($userData))
                {
                    $this->logsModel->log([
                        'log_third_party_id' => $this->session->get('id'),
                        'log_type' => 'create_account',
                        'log_description' => 'Account created with id: ' . $userID,
                        'log_date' => date('Y-m-d H:i:s')
                    ]);

                    array_push($this->res['popUpMessages'], 'Utilizador criado com sucesso!');
                }
                else
                {
                    $this->res['error'] = true;
                    array_push($this->res['popUpMessages'], 'Erro ao criar utilizador!');
                }
            }
            else
            {
                $this->res['error'] = true;
                array_push($this->res['popUpMessages'], 'As passwords não coincidem!');
            }
        }
        else
        {
            $this->res['popUpMessages'][] = date('Y-m-d H:i:s');
            $this->res['error'] = true;
            $this->res['popUpMessages'][] = 'O token expirou!';
        }

        return $this->response->setJSON($this->res);
    }

    public function changeEmail()
    {
        $email = $this->request->getPost('NewEmail');

        $oldEmail = $this->usersModel->getUserEmail($this->session->get('id'));

        if($email == "")
        {
            $this->res['error'] = true;
            $this->res['popUpMessages'][] = 'O email não pode ser vazio!';
        }
        else if($email === $oldEmail)
        {
            $this->res['error'] = true;
            $this->res['popUpMessages'][] = 'O email é igual ao atual!';
        }
        else
        {
            $this->usersModel->updateUser($this->session->get('id'), ['user_email' => $email]);
            $this->res['popUpMessages'][] = 'Email alterado com sucesso!';
        }

        return $this->response->setJSON($this->res);
    }

    public function changeUsername()
    {
        $username = $this->request->getPost('NewUsername');

        $oldUsername = $this->usersModel->getUserUsername($this->session->get('id'));

        if($username == "")
        {
            $this->res['error'] = true;
            $this->res['popUpMessages'][] = 'O username não pode ser vazio!';
        }
        else if($username === $oldUsername)
        {
            $this->res['error'] = true;
            $this->res['popUpMessages'][] = 'O username é igual ao atual!';
        }
        else
        {
            $this->usersModel->updateUser($this->session->get('id'), ['user_name' => $username]);
            $this->res['popUpMessages'][] = 'Username alterado com sucesso!';

            $this->session->set('name', $username);
        }

        return $this->response->setJSON($this->res);
    }
}
