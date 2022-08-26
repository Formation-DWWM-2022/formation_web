<div class="mb-3">
    <label for="title" class="form-label">title</label>
    <input type="text" class="form-control" id="title" name="title"
           placeholder="title"
           value="<?php echo (isset($media) and $media->getTitle() != null) ? $media->getTitle() : '' ?>">
</div>
<div class="mb-3">
    <label for="creator" class="form-label">creator</label>
    <input type="text" class="form-control" id="creator" name="creator"
           placeholder="creator"
           value="<?php echo (isset($media) and $media->getCreator() != null) ? $media->getCreator() : '' ?>">
</div>
<div class="mb-3">
    <label for="type_id" class="form-label">type_id</label>
    <select class="form-control" id="type_id" name="type_id">
        <?php foreach ($types as $type) { ?>
            <option
                <?php echo (isset($media) and $media->getTypeId() == $type)
                    ? 'selected' : ''; ?>
                    value="<?= $type->getId(); ?>">
                <?= $type->getName(); ?>
            </option>
        <?php } ?>
    </select>
</div>
<button type="submit" class="btn btn-primary">Envoyer</button>
