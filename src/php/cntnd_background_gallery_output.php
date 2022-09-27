<?php
// cntnd_background_gallery_output

// includes
cInclude('module', 'includes/class.cntnd_background_gallery_output.php');

// assert framework initialization
defined('CON_FRAMEWORK') || die('Illegal call: Missing framework initialization - request aborted.');

// editmode
$editmode = cRegistry::isBackendEditMode();

// input/vars
$selectedDir = "CMS_VALUE[1]";
$sortDir = "CMS_VALUE[2]";
$delay = "CMS_VALUE[3]";

// other vars
$cntndOutput = new Cntnd\BackgroundGallery\CntndBackgroundGalleryOutput($idart, $lang, $client, $selectedDir, $sortDir, $delay);

// load data
$cntndOutput->load();

// module
if (!$editmode) {
    $tpl = cSmartyFrontend::getInstance();
    $tpl->assign('delay', $cntndOutput->delay());
    $tpl->assign('pictures', $cntndOutput->images());
    $tpl->display("default.html");
}
?>
