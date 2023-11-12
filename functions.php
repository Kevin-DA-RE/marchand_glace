<?php
function nav_item (string $lien, string $titre, string $linkClass = ''): string
{
    $classe = '';
    if( $_SERVER['SCRIPT_NAME'] === $lien) {
        $classe = ' active';
    }
    return <<<HTML
    <li class="nav-item">
        <a class="nav-link $classe " href="$lien ">$titre</a>
    </li>
HTML;
}

function nav_menu (string $linkClass = ''): string
{
    return 
    nav_item('/index.php', 'Accueil', $linkClass).
    nav_item('/contact.php', 'Contact', $linkClass);
}
?>
