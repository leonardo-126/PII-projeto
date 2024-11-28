<?php
 
namespace App\Http\Controllers\Api;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use Laravel\Passport\HasApiTokens;
  
  
class AuthenticationController extends Controller
{
    public function register(Request $request)
    {
       // dd('aaaa');
        $formData = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'type'=> $request->type
        ];
      //  dd($formData);
  
        $formData['password'] = bcrypt($request->password);
  
       User::create($formData);        
  
        return redirect()->route('login');
    }

    
    public function login(Request $request)  
{  
   $credentials= $request->validate([
        'email' => 'required|email',
        'password' => 'required|string',
    ]);

    // Verifique as credenciais do usuário
    if(auth()->attempt($credentials))
        {
            if (auth()->user()->type == 'user') {
                return redirect()->route('dashboard.users');
            }else if (auth()->user()->type == 'org') {
                return redirect()->route('dashboard.organizacao');
            }else{
                return redirect()->route('home');
            }
        }else{
            return redirect()->route('login')
                ->with('error','Email-Address And Password Are Wrong.');
        }
    }

    // Autenticar o usuário e redirecionar

}




  
