<?php
    if (rex::isBackend()) {
        //$addon = \rex_addon::get('jodit_editor');
        rex_view::addCssFile($this->getAssetsUrl('vendor/jodit/build/jodit.min.css'));
        rex_view::addJsFile($this->getAssetsUrl('vendor/jodit/build/jodit.min.js'));
        rex_view::addJsFile($this->getAssetsUrl('jodit_editor_main.js'));
    }
?>
