@extends('layouts.app')
@section('title')
    Genius
@endsection
@section('content')
<div class="d-flex flex-column h-100">
    <div class="flex-shrink-0">
        <!-- Header-->
        <div class="bg-dark py-5">
            <div class="container px-5">
                <div class="row gx-5 align-items-center justify-content-center">
                    <div class="col-lg-8 col-xl-7 col-xxl-6">
                        <div class="my-5 text-center text-xl-start">
                            <h1 class="display-5 fw-bolder text-white mb-2">Vamos simplificar seu trabalho?
                            </h1>
                            <p class="lead fw-normal text-white-50 mb-4">Estamos aqui para você!</p>
                            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                                <a class="btn btn-primary btn-lg px-4 me-sm-3" href="#contatos">Vamos lá!</a>
                                <a class="btn btn-outline-light btn-lg px-4" href="#">Saiba mais</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img class="img-fluid rounded-3 my-5"
                            src="{{ asset('svg/undraw_developer_activity_re_39tg.svg') }}" alt="..." /></div>
                </div>
            </div>
        </div>
        <!-- Contato -->
        <section id="contatos" class="py-5">
            <div class="container px-5 my-5">
                <aside class="bg-primary bg-gradient rounded-3 p-4 p-sm-5 mt-5">
                    <div
                        class="d-flex align-items-center justify-content-between flex-column flex-xl-row text-center text-xl-start">
                        <div class="mb-4 mb-xl-0">
                            <div class="fs-3 fw-bold text-white">Vamos realizar suas demandas</div>
                            <div class="text-white-50">Nos envie seu email que entraremos em contato!</div>
                        </div>
                        <div class="ms-xl-4">
                            <div class="input-group mb-2">
                                <input class="form-control" type="text" placeholder="Seu email..."
                                    aria-label="Seu email..." aria-describedby="button-contato" disabled/>
                                <button class="btn btn-outline-light" id="button-contato" type="button">Enviar</button>
                            </div>
                            <div class="small text-white-50">Nos importamos com sua privacidade, nunca compartilharemos seus dados.
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </section>
    </div>
</div>
@endsection