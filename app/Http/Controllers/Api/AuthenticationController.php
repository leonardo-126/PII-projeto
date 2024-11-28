<?php
 
namespace App\Http\Controllers\Api;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
  
  
class AuthenticationController extends Controller
{
    public function register(Request $request)
    {
        $formData = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ];
  
        $formData['password'] = bcrypt($request->password);
  
        $user = User::create($formData);        
  
        return response()->json([ 
            'user' => $user, 
            'token' => $user->createToken('passportToken')->accessToken
        ], 200);
          
    }
  
    public function login(Request $request)  
    {  
        // Validação dos dados de entrada  
        $request->validate([  
            'email' => 'required|email',  
            'password' => 'required|string',  
        ]);  
    
        $credentials = $request->only('email', 'password');  
        //dd($credentials);
    

        // Tentar autenticar como usuário padrão  
        if (auth()->guard('web')->attempt($credentials)) {  
            $token = Auth::user()->createToken('passportToken')->accessToken;  
             
            return response()->json([  
                'user' => Auth::user(),   
                'token' => $token  
            ], 200);  
        }  
        
        // Tentar autenticar como organização  
   
    
        return response()->json([  
            'error' => 'Unauthorized'  
        ], 401);  
    }
    public function loginOrganizacao(Request $request)  
    {  
        // Validação dos dados...  
        $credentials = $request->only('email', 'password');  

        if (Auth::guard('organizacao')->attempt($credentials)) {  
            // Lógica similar para organizações  
            $organizacao = Auth::guard('organizacao')->user();  
            return redirect()->route('dashboard.organizacao');  
        }  

        return response()->json(['error' => 'Unauthorized'], 401);  
    }  
}