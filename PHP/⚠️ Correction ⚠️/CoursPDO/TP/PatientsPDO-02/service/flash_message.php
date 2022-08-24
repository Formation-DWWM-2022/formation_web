<?php
function addMessage($type, $msg)
{
    if (isset($_SESSION['messages']) and !empty($_SESSION['messages'])) {
        $messages = $_SESSION['messages'];
    }
    $messages[] = [$type => $msg];
    $_SESSION['messages'] = $messages;
}

function removeMessages()
{
    unset($_SESSION['messages']);
}

function showMessage()
{
    if (isset($_SESSION['messages']) and !empty($_SESSION['messages'])) {
        foreach ($_SESSION['messages'] as $messages) {
            foreach ($messages as $type => $msg){
                ?>
                <div class="alert alert-<?= $type ?>" role="alert">
                    <?= $msg ?>
                </div>
                <?php
            }
        }
    }
    removeMessages();
}
