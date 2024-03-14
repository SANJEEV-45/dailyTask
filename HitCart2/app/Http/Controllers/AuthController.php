<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Session;
use Symfony\Component\HttpFoundation\Session\Session as SessionSession;

class AuthController extends Controller
{ 

  protected $model;

  public function __construct(UserModel $model){
    $this->model = $model;
  }

   public function login(){
     return view("auth.login");
   }

   public function register(){
    return view("auth.register");
   }
 
   public function registration(Request $request)
   {
      $request->validate([
        'Email'=>'required | email| unique:user_models,Email',
       'Phone'=>'required | numeric',
        'City'=>'required',
        'gender'=>'required',
        'password'=>'required| min:8 |alpha_num'
      ]);
      $user=$request->except('_token');
      $result=$this->model->saveUser($user);

      if($result){
        $request->session()->put('user_info',$result);
        return redirect()->route('dashboard')->with('success','Login Successfull!.....HappY shopping');
      }
      else{
        return back()->withErrors('fail','registration failed');
      }
      
   }

   public function validation(Request $request){
    $request->validate([
      'username'=>'required | email',
      'password'=>'required'
     ]);
      $user = $request->except('_token');
      $email = $user['username'];
      $password = $user['password'];

      $result = $this->model->verifyUser($email);

      if(!$result){
        return back()->with('fail','Please register ur details first');
      }
      else{
          if(convert_uudecode($result['password']) == $password){
            $request->session()->put('user_info',$result);
            return redirect()->route('dashboard')->with('success','Happy Shopping');
        }
        else{
          return back()->with('fail','Incorrect password or Username');
        }
      }
   }
   
   public function logout(Request $request){
    if($request->session()->has('user_info')){
      $request->session()->forget('user_info');
      return redirect('/');
    }
  }
}
