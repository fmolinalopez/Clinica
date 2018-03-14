<?php

namespace App\Http\Controllers;

use App\Conversation;
use App\Http\Requests\CreateUserAsyncRequest;
use App\Http\Requests\MessageRequest;
use App\Message;
use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use function MongoDB\BSON\toJSON;

class UsersController extends Controller
{
    private $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = auth()->user();

            return $next($request);
        });

        $this->user = auth()->user();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($userName)
    {
        $user = User::findUserByUserName($userName);
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
        $medico = User::findUserByName($medico);

        return view('conversations.index', [
            'medico' => $medico
        ]);
    }

    public function showConversations()
    {
        $user = $this->user;

        return view('conversations.showConversation', [
            'user' => $user,
        ]);
    }

    public function showMessages($conversationId)
    {
        $esMedico = $this->user->esMedico;
        $conversation = Conversation::findConversationById($conversationId);
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
    public function crearConversation($medico, MessageRequest $request)
    {
        $medico = User::findUserByName($medico);
        $user = $this->user;

        $message = $request->input('content');

        $conversation = Conversation::between($user, $medico);

        Message::create([
            'conversation_id' => $conversation->id,
            'user_id' => $user->id,
            'message' => $message
        ]);

        return redirect("/conversation/{$conversation->id}/messages");
    }

    public function validarRegistroAsync(CreateUserAsyncRequest $request)
    {
        return array();
    }

    public function validateMessage(Request $request)
    {
        $message = $request->input('content');
        if ($message == "") {
            $errors = [];
            $errors['content'] = 'Introduce un mensaje';

        }

        if (strlen($message) > 100) {
            $errors = [];
            $errors['content'] = "El mensaje no puede tener mas de 100 caracteres";
        }

        if (isset($errors)) {
            return $errors;
        }
        return array();
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
