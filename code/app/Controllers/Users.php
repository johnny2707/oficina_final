<?php namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\ClientsModel;
use CodeIgniter\I18n\Time;

class Users extends BaseController 
{
    protected $session;
    protected $usersModel;
    protected $clientsModel;
    protected $res;
    protected $data;

    public function __construct() 
    {
        $this->session = \Config\Services::session();
        $this->usersModel = new UsersModel;
        $this->clientsModel = new ClientsModel;

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

    // public function index()
    // {
    //     $this->data['title'] = 'users';

    //     return view('html/users/index', $this->data);
    // }

    // public function createAccountPage()
    // {
    //     $this->data['title'] = 'user creation';

    //     return view('html/users/createAccount', $this->data);
    // }

    // public function create()
    // {
    //     $this->data['title'] = 'user creation';

    //     return view('html/users/create', $this->data);
    // }

    // public function index() {
    //     $this->data['title'] = "Utilizadores";
    //     $this->data['subMenu'] = 'USERS';

    //     return view('html/users/index', $this->data);
    // }

    // public function create() {
    //     $this->data['title'] = "Criação de utilizadores";

    //     $this->data['subMenu'] = 'USERS';
    //     $this->data['allRoles'] = $this->usersModel->getAllRoles();

    //     return view('html/users/create', $this->data);
    // }

    // public function update($id) {
    //     $this->data['title'] = "Edição de utilizadores";

    //     $this->data['subMenu'] = 'USERS';
    //     $this->data['userID'] = $id;
    //     $this->data['userData'] = $this->usersModel->getUserByID($id);
    //     $this->data['allRoles'] = $this->usersModel->getAllRoles();

    //     return view('html/users/update', $this->data);
    // }

    // public function myPassword() {
    //     $this->data['title'] = "Alterar password";
    //     $this->data['subMenu'] = 'MY-PASSWORD';

    //     return view('html/users/my-password', $this->data);
    // }

    // public function populateUsersTable() {
    //     // Get the DataTables draw value
    //     $draw = intval($this->request->getPost("draw"));
    
    //     // Fetch all users from the database
    //     $allUsers = $this->usersModel->getAllUsers();
    
    //     // Initialize an array to store the formatted user data
    //     $data = [];
    
    //     // Iterate through each user in the result set
    //     foreach ($allUsers->getResultArray() as $user) {
    //         // Prepare a row of user data
    //         $row = [];
    
    //         // Determine the action buttons based on the user's active status
    //         $actions = $user['active']
    //             ? "<a class='btn btn-danger btn-icon btn-sm inactivateUser' title='Inativar utilizador' data-id='{$user['id']}'><i class='ti ti-x'></i></a>"
    //             : "<a class='btn btn-success btn-icon btn-sm activateUser' title='Ativar utilizador' data-id='{$user['id']}'><i class='ti ti-check'></i></a>";
    
    //         // Add user details to the row
    //         $row[] = $user['name'];
    //         $row[] = $user['username'];
    //         $row[] = $user['email'];
    //         $row[] = $user['roleName'];
    
    //         // Add the active status icon
    //         $row[] = $user['active'] 
    //             ? '<i class="ti ti-check" style="color: green; font-size: large;"></i>' 
    //             : '<i class="ti ti-x" style="color: red; font-size: large;"></i>';
    
    //         // If the current session user ID is not the same as the user ID, add action buttons
    //         if (session()->get('id') != $user['id']) {
    //             $row[] = "
    //                 <a class='btn btn-icon btn-sm' title='Editar utilizador' href='" . base_url("users/{$user['id']}/update") . "'>
    //                     <i class='ti ti-pencil'></i>
    //                 </a>
    //                 {$actions}
    //             ";
    //         } else {
    //             // If the current session user ID matches the user ID, no action buttons are added
    //             $row[] = "";
    //         }
    
    //         // Add the row to the data array
    //         $data[] = $row;
    //     }
    
    //     // Prepare the final result array to be returned as JSON
    //     $result = [
    //         "draw" => $draw,
    //         "recordsTotal" => $allUsers->getNumRows(),
    //         "recordsFiltered" => $allUsers->getNumRows(),
    //         "data" => $data
    //     ];
    
    //     // Return the result as a JSON response
    //     return $this->response->setJSON($result);
    // }    

    // public function createNewUser() {

    //     // Define validation rules for the input fields
    //     $validationRules = array(
    //         'name'              => ['label' => 'Nome', 'rules' => 'required|max_length[255]'],
    //         'username'          => ['label' => 'Nome de utilizador', 'rules' => 'required|max_length[255]'],
    //         'email'             => ['label' => 'Email', 'rules' => 'required|valid_email|max_length[255]'],
    //         'role'              => ['label' => 'Grupo de permissões', 'rules' => 'required|max_length[255]'],
    //         'password'          => ['label' => 'Password', 'rules' => 'required|max_length[255]'],
    //         'confirmPassword'   => ['label' => 'Confirmar password', 'rules' => 'required|max_length[255]']
    //     );
    
    //     // Validate the input data against the defined rules
    //     if (!$this->validate($validationRules)) {
    //         // Validation failed, set the error flag
    //         $this->res['error'] = TRUE;
    
    //         // Get the validation service
    //         $validation = \Config\Services::validation();
    
    //         // Collect validation error messages
    //         foreach ($validationRules as $field => $rules) {
    //             if ($validation->getError($field)) {
    //                 array_push($this->res['popUpMessages'], "O campo <b>{$rules['label']}</b> tem erros!");
    //             }
    //         }
    //     } else {
    //         // Validation passed, process the form data
    //         helper('uuid');  // Load the UUID helper for generating a unique ID
    //         $formData = $this->request->getPost();  // Get the form data
    
    //         // Check if the username or email already exists in the database
    //         $userDataByUsername = $this->usersModel->getUserByUsername($formData['username']);
    //         $userDataByEmail = $this->usersModel->getUserByEmail($formData['email']);
    
    //         if ($userDataByUsername->getNumRows() === 0 && $userDataByEmail->getNumRows() === 0) {
    //             // If username and email do not exist, proceed
    
    //             if ($formData['password'] === $formData['confirmPassword']) {
    //                 // If passwords match, create the new user data array
    //                 $dataNewUser = array(
    //                     'id'        => generateUUID(),
    //                     'name'      => $formData['name'],
    //                     'username'  => $formData['username'],
    //                     'email'     => $formData['email'],
    //                     'password'  => password_hash($formData['password'], PASSWORD_DEFAULT),
    //                     'roleID'    => $formData['role'],
    //                     'active'    => TRUE
    //                 );
    
    //                 // Insert the new user into the database
    //                 $this->usersModel->createNewUser($dataNewUser);
    
    //                 // Add a success message
    //                 array_push($this->res['popUpMessages'], 'Utilizador criado com sucesso!');
    //             } else {
    //                 // If passwords do not match, set the error flag and message
    //                 $this->res['error'] = TRUE;
    //                 array_push($this->res['popUpMessages'], 'As passwords não coincidem!');
    //             }
    //         } else {
    //             // If username or email already exists, set the error flag and message
    //             $this->res['error'] = TRUE;
    //             array_push($this->res['popUpMessages'], 'O email ou o nome de utilizador já existe!');
    //         }
    //     }
    
    //     // Return the response as JSON
    //     return $this->response->setJSON($this->res);
    // }
    
    // public function updateUser($id) {
    //     // Define validation rules for the input fields
    //     $validationRules = array(
    //         'name'              => ['label' => 'Nome', 'rules' => 'required|max_length[255]'],
    //         'username'          => ['label' => 'Nome de utilizador', 'rules' => 'required|alpha|max_length[255]'],
    //         'email'             => ['label' => 'Email', 'rules' => 'required|valid_email|max_length[255]'],
    //         'role'              => ['label' => 'Grupo de permissões', 'rules' => 'required|max_length[255]']
    //     );
    
    //     // Validate the input data against the defined rules
    //     if (!$this->validate($validationRules)) {
    //         // Validation failed, set the error flag
    //         $this->res['error'] = TRUE;
    
    //         // Get the validation service
    //         $validation = \Config\Services::validation();
    
    //         // Collect validation error messages
    //         foreach ($validationRules as $field => $rules) {
    //             if ($validation->getError($field)) {
    //                 array_push($this->res['popUpMessages'], "O campo <b>{$rules['label']}</b> tem erros!");
    //             }
    //         }
    //     } else {
    //         // Ensure the user is not trying to update their own account
    //         if (session()->get('id') != $id) {
    
    //             // Get the form data
    //             $formData = $this->request->getPost();
    
    //             // Check if the new username or email already exists in the database
    //             $userDataByUsername = $this->usersModel->getUserByUsername($formData['username']);
    //             $userDataByEmail = $this->usersModel->getUserByEmail($formData['email']);
    
    //             // Extract the IDs of existing users with the same username or email
    //             $userDataByUsernameID = $userDataByUsername->getNumRows() > 0 ? $userDataByUsername->getResultArray()[0]['id'] : 0;
    //             $userDataByEmailID = $userDataByEmail->getNumRows() > 0 ? $userDataByEmail->getResultArray()[0]['id'] : 0;
    
    //             // Ensure that the username and email either don't exist or belong to the current user
    //             if (
    //                 ($userDataByUsername->getNumRows() === 0 || ($userDataByUsername->getNumRows() > 0 && $id == $userDataByUsernameID))
    //                 &&
    //                 ($userDataByEmail->getNumRows() === 0 || ($userDataByEmail->getNumRows() > 0 && $id == $userDataByEmailID))
    //             ) {
    //                 // Prepare the updated user data
    //                 $dataUpdateUser = array(
    //                     'name'      => $formData['name'],
    //                     'username'  => $formData['username'],
    //                     'email'     => $formData['email'],
    //                     'roleID'    => $formData['role']
    //                 );
    
    //                 // Update the user in the database
    //                 $this->usersModel->updateUser($id, $dataUpdateUser);
    
    //                 // Add a success message
    //                 array_push($this->res['popUpMessages'], 'Utilizador editado com sucesso!');
    //             } else {
    //                 // If the username or email is taken by another user, set the error flag and message
    //                 $this->res['error'] = TRUE;
    //                 array_push($this->res['popUpMessages'], 'O email ou o nome de utilizador já existe!');
    //             }
    //         } else {
    //             // If the user attempts to edit their own account, set the error flag and message
    //             $this->res['error'] = TRUE;
    //             array_push($this->res['popUpMessages'], 'Não pode editar o seu utilizador!');
    //         }
    //     }
    
    //     // Return the response as JSON
    //     return $this->response->setJSON($this->res);
    // }
    
    // public function activateUser($id) {
    //     // Check if the current session user ID is not the same as the provided user ID
    //     if (session()->get('id') != $id) {
    //         // Prepare the data to activate the user
    //         $userData = array(
    //             'active' => TRUE
    //         );
    
    //         // Update the user's status to active in the database
    //         $this->usersModel->updateUser($id, $userData);
            
    //         // Add a success message to the response
    //         array_push($this->res['popUpMessages'], 'Utilizador ativado com sucesso!');
    //     } else {
    //         // If the user tries to activate themselves, set an error flag and message
    //         $this->res['error'] = TRUE;
    //         array_push($this->res['popUpMessages'], 'Não pode editar o seu utilizador!');
    //     }
    
    //     // Return the response as JSON
    //     return $this->response->setJSON($this->res);
    // }    

    // public function inactivateUser($id) {
    //     // Check if the user is trying to inactivate their own account
    //     if (session()->get('id') != $id) {
    //         // If not, proceed to inactivate the user
    
    //         // Prepare the data to update the user's status to inactive
    //         $userData = array(
    //             'active' => FALSE
    //         );
    
    //         // Update the user's status in the database
    //         $this->usersModel->updateUser($id, $userData);
    
    //         // Add a success message to the response
    //         array_push($this->res['popUpMessages'], 'Utilizador inativado com sucesso!');
    //     } else {
    //         // If the user is trying to inactivate their own account, set an error
    //         $this->res['error'] = TRUE;
    //         array_push($this->res['popUpMessages'], 'Não pode editar o seu utilizador!');
    //     }
    
    //     // Return the response as JSON
    //     return $this->response->setJSON($this->res);
    // }    

    // public function updateMyPassword() {
    //     // Define validation rules for the input fields
    //     $validationRules = array(
    //         'oldPassword'           => ['label' => 'Password antiga', 'rules' => 'required|max_length[255]'],
    //         'newPassword'           => ['label' => 'Nova password', 'rules' => 'required|max_length[255]'],
    //         'confirmNewPassword'    => ['label' => 'Confirmar nova password', 'rules' => 'required|max_length[255]']
    //     );
    
    //     // Validate the input data against the defined rules
    //     if (!$this->validate($validationRules)) {
    //         // Validation failed, set the error flag
    //         $this->res['error'] = TRUE;
    
    //         // Get the validation service
    //         $validation = \Config\Services::validation();
    
    //         // Collect validation error messages
    //         foreach ($validationRules as $field => $rules) {
    //             if ($validation->getError($field)) {
    //                 array_push($this->res['popUpMessages'], "O campo <b>{$rules['label']}</b> tem erros!");
    //             }
    //         }
    //     } else {
    //         // Validation passed, process the form data
    //         $formData = $this->request->getPost();  // Get the form data
    
    //         // Fetch the user's current data by their session ID
    //         $userData = $this->usersModel->getUserByID(session()->get('id'))->getResultArray();
    
    //         // Verify if the old password matches the one in the database
    //         if (password_verify($formData['oldPassword'], $userData[0]['password'])) {
    
    //             // Check if the new password and confirmation password match
    //             if ($formData['newPassword'] === $formData['confirmNewPassword']) {
    //                 // If passwords match, create the update data array
    //                 $updateUser = array(
    //                     'password' => password_hash($formData['newPassword'], PASSWORD_DEFAULT),
    //                 );
    
    //                 // Update the user's password in the database
    //                 $this->usersModel->updateUser(session()->get('id'), $updateUser);
    
    //                 // Destroy the session to log out the user after password change
    //                 $this->session->destroy();
    
    //                 // Add a success message
    //                 array_push($this->res['popUpMessages'], 'Password alterada com sucesso!');
    //             } else {
    //                 // If new passwords do not match, set the error flag and message
    //                 $this->res['error'] = TRUE;
    //                 array_push($this->res['popUpMessages'], 'As passwords não coincidem!');
    //             }
    //         } else {
    //             // If old password does not match, set the error flag and message
    //             $this->res['error'] = TRUE;
    //             array_push($this->res['popUpMessages'], 'Verifique a password antiga!');
    //         }
    //     }
    
    //     // Return the response as JSON
    //     return $this->response->setJSON($this->res);
    // }
}
