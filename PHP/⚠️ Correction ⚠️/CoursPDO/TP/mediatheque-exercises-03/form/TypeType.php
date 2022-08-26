<div class="mb-3">
    <label for="name" class="form-label">name</label>
    <input type="text" class="form-control" id="name" name="name"
           placeholder="name" value="<?php echo (isset($type) and
        $type->getName() != null) ? $type->getName() : '' ?>">
</div>
<button type="submit" class="btn btn-primary">Envoyer</button>
