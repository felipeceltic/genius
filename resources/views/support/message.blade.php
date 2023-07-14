<body class="bg-light">
    <div class="container">
        <div class="card p-6 p-lg-10 space-y-4">
            <h1 class="h3 fw-700">
                {{ $data['subject'] }}
            </h1>
            <h4>
              Email enviado por {{ $data['name'] }}
            </h4>
            <p>
                {{ $data['message'] }}
            </p>
            <a class="btn btn-primary p-3 fw-700" href="mailto:{{ $data['email'] }}">Responder</a>
        </div>
    </div>
</body>