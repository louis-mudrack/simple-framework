<?php 

// Get the template content and end buffer
$templateContent = ob_get_contents();
ob_end_clean();

// Include the main template
include($_SERVER["DOCUMENT_ROOT"]."/templates/{$template}.php");

?>