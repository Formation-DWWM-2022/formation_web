<?php

class View {
    function render($title = '', $file, $variables = []) {
        $title = $title;
        $content = $this->renderContent($file, $variables);

        ob_start();
        include './templates/layout.php';
        return ob_get_clean();
    }

    function renderContent($file, $variables = []){
        extract($variables);
        ob_start();
        include $file;
        $content = ob_get_clean();
        return $content;
    }
}
