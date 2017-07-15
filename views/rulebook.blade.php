<article class="rulebook introduction page-break">
{!! $template->render('rulebook.1-introduction') !!}
</article>

<article class="rulebook basics">
{!! $template->render('rulebook.2-basics') !!}
</article>

<article class="rulebook game page-break">
{!! $template->render('rulebook.3-game') !!}
</article>

<article class="rulebook roles page-break">
{!! $template->render('rulebook.4-roles', [
    'roles' => $roles->filter(function($role) use ($skip_role_rules) {
        return !in_array($role->id, $skip_role_rules);
    })
]) !!}
</article>

<article class="rulebook authors page-break">
{!! $template->render('rulebook.5-variations') !!}
</article>

<article class="rulebook authors page-break">
{!! $template->render('rulebook.6-authors') !!}
</article>

<article class="rulebook license page-break">
{!! $template->render('rulebook.7-license') !!}
</article>
