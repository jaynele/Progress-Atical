<?php 

    header('Content-type:text/html;charset=utf-8');
    require(__DIR__ . '/vendor/autoload.php');
    use Smalot\PdfParser\Parser;
    // 创建源码中的Parser类对象
    $parser = new Parser;
    // 调用解析方法，参数为pdf文件路径，返回结果为Document类对象
    $path = './test.pdf';
    $document = $parser->parseFile($path);
    // 获取所有的页
    $pages = $document->getPages();
    // 逐页提取文本
    foreach($pages as $page){
        echo($page->getText());
    }





// Include Composer autoloader if not already done.
include 'vendor/autoload.php';

// Parse pdf file and build necessary objects.
$parser = new \Smalot\PdfParser\Parser();
$pdf    = $parser->parseFile('document.pdf');

// Retrieve all details from the pdf file.
$details  = $pdf->getDetails();

// Loop over each property to extract values (string or array).
foreach ($details as $property => $value) {
    if (is_array($value)) {
        $value = implode(', ', $value);
    }
    echo $property . ' => ' . $value . "\n";
}