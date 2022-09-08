<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Design</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($sports as $key => $value) { ?>
        <tr>
            <th scope="row"><?= $value->id; ?></th>
            <td><?= $value->design; ?></td>
            <td>
                <a href="<?= URL_ROOT . 'admin/sport/' .$value->id ?>" class="btn btn-primary">Show</a>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>
