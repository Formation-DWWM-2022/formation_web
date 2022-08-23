<?php
function addMessage($type, $msg)
{
    if (isset($SESSION['messages']) and !empty($SESSION['messages'])) {
        $messages = $SESSION['messages'];
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
    if (isset($_SESSION['messages']) and empty($SESSION['messages'])) {
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
