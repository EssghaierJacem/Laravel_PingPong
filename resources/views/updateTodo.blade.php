<table>
    <thead>
        <tr>
            <th>Texte</th>
            <th>Terminé</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($todos as $todo)
            <tr>
                <td>{{ $todo->texte }}</td>
                <td>{{ $todo->termine ? 'Oui' : 'Non' }}</td>
                <td>
                    @if(!$todo->termine)
                        <a href="/todo/terminer/{{ $todo->id }}">Marquer comme terminé</a>
                    @else
                        <span>Terminé</span>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
