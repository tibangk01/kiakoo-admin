<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="callout callout-info">
            <h5>Vérifiez votre adresse e-mail</h5>

            {!! Form::open(['method' => 'POST', 'route' => 'verification.send']) !!}

            <p>
                Avant de poursuivre, veuillez vérifier si vous avez reçu un lien de vérification dans votre courrier
                électronique.
            </p>

            {!! Form::submit('Demander un nouveau lien', ['class' => 'btn btn-info']) !!}

            {!! Form::close() !!}

        </div>
    </div>
</div>

@if (session('status'))

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="alert alert-success" role="alert">
                {{ 'Un nouveau lien de vérification a été envoyé à votre adresse électronique.' }}
            </div>
        </div>
    </div>
    
@endif
