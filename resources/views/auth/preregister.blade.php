<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Qual tipo de usuario?</p>
                        <a type="button" class="btn btn-primary btn-lg" href="{{ route('registerMed') }}">Medico</a>
                        <a type="button" class="btn btn-secondary btn-lg" href="{{ route('registerPac') }}">Paciente</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>