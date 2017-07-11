<?php
function dirtrim(string...$dirs): string
{
    $return = '';
    foreach ($dirs as $dir) {
        $return .= rtrim($dir, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
    }

    return $return;
}

function filetrim(string $file): string
{
    return basename($file, '.php');
}

function get_template(string $lang, $template): array
{
    $dir  = dirtrim('lang', $lang, 'templates');
    $file = $dir . $template . '.php';

    if (!is_file($file)) {
        throw new \Exception("Template $template not found for language $lang");
    }

    return include $file;
}

function get_roles(string $lang, array $config): array
{
    $role_keys = $config['roles'] ?? [];

    $dir = dirtrim('lang', $lang, 'roles');
    if (!is_dir($dir)) {
        throw new \Exception("No roles found for language " . $lang);
    }

    $roles     = [];
    $templates = [];
    foreach ($role_keys as $role_key) {
        $role = get_role($lang, $role_key);

        if (isset($role['template'])) {
            $template_key = $role['template'];
            if (!isset($templates[$template_key])) {
                $templates[$template_key] = get_template($lang, $template_key);
            }

            $role = array_merge($templates[$template_key], $role);
        }

        $roles[] = $role;
    }

    return $roles;
}

function get_role(string $lang, string $role): array
{
    $dir  = dirtrim('lang', $lang, 'roles');
    $file = $dir . $role . '.php';

    if (!is_file($file)) {
        throw new \Exception("No file for role $role in language $lang");
    }

    return include $file;
}

function get_role_count(
    array $config,
    string $paperSize = null,
    string $orientation = null
): array
{
    $paperSize   = strtolower($paperSize ?? $config['default']['paperSize']);
    $orientation = strtolower($orientation ?? $config['default']['orientation']);

    if (!isset($config['role_count'][$paperSize][$orientation])) {
        throw new \Exception("No dimensions specified for $orientation $paperSize");
    }

    return $config['role_count'][$paperSize][$orientation];
}

function is_new_row(int $i, array $role_count): bool
{
    return ($i % $role_count[0] === 0);
}

function print_roles(array $roles, array $role_count)
{
    $count = $role_count[0] * $role_count[1];
    for ($i = 0; $i < count($roles); $i += $count) {
        $roles_slice = array_slice($roles, $i, $count);

        print_role_fronts($roles_slice, $role_count, $i);
        print_role_backs(count($roles_slice), $role_count);
    }
}

function print_role_fronts(array $roles, array $role_count, int $no)
{
    echo '<div class="page">';
    for ($i = 0; $i < count($roles); $i++) {
        if ($i === 0) {
            echo '<div class="row">';
        } elseif (is_new_row($i, $role_count)) {
            echo '</div><div class="row">';
        }

        print_view('card', [
            'role' => $roles[$i],
            'no'   => ($no + $i + 1),
        ]);
    }

    echo '</div></div>';
}

function print_role_backs(int $count, array $role_count)
{
    $view = dirtrim('views') . 'card_back.php';

    echo '<div class="page">';
    for ($i = 0; $i < $count; $i++) {
        if ($i === 0) {
            echo '<div class="row">';
        } elseif (is_new_row($i, $role_count)) {
            echo '</div><div class="row">';
        }

        print_view('card_back');
    }
    echo '</div></div>';
}

function print_view(string $view, array $arguments = [])
{
    $view = dirtrim('views') . $view . '.php';
    if (!is_file($view)) {
        throw new \Exception("View $view not found");
    }

    extract($arguments, EXTR_SKIP);
    include $view;
}

function print_rules($lang) {
 $ruleIndex = "lang/$lang/rules/index.php";
	if (is_file($ruleIndex)) {
		include $ruleIndex;
	} else{
	throw new \Exception("Language $lang doesn't have a rule index");
	}
}