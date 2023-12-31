<?php
require_once 'functions.php';
//Checkbox
$parfums = [
    "Fraise" => 4,
    "Chocolat" => 5,
    "Vanille" => 3
];
//Radio
$cornets = [
    'Pot' => 2,
    'Cornet' => 3
];
//Checkbox
$supplements = [
    'Pepites de chocolat' => 1,
    'Chantilly' => 0.5
];
$title = 'Composez votre glace';
$ingredients = [];
$total = 0;

if (isset($_GET['parfum'])) {
    foreach($_GET['parfum'] as $parfum){
        if(isset($parfums[$parfum])) {
            $ingredients[] = $parfum;
            $total += $parfums[$parfum];
        }
    }
}
if (isset($_GET['supplement'])) {
    foreach($_GET['supplement'] as $supplement){
        if(isset($supplements[$supplement])) {
            $ingredients[] = $supplement;
            $total += $supplements[$supplement];
        }
    }
}
if (isset($_GET['cornet'])) {
    $cornet = $_GET['cornet'];
        if(isset($cornets[$cornet])) {
            $ingredients[] = $cornet;
            $total += $cornets[$cornet];
        }
}
require 'header.php';
?>

<h2>Composez votre glace</h2>


<div class="rox">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Votre glace</h5>
                <ul>
                    <?php foreach($ingredients as $ingredient): ?>
                        <li><?= $ingredient ?> </li>
                    <?php endforeach ;?>
                </ul>
                <p>
                    <strong>Prix :</strong><?= $total ?> €
                </p>
            </div>
        </div>

    </div>
    <div class="col-md-8">
    <form action="/jeu.php" method="GET">
    <h2>Choisissez vos parfums</h2>
   <?php foreach($parfums as $parfum => $prix) :?>
    <div class="checkbox">
        <label>
            <?= checkbox('parfum', $parfum, $_GET) ?>
            <?= $parfum ?> - <?= $prix ?> €
        </label>
    </div>
    <? endforeach; ?>
    <h2>Choisissez votre cornet</h2>
    <?php foreach($cornets as $cornet => $prix) :?>
    <div class="checkbox">
        <label>
            <?= radio('cornet', $cornet, $_GET) ?>
            <?= $cornet ?> - <?= $prix ?> €
        </label>
    </div>
    <? endforeach; ?>
    <h2>Choisissez vos suppléments</h2>
    <?php foreach($supplements as $supplement => $prix) :?>
    <div class="checkbox">
        <label>
            <?= checkbox('supplement', $supplement, $_GET) ?>
            <?= $supplement ?> - <?= $prix ?> €
        </label>
    </div>
    <? endforeach; ?>
    <button type="submit" class="btn btn-primary">Composer ma place</button>
</form>

    </div>
</div>
<h2>$_GET</h2>
<pre>
    <?php var_dump($_GET) ?>
</pre>

<h2>$_POST</h2>
<pre>
    <?php var_dump($_POST) ?>
</pre>

<?php
require 'footer.php';
?>