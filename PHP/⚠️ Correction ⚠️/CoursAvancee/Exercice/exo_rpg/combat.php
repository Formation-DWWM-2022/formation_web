<?php

include_once 'imports.php';

$hero = null;
$difficulty = null;
$monster = null;
$startFight = isset($_GET['startFight']) ? $_GET['startFight'] : 0;
$endFight = false;

session_start();

if (isset($_POST['difficulty'])) {
    /** @var Hero $hero */
    $hero = $_SESSION['hero'];
    /** @var Difficulty $difficulty */
    $difficulty = new $_POST['difficulty']();
    $_SESSION['difficulty'] = $difficulty;
    saveMonsterInSession($difficulty, $hero);
}
if ($startFight) {
    include 'from_session.php';
}

if (isset($_SESSION['hero']) && isset($_SESSION['difficulty']) && !$startFight) {
    include 'from_session.php';
    if ($difficulty->hasMonstersLeft()) {
        saveMonsterInSession($difficulty, $hero);
        $monster = $_SESSION['monster'];
    } else {
        $endFight = true;
    }
}

function saveMonsterInSession(Difficulty $difficulty, Hero $hero) {
    $monster = $difficulty->getMonsterByLevel($hero->getLevel() + 1);
    if ($monster !== null) {
        $_SESSION['monster'] = $monster;
    }
}

include 'header.php';

?>

<div class="row col-12">
    <?php
        if ($hero !== null) {
    ?>
        <div class="card-rpgEntity text-center float-left rpg-image"
             style="background-image: url(<?php echo $hero->getImage() ?>)"
        >
            <?php
                echo $hero->toHtml();
            ?>
        </div>
    <?php
    }
    ?>
    <div class="card-rpgEntity text-center mx-auto">
        <?php
            if (!$startFight && !$endFight) {
        ?>
            Waiting for fight to start...
            <a class="btn btn-warning" href="combat.php?startFight=1">
                Start Fight
            </a>
        <?php
            } else if (!$endFight) {
                include 'combat_log.php';
            } else {
                include 'end_fight.php';
            }
        ?>
    </div>
    <?php
        if ($monster !== null) {
    ?>
    <div class="card-rpgEntity text-center float-right rpg-image"
         style="background-image: url(<?php echo $monster->getImage() ?>)"
    >
        <?php
                echo $monster->toHtml();
        ?>
    </div>
    <?php
        }
    ?>
</div>



