<?php

namespace App\Http\Controllers;

use App\loginAttempt;
use App\panelCredential;
use App\User;
use App\userStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class Auth_Controller extends Controller
{
    private $array = array();
    /**
     * Create User
     *
     * @param $username
     * @param $password
     *
     *
     */
    public function createUser($username, $password){
        $user = User::create(['username'=>$username,'password'=>bcrypt($password)]);
        userStatus::create(['user_id'=>$user->id, 'status'=>1]);
        $panel = panelCredential::create(['panelKey'=>str_random(8),'cryptKey'=>str_random(8),'user_id'=>$user->id]);
        return $panel;
    }

    /**
     * Get the submit form, validate it, check it, and redirect to /Home page
     *
     * @var Request
     * @param $request
     */
    public function login(Request $request){

        $attemptData = ['ip'=>$request->ip(),'username'=>$request['username'], 'password'=>$request['password']];

        $validator = Validator::make($request->all(),[
            'username' => 'required',
            'password' => 'required'
        ]);

        //Todo -> check if the log_ins closed
        if($this->login_state()){
            if(!$validator->fails()){

                $attempt = Auth::attempt(['username'=>$request['username'], 'password'=>$request['password']]);

            if($attempt){

                //Check if user is banned
                if($this->userStatusCheck(Auth::user()->id) === 0){
                    $this->array[0] = 'You are Banned!!!';
                    Auth::logout();
                    return Redirect::to('/')->withErrors($this->array);
                }

                $this->login_Attempt($attemptData,true);
                return Redirect::to('home');
            }

            $this->login_Attempt($attemptData,false);
        }
            $this->array[0] = 'Wrong username/password combination.';
        }else{
            $this->array[0] = 'Hummm i don´t think it is normal';
        }

        return Redirect::to('/')->withErrors($this->array);
    }

    /**
     * Check User Status
     * @param $id
     * @return boolean
     */
    public static function userStatusCheck($id){

        $user = User::where('id', $id)->first();

        if($user !== null){
            $status = $user->status()->first()->status;
            if($status === 1){
                return 1;
            }
        }

        return 0;
    }

    /**
     * Logout the user
     *
     */

    public function logout(){
        Auth::logout();
        return Redirect::to('/');
    }


    /**
     * Verify the log_ins attempts to prevent brute force
     *
     *
     * @return boolean
     */

    private function login_state(){

        $uneMinuteAgo = Carbon::now()->subMinutes(3);

        $state = loginAttempt::where('attempt', false)->where('created_at', '>=',$uneMinuteAgo)->get()->count();

        return !($state >= 3);
    }

    /**
     * Create an register to track login attempts
     *
     * @param $array,
     * @param $boolean
     *
     */

    private function login_Attempt($array, $boolean){
        $data = ['ip'=>$array['ip'], 'username'=>$array['username'], 'password'=>$array['password'], 'attempt'=>$boolean];
        loginAttempt::create($data);
    }

}
