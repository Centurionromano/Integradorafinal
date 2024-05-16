<?php

namespace App\Controllers;

use App\Models\UserModel;


class User extends BaseController
{


    public function login()
    {
        /*echo "edit";
         echo "method: " . $this->request->getMethod();
*/



        $model = new UserModel();
        //Verificamos el envío del formulario
        if ($this->request->getMethod() === 'POST' && $this->validate(['login' => 'required', 'password' => 'required'])) {
            //llamamos a la función login con los datos en una array
            $user = $model->login([
                'login' => $this->request->getPost('login'),
                'password' => ($this->request->getPost('password'))
            ]);
            if (isset($user)) {
                //si el usuario es válido guardamos los datos en la sesión y redireccionaremos
                session()->set(['user' => $user['id'], 'name' => $user['name']]);
                return redirect()->to(base_url() . '/publication');
            }
            //si llegamos a este segmento de código significa que el usuario no es valido.
            //guardamos un mensaje de error en la sesión
            session()->setFlashdata('login_error', 'Los datos ingresados no son correctos.');
        }
        //Si ninguna de las condiciones anteriores se cumple volvemos a la página de inicio
        return redirect()->to(base_url());
    }

    
    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url());
    }
}
