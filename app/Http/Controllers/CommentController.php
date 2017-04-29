<?php

namespace App\Http\Controllers;

use App\Comment;
use App\User;
use App\Collaborator;
use Illuminate\Http\Request;
use JWTAuth;
use DB;

class CommentController extends ClientController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::all();
        $response = [
            'comments' => $comments
        ];
        return response()->json($response,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(session('token')){
            $respuesta = $this->publicarComentario($request);
            if($respuesta->codigo == 201){
                return redirect()->action('CollaboratorController@show', ['id' => $request->coll_id]);
            }
        }else{
             flash('Debe iniciar sesión para realizar comentarios' ,'danger');
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
        $comment = Comment::find($id);
        if(!$comment){
            return response()->json(['message' => 'Comentario no existente'], 404);
        }
        return response()->json($comment,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = JWTAuth::parseToken()->toUser();
        $comment = Comment::where('id_user_comm', $user->id)->first();
        if(!$comment->id_user_comm)
        {
            return response()->json(['message' => 'Comentario no existente'], 404);
        }

        $this->validate($request, [
            'comment' => 'required',
        ]);

        $comment->comment = $request['comment'];
        $comment->save();
        return response()->json(['comment' => $comment], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return response()->json(['message' => 'Comentario eliminado']);
    }
}
