<?php
namespace App\Controllers;

use App\Models\PublicationModel;


class Publication extends BaseController
{
    public function index()
    {
        $model = new PublicationModel/*PostModel. esto es lo
        que viene en el pdf pero despues de poner este código
        de va a otra modificación en PublicationModel.php y más 
        porque no hay otra clase que se llame Post Model*/();
        $data['posts'] = $model->show();
        echo view('header');
        echo view('publication/all', $data);
        echo view('footer');
    }

   

    public function add()
    {
        

        $model = new PublicationModel();
        

        echo "method: " . $this->request->getMethod();
        echo "content: " . $this->validate(['content' => 'required']);
        echo "user: " .  $this->request->getPost('user');
        echo "nombre: " .  $this->request->getPost('nombre');
      



        if ($this->request->getMethod() === 'POST' && $this->validate(['content' => 'required']))
        

        {
            $validacion= $this->validate([
                'imagen'=>[
                    'uploaded[imagen]',
                    'mime_in[imagen,image/jpg,image/jpeg,image/png]',
                    'max_size[imagen,1024]',
                 ]
                ]);
                if(!$validacion){
                    $session= session();
                    $session->setFlashdata('mensaje','Revise la información');
                    return redirect()->back()->withInput();
                }
            
            if($imagen=$this->request->getFile('imagen')){
                $nuevoNombre=$imagen->getRandomName();
                $imagen->move('../public/uploads/', $nuevoNombre);

            $newData = [
                'content' => $this->request->getPost('content'),
                'user' => session()->get('user'), // Asegúrate de cambiar este valor al ID del usuario actual si es necesario
                'nombre' => $this->request->getPost('nombre'),
                'imagen' => $nuevoNombre
            ];
        }

            if ($model->save($newData)) {
                // La entrada se ha añadido correctamente
                return redirect()->to(base_url().'publication');
            } else {
                // Manejar el error
                // Por ejemplo, puedes mostrar un mensaje de error o registrar el problema en algún lugar
                echo "";
            }
        } else {
            echo "no es post o no tiene contenido";
        }
    }






    public function edit($id)
    {
        $model = new PublicationModel();
    
        if ($this->request->getMethod() === 'POST' && $this->validate(['content' => 'required']))
        {
            // Obtén los datos del formulario
            $formData = [
                'id' => $this->request->getPost('id'),
                'content' => $this->request->getPost('content'),
                'nombre' => $this->request->getPost('nombre'),
                // 'imagen' se manejará por separado
            ];
    
            // Manejo de la carga de la imagen
            $file = $this->request->getFile('imagen');
            if ($file && !$file->hasMoved()) {
                // Genera un nuevo nombre para el archivo y lo mueve al directorio de destino
                $newName = $file->getRandomName();
                $file->move('uploads', $newName);
    
                // Agrega el nombre del archivo al array de datos del formulario
                $formData['imagen'] = $newName;
            }
    
            // Usa el método save() para actualizar o insertar los datos
            $model->save($formData);
    
            // Redirige al usuario a la lista de publicaciones
            return redirect()->to(base_url() . '/publication');
        }
        else
        {
            // Si no es una solicitud POST, muestra el formulario de edición
            $data['post'] = $model->find($id);
    
            echo view('header');
            echo view('publication/edit', $data);
            echo view('footer');
        }
    }

    
    
public function delete($id)
{
    $model= new PublicationModel();
    $newData=$model->where('id',$id)->first();
    $model->delete($id);


    $ruta=('../public/uploads/'.$newData['imagen']);
    unlink($ruta);
    
    $model->where('id',$id)->delete($id); 

    return redirect()->to(base_url().'/publication');
}

}
