<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\ViaCep\ViaCepService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');

            if (!$foto->isValid() && in_array($foto->getClientOriginalExtension(), ['jpeg', 'jpg', 'png'])) {
                dd('Não é uma imagem válida');
            }

            $pathFoto = $request->foto->store('fotos');
            dd($pathFoto);
        }

        dd($request->all());
    }

    function getCep(Request $request)
    {
        $cep = $request->cep;

        $response  = (new ViaCepService())->getCep($cep);
        return $response;
    }

}
