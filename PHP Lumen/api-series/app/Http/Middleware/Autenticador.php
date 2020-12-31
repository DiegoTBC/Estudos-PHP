<?php


namespace App\Http\Middleware;


use App\Models\User;
use Closure;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;

class Autenticador
{
    public function handle(Request $request, Closure $next)
    {
        try {
            if (!$request->hasHeader('Authorization')) {
                throw new \Exception();
            }

            $authorizationHeader = $request->header('Authorization');
            $token = str_replace('Bearer ', '', $authorizationHeader);

            $dadosAutenticacao = JWT::decode($token, env('JWT_KEY'), ['HS256']);

            //return new GenericUser(['email' => $dadosAutenticacao]);

            $user = User::where('email', $dadosAutenticacao->email)->first();

            if (is_null($user)) {
                throw new \Exception();
            }

            return $next($request);
        } catch (\Exception $error) {
            return response()->json('Nao autorizado', 401);
        }
    }
}
