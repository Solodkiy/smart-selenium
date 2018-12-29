<?php

const DOWNLOAD_DIR = 'Downloads';

function render($status, $content)
{
    echo '<div id="status">'.$status.'</div>'. "\n";
    echo '<div id="content">'.base64_encode($content).'</div>';
    exit;
}

function filterFiles($files)
{
    return array_values(array_filter($files, function ($file) { return $file[0] !== '.'; }));
}

$command = $_GET['cmd'] ?? null;

switch ($command) {
    case 'version':
        render('success', '0.1.0');
        return;
    case 'get_last_downloaded_file':
        $files = filterFiles(scandir(DOWNLOAD_DIR));
        if (count($files)) {
            $content = file_get_contents(DOWNLOAD_DIR.'/'.$files[0]);
            if ($content !== false) {
                render('success', $content);
            } else {
                render('error', 'file read error');
            }
        } else {
            render('error', 'file not found');
        }
        return;
    case 'clear_all':
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


