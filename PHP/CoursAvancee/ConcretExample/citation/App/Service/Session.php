<?php

namespace App\Service;

class Session
{
    public static function exists(string $name): bool
    {
        return isset($_SESSION[$name]);
    }

    public static function put(string $name, $value)
    {
        return $_SESSION[$name] = $value;
    }

    public static function get(string $name)
    {
        return $_SESSION[$name];
    }

    public static function delete(string $name)
    {
        if (self::exists($name)) {
            unset($_SESSION[$name]);
        }
    }

    public static function addMessage($type, $msg)
    {
        if (self::exists($type)) {
            $messages = self::get('messages');
        }
        $messages[] = [$type => $msg];
        self::put('messages', $messages);
    }

    public static function showMessage()
    {
        if (self::exists('messages')) {
            foreach (self::get('messages') as $messages) {
                foreach ($messages as $type => $msg){
                    ?>
                    <div class="alert alert-<?= $type ?>" role="alert">
                        <?= $msg ?>
                    </div>
                    <?php
                }
            }
        }
        self::delete('messages');
    }

}
