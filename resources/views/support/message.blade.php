<body class="bg-light">
    <div class="container">
        <div class="card p-6 p-lg-10 space-y-4">
          <img class="my-6 w-16" src="{{asset('svg/1B-withoutbg.svg')}}" />
            <h1 class="h3 fw-700">
                {{ $data['subject'] }}
            </h1>
            <h4>
              Email enviado por {{ $data['name'] }}
            </h4>
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