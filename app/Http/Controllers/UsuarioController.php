<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class UsuarioController extends Controller
{
    public function exibirPaginaImportacao()
    {
        return view('usuarios.importar');
    }

    public function importarUsuarios()
    {
        try {
            $response = Http::get('https://dummyjson.com/users', ['limit' => 50]);
          
            if ($response->successful()) {
                $usuarios = $response->json('users');

                foreach ($usuarios as $usuario) {                    
                    if (!isset($usuario['email'], $usuario['firstName'], $usuario['lastName'], $usuario['address']['city'], $usuario['address']['state'], $usuario['image'], $usuario['username'], $usuario['password'])) {
                        Log::warning('Dados do usuário faltando', $usuario);
                        continue; 
                    }

                    Usuario::updateOrCreate(
                        ['email' => $usuario['email']], 
                        [
                            'primeiro_nome' => $usuario['firstName'],
                            'ultimo_nome' => $usuario['lastName'],
                            'email' => $usuario['email'],
                            'cidade' => $usuario['address']['city'],
                            'estado' => $usuario['address']['state'],
                            'imagem' => $usuario['image'],
                            'usuario' => $usuario['username'],
                            'senha' => $usuario['password']
                        ]
                    );
                }

                return redirect()->route('usuarios.importado');
            } else {
                Log::error('Falha na requisição HTTP', ['status' => $response->status(), 'response' => $response->body()]);
                return redirect()->route('usuarios.error', ['code' => $response->status(), 'message' => 'Erro ao importar usuários.']);
            }
        } catch (\Exception $e) {
            Log::error('Erro na importação de usuários', ['exception' => $e->getMessage()]);
            return redirect()->route('usuarios.error', ['code' => 500, 'message' => 'Erro ao importar usuários: ' . $e->getMessage()]);
        }
    }

    public function exibirPaginaImportado()
    {
        return view('usuarios.importado');
    }

    public function exibirListaUsuarios()
    {
        $usuarios = Usuario::all()->groupBy('estado')->map(function ($estado) {
            return $estado->sortBy('primeiro_nome');
        });

        return view('usuarios.index', ['usuariosPorEstado' => $usuarios]);
    }

    public function exibirPaginaErro(Request $request)
    {
        $message = $request->query('message', 'Ocorreu um erro desconhecido.');
        $code = $request->query('code', 'Código não especificado');
        return view('usuarios.error', ['message' => $message, 'code' => $code]);
    }
}
