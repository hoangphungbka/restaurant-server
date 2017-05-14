<?php
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Content-Disposition: attachment; filename="invoice.pdf"');
header('Content-type: application/pdf');
echo $this->fetch('content');
?>
