<body class="bg-light">
    <div class="container">
        <img class="ax-center my-10 w-24" src="https://assets.bootstrapemail.com/logos/light/square.png" />
        <div class="card p-6 p-lg-10 space-y-4">
            <h1 class="h3 fw-700">
                {{ $data['subject'] }} de {{ $data['name'] }}
            </h1>
            <p>
                {{ $data['message'] }}
            </p>
            <div class="d-flex gap-3">
                <a class="btn btn-primary p-3 fw-700" href="mailto:{{ $data['email'] }}">Responder</a>
                @if ($attachmentPath)
                    <a class="btn btn-primary p-3 fw-700" href="{{ asset('storage/' . $attachmentPath) }}"
                        target="_blank" rel="noopener noreferrer">Download</a>
                @endif
            </div>
        </div>
    </div>
</body>