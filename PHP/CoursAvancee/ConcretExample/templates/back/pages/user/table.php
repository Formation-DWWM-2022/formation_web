<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Nom</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $key => $value) { ?>
        <tr>
            <th scope="row"><?= $value->getId(); ?></th>
            <td><?= $value->getNom(); ?></td>
            <td>
                <a href="<?= URL_ROOT . 'admin/user/' .$value->getId() ?>" class="btn btn-primary">Show</a>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>
