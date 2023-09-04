@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')


<div class="md-6 mt-4 ">

    <div class="md-6 mt-4 ">
        <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="overflow-hidden sm:rounded-md">

                <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">Perfil</h4>

                <div class="grid p-1 grid-cols-4 mb-4  md:grid-cols-2 gap-6">

                        <div class="col-span-2 sm:col-span-2">
                            <label class="block mb-2 text-sm font-medium text-gray-700  dark:text-white">Nome de Usuário</label>
                            <input type="text" value="{{ old('username') ?? $user->username ?? '' }}" name="username" autocomplete="given-name" class="bg-gray-50  border border-gray-300 text-gray-900 text-sm rounded-lg  p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white  dark:focus:border-purple form-input" disabled>
                        </div>

                        <div class="col-span-2 sm:col-span-4 ">
                            <label class="block mb-2 text-sm font-medium text-gray-700  dark:text-white">E-mail</label>
                            <input type="email" value="{{ old('email') ?? $user->email ?? '' }}" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 form-input" placeholder="email@email.com" required>
                        </div>
                </div>

                <hr class="my-8">
                <h4 class="mb-4 text-lg font-bold text-gray-600 dark:text-gray-300">Endereço</h4>

                <div class="grid p-1 grid-cols-4 mb-4  md:grid-cols-2 gap-6">

                    <div class="col-span-10 sm:col-span-5 lg:col-span-2">
                        <label class="block mb-2 text-sm font-medium text-gray-700  dark:text-white">CEP</label>
                        <input type="text" id="cep" value="{{ old('cep') ?? $user->cep ?? '' }}" name="cep"  autocomplete="cep" class="bg-gray-50  border border-gray-300 text-gray-900 text-sm rounded-lg  p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white  dark:focus:border-purple form-input">
                    </div>

                    <div class="col-span-2 sm:col-span-2 lg:col-span-2">
                        <label  class="block mb-2 text-sm font-medium text-gray-700  dark:text-white">Logradouro</label>
                        <input type="text" id="logradouro"  value="{{ old('logradouro') ?? $user->logradouro ?? '' }}" name="logradouro" class="bg-gray-50  border border-gray-300 text-gray-900 text-sm rounded-lg  block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white  dark:focus:border-purple form-input">
                    </div>

                    <div class="col-span-6 sm:col-span-3 lg:col-span-3">
                        <label class="block mb-2 text-sm font-medium text-gray-700  dark:text-white">Bairro</label>
                        <input type="text" id="bairro" value="{{ old('bairro') ?? $user->bairro ?? '' }}"  name="bairro" class="bg-gray-50  border border-gray-300 text-gray-900 text-sm rounded-lg  block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white  dark:focus:border-purple form-input">
                    </div>

                    <div class="col-span-6 sm:col-span-3 lg:col-span-3">
                        <label for="postal_code" class="block mb-2 text-sm font-medium text-gray-700  dark:text-white">Complemento</label>
                        <input type="text" value="{{ old('complemento') ?? $user->complemento ?? '' }}" name="complemento"  autocomplete="cep" class="bg-gray-50  border border-gray-300 text-gray-900 text-sm rounded-lg  block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white  dark:focus:border-purple form-input">
                    </div>

                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="state" class="block mb-2 text-sm font-medium text-gray-700  dark:text-white">Cidade</label>
                        <input type="text" id="cidade" value="{{ old('cidade') ?? $user->cidade ?? '' }}" name="cidade" class="bg-gray-50  border border-gray-300 text-gray-900 text-sm rounded-lg  block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white  dark:focus:border-purple form-input">
                    </div>

                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label for="postal_code" class="block mb-2 text-sm font-medium text-gray-700  dark:text-white">UF</label>
                        <input type="text" id="uf"  value="{{ old('uf') ?? $user->uf ?? '' }}" name="uf"  autocomplete="cep" class="bg-gray-50  border border-gray-300 text-gray-900 text-sm rounded-lg  block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white  dark:focus:border-purple form-input">
                    </div>
                </div>

                <div class="grid grid-rows-2 gap-2 col-span-1 sm:col-span-1 mt-6">

                    @php
                        $foto = $user->foto ?? null;

                        if (empty($foto)) {
                            $foto = 'https://t4.ftcdn.net/jpg/02/15/84/43/240_F_215844325_ttX9YiIIyeaR7Ne6EaLLjMAmy4GvPC69.jpg';
                        }
                    @endphp

                    <img class="rounded-lg"
                        id="foto"
                        style="width: 100px; height: 100px; !important;"
                        src="{{ $foto }}"
                        alt="Foto" />
                    <div class="col-span-6 sm:col-span-3 mt-4 ml-6" style="margin-left: 4px !important;">
                        <input
                            id="profile-picture-input"
                            name="foto"
                            class="hidden"
                            type="file"
                            accept="image/*"
                        />
                        <label for="profile-picture-input" class="cursor-pointer bg-gray-200 border px-4 py-1 rounded-full hover:bg-gray-300 transition duration-300 ease-in-out dark:text-white" style="font-size: 12px !important; padding: 10px;">
                            Alterar Foto
                        </label>
                    </div>
                </div>


                <div class="flex flex-col items-center">
                    <button  type="submit" class="px-4 mt-8 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-purple w-full">Salvar</button>
                </div>

            </form>
        </div>

@endsection



@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script type="text/javascript">

        document.getElementById('cep').addEventListener('blur', function() {
            console.log('oi');
            var cep = this.value;
            var url = '/cep/' + cep;

            $.ajax({
                url: url,
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    $('#logradouro').val(data.logradouro);
                    $('#cidade').val(data.localidade);
                    $('#bairro').val(data.bairro);
                    $('#complemento').val(data.complemento);
                    $('#uf').val(data.uf);
                }
            });
        });

        $(document).ready(function () {

            function atualizaFoto(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#foto').attr('src', e.target.result);
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $('#profile-picture-input').on('change', function () {
            atualizaFoto(this);
            });
        });

    </script>
@endsection

