<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\User;
use Session;
use App\Util\FHousePost;


class MainController extends Controller
{
    protected $post;

    public function __construct(FhousePost $post)
    {
    	$this->post = $post;
    }

    function home()
    {
        return view('home');
    }

    function index()
    {
        return view('login');
    }

    function checklogin(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|alphaNum|min:6'
        ]);
        
        $login_status = $this->post->login($request->get('email'),$request->get('password'));
        
        if(isset($login_status->status) && $login_status->status == "APPROVED") {
            Session::put('tokenApi', $login_status->token);
            return $this->successlogin();
        } else {
            return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors([
                'error' => 'Wrong email or password.',
            ]);
        }

    }

    function successlogin()
    {
        return view('home');
    }

    function logout()
    {
        Session::forget('tokenApi');
        return redirect('main');
    }

}
