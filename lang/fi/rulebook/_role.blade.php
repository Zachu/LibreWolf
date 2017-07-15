<article class="role">
    <h3>{{ $role->name }}</h3>
    <table class="attributes">
        <tr><th>Joukkue</th><td>{{ $role->team }}</td></tr>
        <tr><th>Tehtävä</th><td>{{ $role->description }}</td></tr>
        <tr><th>Erikoiskyky</th><td>{{ $role->special ?? 'Ei mitään' }}</td></tr>
@if (isset($role->info))
        <tr><th>Lisätietoa</th><td>{{ $role->info }}</td></tr>
@endif
    </table>
</article>
