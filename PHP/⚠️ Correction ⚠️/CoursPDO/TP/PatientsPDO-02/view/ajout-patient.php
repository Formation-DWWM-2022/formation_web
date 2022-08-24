<?php include 'head.php' ?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <form method="POST" action="../loader.php?action=add-patient">
                <div class="mb-3">
                    <label for="lastname" class="form-label">lastname</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" required>
                </div>
                <div class="mb-3">
                    <label for="firstname" class="form-label">firstname</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" required>
                </div>
                <div class="mb-3">
                    <label for="birthdate" class="form-label">birthdate</label>
                    <input type="date" class="form-control" id="birthdate" name="birthdate" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">phone</label>
                    <input type="tel" class="form-control" id="phone" name="phone">
                </div>
                <div class="mb-3">
                    <label for="mail" class="form-label">mail</label>
                    <input type="email" class="form-control" id="mail" name="mail">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
