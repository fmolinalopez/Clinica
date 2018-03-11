<?php

namespace App\Http\Controllers;

use App\Conversation;
use App\Message;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($userName)
    {
        $user = User::where('userName', $userName)->first();
        return view(
            'users.index', [
                'user' => $user,
            ]
        );
    }

    /**
     * Funcion que busca al medico con el id recibido y devuelve la vista conversations.index
     * con la informacion de dicho medico
     * @param $medico int Ide del medico a buscar
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function conversation($medico)
    {
        $medico = User::where('name', $medico)->first();

        return view('conversations.index', [
            'medico' => $medico
        ]);
    }

    public function showConversations()
    {
        $user = Auth::user();

        return view('conversations.showConversation', [
            'user' => $user,
        ]);
    }

    public function showMessages($conversationId){
        $esMedico = Auth::user()->esMedico;
        $conversation = Conversation::where('id', $conversationId)->first();
        $messages = $conversation->messages()->get();

        return view('conversations.messages', [
            'esMedico' => $esMedico,
            'conversation' => $conversation,
            'messages' => $messages,
        ]);
    }

    /**
     * Funcion que crea una conversacion entre el usuario logeado y el medico recibido.
     * @param $medico int Id del medico con el que se tiene la conversacion
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function crearConversation($medico, Request $request)
    {
        $medico = User::where('name', $medico)->first();
        $user = Auth::user();

        $message = $request->input('message');

        $conversation = Conversation::between($user, $medico);

        Message::create([
            'conversation_id' => $conversation->id,
            'user_id' => $user->id,
            'message' => $message
        ]);

        return redirect("/conversation/{$conversation->id}/messages");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
