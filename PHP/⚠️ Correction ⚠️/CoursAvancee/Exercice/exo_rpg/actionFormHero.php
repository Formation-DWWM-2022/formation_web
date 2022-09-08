<?php

include_once 'imports.php';

$hero = null;
if (isset($_POST['name']) && isset($_POST['typeHero'])) {
    /** @var Hero $hero */
    $hero = new $_POST['typeHero']($_POST['name']);
    session_start();
    $_SESSION['hero'] = $hero;
}

include 'header.php';

?>

<div class="row col-12">
    <?php
        if ($hero !== null) {
    ?>
    }
    <div class="card-rpgEntity col-6 text-center float-start rpg-image"
         style="background-image: url(<?php echo $hero->getImage() ?>)"
    >
    <?php
        echo $hero->toHtml();
    ?>
    </div>
    <?php
        }
    ?>

    <div class="text-center mx-auto">
        <form action="combat.php" method="post">
            <div class="form-group">
                <label for="difficulty">Select your difficulty</label>
                <select class="form-control" id="difficulty" name="difficulty" required>
                    <option value="Explorateur">Explorateur</option>
                    <option value="Adventurer">Adventurer</option>
                    <option value="Veteran">Veteran</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Start Fight</button>
        <form>
    </div>
</div>
<?php

include 'bottom.php';

?>


