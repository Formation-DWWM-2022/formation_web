<?php

include_once 'imports.php';

include 'from_session.php';

$fighters = [$hero, $monster];
while (!$hero->isDead() && !$monster->isDead()) {
    $first = betterRandomize();
    $second = abs($first - 1);
    $fighters[$first]->attack($fighters[$second]);
    $fighters[$second]->attack($fighters[$first]);
}
if ($hero->isDead()) {
    echo 'You are defeated !';
} else {
    echo '<strong>You defeated the monster, great !</strong>';
    $hero->regen();
    $_SESSION['hero'] = $hero;
    unset($_SESSION['monster']);
    echo '<div class="text-center">';
    echo '<a class="btn btn-warning" href="combat.php?startFight=0">Next fight</a>';
    echo '</div>';
}

function betterRandomize(): int {
    if (mt_rand(0, 100) >= 50) {
        return 1;
    }
    return 0;
}