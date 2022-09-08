<?php

    include 'header.php';

?>
    <form action="actionFormHero.php" method="post">
        <div class="form-group">
            <label for="heroName">Nom hero</label>
            <input type="text" class="form-control" id="heroName" placeholder="Enter hero name" name="name" required>
        </div>
        <div class="form-group">
            <label for="classHero">Select your Hero</label>
            <select class="form-control" id="classHero" name="typeHero" required>
                <option value="Mage">Mage</option>
                <option value="Warrior">Warrior</option>
                <option value="Rogue">Rogue</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary" name="hero">
            Create
        </button>
    </form>
<?php

    include 'bottom.php';

?>

