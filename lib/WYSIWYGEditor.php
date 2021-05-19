<?php

namespace jodit_editor;

class WYSIWYGEditor extends ComponentBase
{

    function __construct($label, $rexValueId, $path2Value, $slice)
    {
        parent::__construct($label, $rexValueId, $path2Value, $slice);
    }

    public function getHTML()
    {
        $htmlOutput = '';
        $rex_value_1 = $this->getCurrentValue($this->rexValue, $this->path2Value);
        $htmlOutput .= '<div class="form-group">' .
            '<label for="text1">' . $this->label . '</label>' .
            '<textarea class="form-control jodit-editor" type="text" id="text1" name="REX_INPUT_VALUE[' . $this->rexValueId . '][' . join("][", $this->path2Value) . ']">' .
            $rex_value_1 .
            '</textarea>' .
            '</div>';
        return $htmlOutput;
    }
}
