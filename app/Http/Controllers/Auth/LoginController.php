<?php

namespace App\Http\Controllers\Auth;

use App\Custom\Request\RequestMessage;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Validator;
use Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function index(Request $request)
    {
        if ($request->isMethod('POST')) {
            $all = $request->all();

            $validate = Validator::make($all, [
                'email' => 'required',
                'password' => 'required',
            ]);

            if ($validate->fails()) {
                return RequestMessage::warning($validate->errors());
            }

            $userRep = new UserRepository();
            $user = $userRep->getUserByEmail($all['email']);

            if (empty($user)) {
                return RequestMessage::warning(['email' => 'Não localizamos nenhum usuário com este e-mail.']);
            }

            if (empty($user->password)) {
                session(['email' => $user->email]);
                return RequestMessage::success(['route' => route('login_create_pass')]);
            }

            if (Hash::check($all['password'], $user->password)) {
                $this->guard()->login($user);
            }

            return RequestMessage::success(['route' => route('dashboard_index')]);
        }

        return view('auth.login');
    }
}
