<section class="role_table">
    <ul class="gamemaster roletable">
    @foreach($roles as $role)
        <li>{{ $role->name }}</li>
    @endforeach
    </ul>
</section>
