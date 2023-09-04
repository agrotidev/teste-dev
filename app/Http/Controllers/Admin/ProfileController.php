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
                    dd('Não é uma imagem válida');
                }
    
                $pathFoto = $request->foto->store('fotos');
            }
        
            if(!$user->update($request->all()))
            {
                Toast::success('Erro ao atualizar!');
                return redirect()->back();
            }

            Toast::success('Atualizado com sucesso!');

            return redirect()->route('profile');
        } catch (\Throwable $th) {

            // Caso aconteça algum erro na atualização, removo a foto do storage
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
