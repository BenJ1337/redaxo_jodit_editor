<?php
$rex_values_content = json_decode(rex_article_slice::getArticleSliceById($rex_slice_id)->getValue(2), true);
echo $rex_values_content['wasiwyg_text'];
