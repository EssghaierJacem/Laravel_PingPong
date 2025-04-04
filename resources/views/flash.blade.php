<form action="/traitement" method="post">
    @csrf
    <input type="text" name="texte" />
        <button type="submit">
            Envoyer
        </button>

    @if(session('error'))
        <div style="color: red;">{{ session('error') }}</div>
    @endif
    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif
</form>
