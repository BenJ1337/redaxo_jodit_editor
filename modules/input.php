<?php
$slice = rex_article_slice::getArticleSliceById($rex_slice_id);
$wysiwygEditor = new jodit_editor\WYSIWYGEditor(
    "Text",
    2,
    ['wasiwyg_text'],
    $slice
);
echo $wysiwygEditor->getHTML();
