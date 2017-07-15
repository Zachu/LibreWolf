<!-- 4 cards per row hardcoded for now -->
@for ($i = 0;
     ($pageRoles = $roles->paginate($role_card_count[0]*$role_card_count[1], $i))->count() > 0;
     $i += $role_card_count[0]*$role_card_count[1])

    {{-- Print the front face of all the cards that fit into one page --}}
    <div class="page">

    @for ($j = 0;
         ($rowRoles = $pageRoles->paginate($role_card_count[0], $j))->count() > 0;
         $j += $role_card_count[0])
        <div class="row">

        @foreach ($rowRoles as $role)
            @include('_rolecard', [
                'role' => $role,
                'no' => $i+$j+$loop->iteration,
            ])
        @endforeach

        </div>
    @endfor

    </div>

    {{-- Now do the same but for the backsides --}}
    <div class="page">

    @for ($j = 0;
         ($rowRoles = $pageRoles->paginate($role_card_count[0], $j))->count() > 0;
         $j += $role_card_count[0])
        <div class="row">

        @foreach ($rowRoles as $role)
            <div class="card back">
                <img alt="Card back" src="assets/img/game-card-back.jpg">
            </div>
        @endforeach

        </div>
    @endfor

    </div>

@endfor
