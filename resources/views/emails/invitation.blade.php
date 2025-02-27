<h2>Invitation EasyColoc</h2>

<p>Vous êtes invité à rejoindre la colocation :</p>

<strong>{{ $invitation->colocation->name }}</strong>

<p>Cliquez ici :</p>

<a href="{{ url('/invitations/accept/'.$invitation->token) }}">
    Rejoindre la colocation
</a>

<p>Ce lien expire le {{ $invitation->expires_at->format('d/m/Y H:i') }}</p>