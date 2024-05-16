<?php namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\UserModel;


class Ad extends BaseController
{



    public function index()
    {
        echo view('header');
        echo view('admin');
        echo view('footer');

    }
  

    public function login()
    {
        /*echo "edit";
         echo "method: " . $this->request->getMethod();
*/



        $model = new AdminModel();
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
                return redirect()->to(base_url() . '/newad');
            }
            //si llegamos a este segmento de código significa que el usuario no es valido.
            //guardamos un mensaje de error en la sesión
            session()->setFlashdata('login_error', 'Los datos ingresados no son correctos.');
        }
        //Si ninguna de las condiciones anteriores se cumple volvemos a la página de inicio
        return redirect()->to(base_url(). '/admin');
    }

    
    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url());
    }



    public function newad()
    {

        $model = new UserModel();
        $data['posts'] = $model->showuser();
        echo view('header');
        echo view('newad', $data);
        echo view('footer');

    }



    public function add()
    {
        

        $model = new UserModel();
        

        echo "method: " . $this->request->getMethod();

        
        echo "name: " . $this->validate(['name' => 'required']);
        echo "login: " .  $this->request->getPost('login');
        echo "password: " .  $this->request->getPost('password');



        if ($this->request->getMethod() === 'POST' && $this->validate(['name' => 'required']))
        

        {
            

            $newData = [
                
                'name' => $this->request->getPost('name'),
                'login' => $this->request->getPost('login'),
                'password' => $this->request->getPost('password')
            ];
              


            if ($model->save($newData)) {
                // La entrada se ha añadido correctamente
                return redirect()->to(base_url().'newad');
            } else {
                // Manejar el error
                // Por ejemplo, puedes mostrar un mensaje de error o registrar el problema en algún lugar
                echo "";
            }
        } else {
            echo "no es un usuario o no tiene contenido";
        }
    }




    public function delete($id)
    {
        $model= new UserModel();
        $newData=$model->where('id',$id)->first();
        $model->delete($id);
    
    
       
        
        $model->where('id',$id)->delete($id); 
    
        return redirect()->to(base_url().'/newad');
    }
    


    public function edituser($id)
    {
        $model = new UserModel();
    
        if ($this->request->getMethod() === 'POST' && $this->validate(['name' => 'required']))
        {
            // Obtén los datos del formulario
            $formData = [
                'id' => $this->request->getPost('id'),
                'name' => $this->request->getPost('name'),
                'login' => $this->request->getPost('login'),
                'password' => $this->request->getPost('password'),


               
            ];

            // Usa el método save() para actualizar o insertar los datos
            $model->save($formData);
    
            // Redirige al usuario a la lista de usuarios
            return redirect()->to(base_url() . '/newad');
        }
        else
        {
            // Si no es una solicitud POST, muestra el formulario de edición
            $data['post'] = $model->find($id);
    
            echo view('header');
            echo view('edituser', $data);
            echo view('footer');
        }
    }

}
