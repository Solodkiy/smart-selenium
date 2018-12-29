<?php

const DOWNLOAD_DIR = 'Downloads';
const VERSION = '0.2.0';

function render($status, $content)
{
    echo '<div id="status">'.$status.'</div>'. "\n";
    echo '<div id="content">'.htmlentities($content).'</div>';
    exit;
}

function filterFiles($files)
{
    return array_values(array_filter($files, function ($file) { return $file[0] !== '.'; }));
}

$command = $_GET['cmd'] ?? null;

switch ($command) {
    case 'version':
        render('success', VERSION);
        return;
    case 'get_names':
        $files = filterFiles(scandir(DOWNLOAD_DIR));
        render('success', json_encode($files));
        return;
    case 'get_by_name':
        $name = $_GET['name'] ?? null;
        if ($name) {
            $content = file_get_contents(DOWNLOAD_DIR.'/'.$name);
            if ($content !== false) {
                render('success', json_encode(['name' => $name, 'content' => base64_encode($content)]));
            } else {
                render('error', 'file read error');
            }
        } else {
            render('error', 'Name param is empty');
        }
        return;
    case 'clear':
        $files = filterFiles(scandir(DOWNLOAD_DIR));
        foreach ($files as $file) {
            unlink(DOWNLOAD_DIR.'/'.$file);
        }
        render('success', '');
        return;
    default:
        render('error', 'unknown command');
        return;

}


