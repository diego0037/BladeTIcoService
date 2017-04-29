<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
     protected function obtenerUsuarioLogin($request)
    {
    	$respuesta = $this->realizarPeticion('POST', "http://localhost/TicoServiceApi/public/api/user/login", 
                                             ['form_params' => $request->all()]);
    	$datos = json_decode($respuesta);
    	return $datos;
    }
    
    
    protected function RegistrarUsuario($request)
    {

    	$respuesta = $this->realizarPeticion('POST', "http://localhost/TicoServiceApi/public/api/user", 
                                             ['form_params' => $request->all()]);
    	$datos = json_decode($respuesta);
    	return $datos;
    }
    
    
    protected function obtenerColaboradores()
    {
    	$respuesta = $this->realizarPeticion('GET', "http://localhost/TicoServiceApi/public/api/collaborators");
    	$datos = json_decode($respuesta);
    	return $datos;
    }
    
    protected function obtenerColaborador($id)
    {
    	$respuesta = $this->realizarPeticion('GET', "http://localhost/TicoServiceApi/public/api/collaborator/{$id}");
    	$datos = json_decode($respuesta);
    	return $datos;
    }
    
        protected function obtenerColaboradorBusq($id)
    {
    	$respuesta = $this->realizarPeticion('GET', "http://localhost/TicoServiceApi/public/api/collaborators/search/{$id}");
    	$datos = json_decode($respuesta);
    	return $datos;
    }
    
    protected function obtenerServicios()
    {
    	$respuesta = $this->realizarPeticion('GET', "http://localhost/TicoServiceApi/public/api/services");
        $datos = json_decode($respuesta);
    	return $datos;
    }

    protected function obtenerServicio($id)
    {
    	$respuesta = $this->realizarPeticion('GET', "http://localhost/TicoServiceApi/public/api/service/{$id}");
    	$datos = json_decode($respuesta);
    	return $datos;
    }

    
    
     protected function agregrarServicioUsuario($id)
    {
        $accessToken =session('token');
        $respuesta = $this->realizarPeticion('GET',"http://localhost/TicoServiceApi/public/api/service/storeService/{$id}/{$accessToken}");

    	$datos = json_decode($respuesta);
    	return $datos;
    }
    
     protected function publicarComentario($request)
    {
        $accessToken = session('token');
        $respuesta = $this->realizarPeticion('POST', "http://localhost/TicoServiceApi/public/api/comment/{$accessToken}", 
                                             ['form_params' => $request->all()]);
        $datos = json_decode($respuesta);
        return $datos;
    }

    
         protected function registrarServicioAdmin($request)
    {
        $accessToken = session('token');
        $respuesta = $this->realizarPeticion('POST', "http://localhost/TicoServiceApi/public/api/service/{$accessToken}", 
                                             ['form_params' => $request->all()]);
        $datos = json_decode($respuesta);        
             return $datos;
    }
    
      protected function obtenerServicioNombreAdmin($name)
    {
        $respuesta = $this->realizarPeticion('GET', "http://localhost/TicoServiceApi/public/api/serviceName/{$name}");
        $datos = json_decode($respuesta);
          return $datos;
    }
    
      protected function actualizarServicioAdmin($request)
    {
        $id = session('id');
        $respuesta = $this->realizarPeticion('PATCH', "http://localhost/TicoServiceApi/public/api/service/{$id}",
                                            ['form_params' => $request->all()]);
        $datos = json_decode($respuesta);
        return $datos;
    }
        
        protected function eliminarServicioAdmin()
    {
        $id = session('id');
        $respuesta = $this->realizarPeticion('DELETE', "http://localhost/TicoServiceApi/public/api/serviceUpdate/{$id}");
        $datos = json_decode($respuesta);
        return $datos;
    }
    
       protected function obtenerUsuario()
    {
        $accessToken = session('token');
        $respuesta = $this->realizarPeticion('GET', "http://localhost/TicoServiceApi/public/api/getUser/{$accessToken}");
        $datos = json_decode($respuesta);
        return $datos;
    }
    
        protected function saveUpdateUser($request)
    {
        $accessToken = session('token');
        $respuesta = $this->realizarPeticion('PATCH', "http://localhost/TicoServiceApi/public/api/saveUpdate/{$accessToken}", 
                                             ['form_params' => $request->all()]);
        $datos = json_decode($respuesta);
        return $datos;
 
    }

        protected function obtenerMiServicio()
    {
        $accessToken = session('token');
        $respuesta = $this->realizarPeticion('GET', "http://localhost/TicoServiceApi/public/api/serviceClient/{$accessToken}");
        $datos = json_decode($respuesta);
        return $datos;
 
    }

     protected function eliminarColaborador($id)
    {
        $respuesta = $this->realizarPeticion('DELETE',"http://localhost/TicoServiceApi/public/api/collaborator/delete/{$id}");
        $datos = json_decode($respuesta);
         return $datos;
    }
    
}
