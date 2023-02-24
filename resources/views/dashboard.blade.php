<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Meus Dados') }}
        </h2>
    </x-slot>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @auth
                    <!-- admin -->
                    @if(auth()->user()->role==='admin')
                    {{ __("Você está logado como Administrador!") }}
                    <div class="col-lg-8">
                        <div class="card mb-4">
                            <div class="card-body">
                            <a class="btn btn-primary" href="{{ route('index') }}" role="button">Gerenciar Usuarios</a>
                            </div>
                        </div>
                    </div>
                    @endif
                    <!-- medico -->
                    @if(auth()->user()->role==='medico')
                    {{ __("Você está logado!") }}
                    <div class="col-lg-8">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Nome:</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{auth()->user()->name}}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">CPF:</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{auth()->user()->cpf}}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">CRM:</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{auth()->user()->crm}}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Atuação:</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{auth()->user()->atuacao}}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Estado:</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{auth()->user()->state}}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Email:</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{auth()->user()->email}}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Telefone:</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{auth()->user()->tel}}</p>
                                    </div>
                                </div>
                            </div>
                            <a class="btn btn-primary" href="{{ route('form.formulariomed') }}" role="button">Inserir Paciente</a>
                            <a class="btn btn-success" href="{{ route('list.form') }}" role="button">Visuaizar Pacientes</a>
                        </div>
                    </div>
                    @endif
                    <!-- paciente -->
                    @if(auth()->user()->role==='paciente')
                    {{ __("Você está logado!") }}
                    <div class="col-lg-8">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Nome:</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{auth()->user()->name}}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">CPF:</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{auth()->user()->cpf}}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Data de Nascimento:</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{auth()->user()->date}}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Estado:</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{auth()->user()->state}}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Email:</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{auth()->user()->email}}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Telefone:</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{auth()->user()->tel}}</p>
                                    </div>
                                </div>
                            </div>
                            @if($formulario)
                            <a class="btn btn-primary" href="{{ route('show.form' ) }}" role="button">Mostrar Fomulario</a>
                            @else
                            <a class="btn btn-primary" href="{{ route('form.formulariopac' ) }}" role="button">Preencher Formulario</a>
                            @endif
                        </div>
                    </div>
                    @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
</x-app-layout>