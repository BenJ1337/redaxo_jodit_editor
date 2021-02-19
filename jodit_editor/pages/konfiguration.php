<?php
$html = '';
$pattern = '/^var joditConfig = (\{.*\});$/s';

$path2JoditConfig = rex_path::addonAssets("jodit_editor", "jodit_config.js");
$currentJodit_config = rex_file::get($path2JoditConfig);

if (isset($_POST["storeJoditConfig"]) && isset($_POST["joditConfig"])) {
    $newJoditConfig = $_POST["joditConfig"];
    $gespeichert = false;
    if (empty($newJoditConfig)) {
        $html .= '
                    <div class="alert alert-danger">
                        <strong>Fehler!</strong> Die Konfiguration darf nicht leer sein!
                    </div>
                ';
    } else if ($currentJodit_config === $newJoditConfig) {
        $html .= '
                    <div class="alert alert-warning">
                        <strong>Achtung!</strong> Die Konfiguration ist identisch zu der vorhandenen!
                    </div>
                ';
    } else if (!preg_match($pattern, $newJoditConfig, $matches)) {
        $html .= '
                    <div class="alert alert-warning">
                        <strong>Achtung!</strong> Es dürfen nur Änderungen zwischen den geschweiften Klammern {...} vorgenommen werden!
                    </div>
                ';
    } else {
        json_decode($matches[1]);
        if (json_last_error() !== JSON_ERROR_NONE) {
            $html .= '
                    <div class="alert alert-danger">
                        <strong>Fehler!</strong> Die Konfiguration ist nicht valide! <a href="https://www.w3schools.com/js/js_json_syntax.asp" target="_blank">JSON Syntax</a>
                    </div>
                ';
        } else {
            rex_file::put($path2JoditConfig, $newJoditConfig);
            $currentJodit_config = $newJoditConfig;

            $html .= '
                    <div class="alert alert-success">
                        <strong>Erfolg!</strong> Änderung erfolgreich gespeichert.
                    </div>
                ';
            $html .= '
                <div class="alert alert-info">
                    <strong>Hinweis!</strong> Bitte zu Sicherheit den Browser Cache löschen, damit die Änderungen geladen werden. (Firefox: STRG + F5)
                </div>
            ';
        }
    }
}

$html .= '
    <h1>Konfiguration</h1>
    <p><a href="https://xdsoft.net/jodit/doc/options/" target="_blank">Dokumentation der Optionen</a></p>
    <form action="' . $_SERVER["REQUEST_URI"] . '" method="post">
        <div class="form-group">
            <label for="comment">Aktuelle Konfiguration:</label>
            <textarea class="form-control" rows="20" id="comment" name="joditConfig">' . $currentJodit_config . '</textarea>
            <button class="btn" type="submit" name="storeJoditConfig">Speichern</button>
        </div>
    </form>
    ';
echo $html;
