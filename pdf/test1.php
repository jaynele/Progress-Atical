<?php 
if (!function_exists('read_pdf')) {
    function read_pdf($file)
    {
        if (strtolower(substr(strrchr($file, '.'), 1)) != 'pdf') {
            echo '文件格式不对.';
            return;
        }
        if (!file_exists($file)) {
            echo '文件不存在';
            return;
        }
        header('Content-type: application/pdf');
        header('filename=' . $file);
        readfile($file);
    }
}
read_pdf('./test.pdf');