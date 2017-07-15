<section class="night_table">
    <table>
        <thead><tr>
            <th>#</th>
            @foreach ($night_phases as $list)
                <th>{!!
                    implode('<br/>', array_unique(array_map(function($role) use ($roles) {
                        return $roles->find($role)->name;
                    }, $list)))
                !!}</th>
            @endforeach
        </tr></thead>
        <tbody>
        @for($i = 0; $i < 15; $i++)
            <tr>
                <td>{{ $i+1 }}</td>
                {!! str_repeat('<td></td>', count($night_phases)) !!}
            </tr>
        @endfor
</tbody></table>
</section>
