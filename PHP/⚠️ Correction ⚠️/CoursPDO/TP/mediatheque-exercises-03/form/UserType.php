<div class="mb-3">
    <label for="pseudo" class="form-label">pseudo</label>
    <input type="text" class="form-control" id="pseudo" name="pseudo"
           placeholder="pseudo"
           value="<?php echo (isset($user) and $user->getPseudo() != null) ? $user->getPseudo() : '' ?>">
</div>
<div class="mb-3">
    <label for="email" class="form-label">email</label>
    <input type="text" class="form-control" id="email" name="email"
           placeholder="email"
           value="<?php echo (isset($user) and $user->getEmail() != null) ? $user->getEmail() : '' ?>">
</div>
<div class="mb-3">
    <label for="media_id" class="form-label">media_id</label>
    <select class="form-control" id="media_id" name="media_id">
        <?php foreach ($medias as $media) { ?>
            <option
                <?php echo (isset($user) and $user->getMediaId() == $media)
                    ? 'selected' : ''; ?>
                value="<?= $media->getId(); ?>">
                <?= $media->getTitle(); ?> - <?= $media->getCreator(); ?> | <?= $media->getTypeId()->getName(); ?>
            </option>
        <?php } ?>
    </select>
</div>
<button type="submit" class="btn btn-primary">Envoyer</button>
