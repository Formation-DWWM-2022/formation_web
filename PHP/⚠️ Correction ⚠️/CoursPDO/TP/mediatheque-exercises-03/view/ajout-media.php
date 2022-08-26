<?php include 'head.php' ?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <form method="POST" action="ajout-media.php?action=ajout&type=media">
               <?php include '../form/MediaType.php'; ?>
            </form>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
