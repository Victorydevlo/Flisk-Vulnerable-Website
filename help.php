<?php
$pdfFile = 'help.pdf';

if (file_exists($pdfFile)) {
    header('Content-Type: application/pdf');
    header('Content-Disposition: inline; filename="' . basename($pdfFile) . '"');
    readfile($pdfFile);
    exit;
} else {
    echo "<p>File not found.</p>";
}
?>