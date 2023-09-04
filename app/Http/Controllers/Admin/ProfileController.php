<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\ViaCep\ViaCepService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Brian2694\Toastr\Facades\Toastr as Toast;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();

        return view('dashboard.profile', [
            'user' => $user
        ]);
    }

    public function update(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $pathFoto = '';

        try {
            if ($request->hasFile('foto')) {
                $foto = $request->file('foto');
    
                if (!$foto->isValid() && in_array($foto->getClientOriginalExtension(), ['jpeg', 'jpg', 'png'])) {
                    Toast::error('Não é uma imagem válida!', '', ["positionClass" => "toast-top-center"]);
                    return redirect()->back();
                }
    
                if($pathFoto = $foto->store('fotos')) {
                    if ($user->foto) {
                        Storage::delete($user->foto);
                    }

                    $user->foto = $pathFoto;
                }

            }
    
            if(!$user->update([
                'email' => $request->email,
                'cep' => $request->cep,
                'logradouro' => $request->logradouro,
                'complemento' => $request->complemento,
                'bairro' => $request->bairro,
                'cidade' => $request->cidade,
                'uf' => $request->uf
            ]))
            {
                Toast::error('Erro ao atualizar!', '', ["positionClass" => "toast-top-center"]);
                return redirect()->back();
            }

            Toast::success('Atualizado com sucesso!', '', ["positionClass" => "toast-top-center"]);

            return redirect()->route('profile');
        } catch (\Throwable $th) {

            // Caso aconteça algum erro na atualização, removo a foto carregada!
            if ($pathFoto) {
                Storage::delete($pathFoto);
            }

            Toast::error('Erro ao atualizar!');        }
    }

    function getCep(Request $request)
    {
        $cep = $request->cep;

        $response  = (new ViaCepService())->getCep($cep);
        return $response;
    }

}
