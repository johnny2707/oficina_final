<?php namespace App\Filters;

    use CodeIgniter\HTTP\RequestInterface;
    use CodeIgniter\HTTP\ResponseInterface;
    use CodeIgniter\Filters\FilterInterface;

    class PermissionsValidation implements FilterInterface 
    {
        public function before(RequestInterface $request, $arguments = null) 
        {
            $userPermissions = session()->get('permissions');

            if (isset($arguments)) 
            {
                // $flagPermissionsExists = array();

                foreach ($arguments as $arg) 
                {
                    if (in_array($arg, $userPermissions)) 
                    {
                        // array_push($flagPermissionsExists, TRUE);
                        return;
                    }
                }

                return redirect()->to(base_url());

                // if (!in_array(TRUE, $flagPermissionsExists)) 
                // {
                //     return redirect()->to(base_url());
                // }
            } 
            else 
            {
                return redirect()->to(base_url());
            }
        }

        //----------------------------------------------------------------------------------------------

        public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) 
        {
        
        }
    }
?>