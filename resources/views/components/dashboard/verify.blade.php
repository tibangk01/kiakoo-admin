@empty($verify)

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="callout callout-danger">
                <h5 class="text-center">Veuillez activer votre adresse e-mail en cliquant <a
                        class="text-danger text-decoration-none" href="{{ route('verification.notice') }}">ici</a></h5>
            </div>
        </div>

    </div>

@endempty


@if (isset($_GET['verified']) && $_GET['verified'] == 1)

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="callout callout-success">
                <h5 class="text-center">Votre adresse électronique a été bien vérifiée. Merci ! </h5>
            </div>
        </div>

    </div>

@endif
