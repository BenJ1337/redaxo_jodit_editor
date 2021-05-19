<?php

$html = '
    <h1>Handbuch</h1>
    <p>Füge die CSS Klasse <span class="badge">.jodit-editor</span> einem <span class="badge">textarea</span> hinzu.</p>

    <div class="panel panel-default">
        <div class="panel-heading">Input</div>
        <div class="panel-body">' . htmlspecialchars('<textarea class="jodit-editor" name="REX_INPUT_VALUE[1]">REX_VALUE[1]</textarea>') . '</div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">Output</div>
        <div class="panel-body">' . htmlspecialchars('REX_VALUE[id=1 output=html]') . '</div>
    </div>

    <p>Beim Öffnen eines Slices wird der Jodit Editor automatisch geladen und initialisiert.</p>
    ';

echo $html;
