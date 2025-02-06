<?php namespace App\Controllers;

use App\Models\UsersModel;
use CodeIgniter\Debug\Toolbar\Collectors\Views;
use PhpOffice\PhpSpreadsheet\Calculation\Engineering\BitWise;
use PhpOffice\PhpSpreadsheet\Worksheet\Validations;
use PhpParser\Node\Expr\Empty_;

class Auth extends BaseController 
{   
    protected $session;
    protected $usersModel;
    protected $res;
    protected $data;
    protected $email;
    protected $validation;

    public function __construct() 
    {
        $this->session = \Config\Services::session();
        $this->usersModel = new UsersModel;
        $this->email = \Config\Services::email();
        $this->validation = \Config\Services::validation();
        
        $this->res = [
            'error' => FALSE,
            'popUpMessages' => array(),
            'staticMessages' => array()
        ];

        $this->data = [
            'customCSS'  => '',
            'customJS'   => '<script src="'.base_url('assets/js/custom/auth.js?' . $_ENV['VERSION'] ).'"></script>'
        ];
    }

    public function ShowLoginPage()
    {
        return view('html/auth/index', $this->data);
    }

    public function Login()
    {
        $validationRules = [
            'email' => [
                'label' => 'email',
                'rules' => 'required|max_length[255]|valid_email'
            ],
            'password' => [
                'label' => 'password',
                'rules' => 'required|max_length[20]|min_length[8]'
            ]
        ];

        if (!$this->validate($validationRules)) 
        {
            $this->res['error'] = true;

            foreach ($validationRules as $field => $rules)
            {
                if ($this->validation->getError($field)) 
                {
                    $this->res['popUpMessages'][] = "O campo <b>{$rules['label']}</b> tem erros!";
                }
            }
        }
        else 
        {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $userData = $this->usersModel->getUserDataByEmail($email);

            if (empty($userData)) 
            {
                $this->res['error'] = true;
                $this->res['popUpMessages'][] = 'Não existe nenhum utilizador com esse email!';
            } 
            else 
            {
                if (!password_verify($password, $userData[0]['user_password']) || $userData[0]['deleted_at']!=NULL) 
                {
                    $this->res['error'] = true;
                    $this->res['popUpMessages'][] = 'O utilizador e a password não coincidem ou o utilizador está inativo.';
                }
                else
                {
                    $this->session->set([
                        'id'          => $userData[0]['user_third_party_code'],
                        'name'        => $userData[0]['user_name'],
                        'group'       => $userData[0]['group_description'],
                        'permissions' => json_decode($userData[0]['group_permissions'], true),
                    ]);

                    $this->res['popUpMessages'][] = 'Login efetuado com sucesso!';
                }
            }
        }

        return $this->response->setJSON($this->res);
    }

    public function Logout()
    {
        $this->session->destroy();
        return redirect()->to(base_url('auth'));
    }

    public function ShowPasswordRecoveryPage()
    {
        return view('html/auth/recoverPassword', $this->data);
    }

    public function SendPasswordRecoveryEmail()
    {
        $userEmail = $this->request->getPost('email');

        $emailBody = view('html/auth/emailTemplate', ['email' => $userEmail]);

        $this->email->setMailType('html');

        $this->email->setFrom('joao.coutinho.soares.07@gmail.com', 'johnny');
        $this->email->setTo($userEmail);

        $this->email->setSubject('password change');
        
        $this->email->setMessage($emailBody);

        if($this->email->send())
        {
            $this->res['popUpMessages'][] = 'Email enviado com sucesso!';
        }
        
        return $this->response->setJSON($this->res);
    }

    public function ShowEmailSentConfirmationPage($email)
    {
        return view('html/auth/emailSentConfirmation', ['email' => $email]);
    } 

    public function ShowNewPasswordPage($email)
    {
        $this->data['email'] = $email;
        
        return view('html/auth/changePassword', $this->data);
    }

    public function UpdatePassword()
    {
        $password = $this->request->getPost('password');
        $email = $this->request->getPost('email');
        
        $validationRules = [
            'password' => [
                'label' => 'password',
                'rules' => 'required|max_length[20]|min_length[8]'
            ],
            'passwordConfirm' => [
                'label' => 'password confirm',
                'rules' => 'required|matches[password]'
            ]
        ];

        if(!$this->validate($validationRules))
        {
            $this->res['error'] = true;

            foreach ($validationRules as $field => $rules) {
                if ($this->validation->getError($field)) {
                    array_push($this->res['popUpMessages'], "The field <b>{$rules['label']}</b> has errors!");
                }
            }
        }
        else
        {
            $userData = $this->usersModel->getUserDataByEmail($email);

            $this->usersModel->updateUser($userData[0]['user_id'], ['user_password' => password_hash($password, PASSWORD_DEFAULT)]);

            $this->res['popUpMessages'][] = 'Password atualizada com sucesso!';
        }

        return $this->response->setJSON($this->res);
    }
}
