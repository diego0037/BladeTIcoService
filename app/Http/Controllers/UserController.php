<?php

namespace App\Http\Controllers;
//namespace ClientHTTP\Http\Controllers;
use App\User;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;
use DB;
use Mail;
use View;

class UserController extends ClientController
{


  protected $redirectTo = '/home';


    public function index()
    {
        $users = User::all();
        $response = [
            'users' => $users
        ];
        return response()->json($response,200);
    }


    protected function validatorSto(array $data)
{
    return Validator::make($data, [
        'name' => 'required|max:255',
        'last_name' => 'required|max:255',
        'phone' => 'required|max:20|min:6',
        'email' => 'required|email|max:255|unique:users',
        'password' => 'required|min:6|same:Confirm_password',
    ]);
}

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'last_name' => $data['last_name'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            // 'type' => 'user',
        ]);
    }

    public function store(Request $request)
    {
        $respuesta=$this->RegistrarUsuario($request);
        if($respuesta->codigo == 200)
        {
            flash('Usuario creado exitosamente! Verifique su bandeja de Correos','success');
            return view('auth.login');
        }
        $errors =$respuesta->errors;
        $error="";
        foreach ($errors as $valor) {
            $error .= $valor."\n";
        }
          flash($error ,'danger');
        return redirect('register');
        
     }

    public function login(Request $request)
    {
        $respuesta=$this->obtenerUsuarioLogin($request);
        if($respuesta->codigo == 200)
        {
           $request->session()->put('token', $respuesta->token);
            $request->session()->put('email', $request->email);
            //$valor =session('email');
            $var = $this->obtenerUsuario();
            if($var->user->type == 'admin'){
                $request->session()->put('role', $var->user->type);
            }
            return view('PaginasWeb/Busqueda');
        }else if($respuesta->codigo == 401){
            flash($respuesta->message ,'danger');
            return redirect('login');
        }
    }


    public function userActivation($token){
        $check = DB::table('user_activation')->where('token',$token)->first();
        if(!is_null($check)){

            $user = User::find($check->id_user);
            if ($user->is_activated ==1){
                // return response()->json(['error'=>array(['code'=>422,'message'=>'Su cuenta ya esta activada.No podemos activarla de nuevo'])],422);
                flash('Su cuenta ya esta activada.No podemos activarla de nuevo','warning');
                return view('PaginasWeb.login');

            }

            $user->is_activated =1;
            $user->save();
            // return response()->json(['code'=>'201','mensaje'=>'Su cuenta fue activa'],201);

            flash('Su cuenta fue activa!' ,'success');
            return view('PaginasWeb.login');
        }
        // return response()->json(['error'=>array(['code'=>422,'message'=>'Su codigo es invalido.'])],422);
        flash('Su codigo es invalido' ,'danger');
        return view('PaginasWeb.login');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update()
    { 
        $respuesta=$this->obtenerUsuario();
        if($respuesta->codigo ==200)
        {
            return view('PaginasWeb.actualizarPerfil')->with('user', $respuesta->user);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
//    public function show($id)
//    {
//        $user = User::find($id);
//        if(!$user){
//            // return response()->json(['message' => 'Usuario no existente'], 404);
//            flash('Usuario no existente' ,'danger');
//            return view('PaginasWeb.login');
//        }
//        return response()->json($user,200);
//    }
//    
     public function saveUpdate(Request $request)
    { 
         
         ///dd('jjj');
         //dd($request->name);
          $respuesta=$this->saveUpdateUser($request);
         
         if( $respuesta->codigo==200)
         {    
            
             flash($respuesta->message,'success');
             return view('PaginasWeb.actualizarPerfil')->with('user', $respuesta->user);
             //return redirect('updateProfile');
         }
            flash($respuesta->message ,'danger');
             return view('PaginasWeb.actualizarPerfil')->with('user', $respuesta->user);

    }
    
  
}
