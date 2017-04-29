<?php
namespace App\Http\Controllers;
use App\Service;
use JWTAuth;
use Illuminate\Http\Request;
class ServiceController extends ClientController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $respuesta = $this->obtenerServicios();
        if($respuesta->codigo == 200){
            return view('PaginasWeb.servicios')->with('services', $respuesta->services);
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $respuesta = $this->registrarServicioAdmin($request);
        if($respuesta->codigo == 200){
             flash($respuesta->message, 'success');
            return redirect('admin');
        }else{
            flash($respuesta->message, 'danger');
            return redirect('login');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $respuesta=$this->obtenerServicio($id);

        if($respuesta->codigo == 200)
        {
            return view('PaginasWeb/service', ['service' => $respuesta->service]);
        }
    }
    
     public function showByName(Request $request)
    {
        $respuesta=$this->obtenerServicioNombreAdmin($request->name);
         //dd($respuesta->service->id);
        if($respuesta->codigo == 200)
        {
            $request->session()->put('service', $respuesta->service->name);
            $request->session()->put('description', $respuesta->service->description);
            $request->session()->put('id', $respuesta->service->id);
            //dd(session('id'));
            return view('PaginasWeb.admin');
        }
         flash($respuesta->message ,'danger');
            return view('PaginasWeb.admin');
    }
    
     public function search(Request $request)
    {
        $respuesta=$this->obtenerServicioNombreAdmin($request->search);
        if($respuesta->codigo ==404)
        {
            flash($respuesta->message ,'danger');
            return view('PaginasWeb.busqueda');
        }
        $colls = $this->obtenerColaboradorBusq($respuesta->service->id);
        if($respuesta->codigo == 200)
        {
            return view('PaginasWeb.search')->with('colaboradores', $colls->colaboradores);
        }
            return view('PaginasWeb.search')->with('colaboradores', $colls->colaboradores);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $respuesta=$this->actualizarServicioAdmin($request);
         if($respuesta->codigo == 200)
         {
            $request->session()->put('service', $respuesta->service->name);
            $request->session()->put('description', $respuesta->service->description);
            $request->session()->put('id', $respuesta->service->id);
            flash($respuesta->message ,'success');
            return view('PaginasWeb.admin');
         }
         flash($respuesta->message ,'danger');
            return view('PaginasWeb.admin');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $respuesta=$this->eliminarServicioAdmin();
        if($respuesta->codigo == 200)
        {
             	
            $request->session()->forget('service');        	
            $request->session()->forget('description');
            $request->session()->forget('id');
            flash($respuesta->message ,'success');
            return view('PaginasWeb.admin');
        }
         flash($respuesta->message ,'danger');
            return view('PaginasWeb.admin');

    }
    
    public function serviceClient()
    {
        //$serv = new Service();
        $resp= array();
        $respuesta=$this->obtenerMiServicio();
        $var=$respuesta->collaborator;
        foreach($var as $valor)
        {
            $res=$this->obtenerServicio($valor->id_service);
            //dd($res);
            //$resp=$res->service->name);
            //$request->session()->push('user.teams', 'developers');
            $serv = new Service();
            $serv->name = $res->service->name;
            $serv->idCol = $valor->id;
            $serv->description = $var[0]->description;
            $serv->availability = $var[0]->availability;
            $resp[] = $serv;
        }
        return view('PaginasWeb.miServicio')->with('servicios', $resp);
        //var_dump($respuesta);
        //dd($var);


    }
}
