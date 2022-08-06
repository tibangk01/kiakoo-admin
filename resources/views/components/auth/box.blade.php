<div class="login-box">

    <div class="login-logo">
        <a href="#">{{ __(config('app.name')) }}</a>
    </div>

    <div class="card">

        <div class="card-body login-card-body">

             {{--
                TODO: set these titles dynamicly

                forgot pass : Veuillez entrer votre adresse e-mail pour demander un nouveau mot de passe.
                login: Connectez-vous ici

            --}}

            <p class="login-box-msg">coming ...</p>

            {{ $slot }}

        </div>

    </div>

</div>
