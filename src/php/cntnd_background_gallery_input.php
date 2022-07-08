?><?php
// cntnd_background_gallery_input

// includes
cInclude('module', 'includes/style.cntnd_background_gallery_output-or-input.php');
cInclude('module', 'includes/class.cntnd_background_gallery_input.php');

// input/vars
$selectedDir = "CMS_VALUE[1]";
$sortDir = "CMS_VALUE[2]";
if (empty($sortDir)) {
    $sortDir = 'DESC';
}
$delay = (integer)"CMS_VALUE[3]";
if (empty($delay) OR $delay<1) {
    $delay = 6;
}

// other vars
$uuid = rand();
$cntndInput = new Cntnd\BackgroundGallery\CntndBackgroundGalleryInput($lang, $client);
?>
<div class="form-vertical">
    <div class="form-group">
        <label for="gallery_<?= $uuid ?>"><?= mi18n("GALLERY") ?></label>
        <select name="CMS_VAR[1]" id="background_gallery_<?= $uuid ?>" size="1">
            <option value="false"><?= mi18n("SELECT_CHOOSE") ?></option>
            <?php
            foreach ($cntndInput->folders() as $folder) {
                $selected = "";
                if ($selectedDir == $folder) {
                    $selected = 'selected="selected"';
                }
                echo '<option value="' . $folder . '" ' . $selected . '>' . $folder . '</option>';
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="sort_<?= $uuid ?>"><?= mi18n("SORT") ?></label>
        <select name="CMS_VAR[2]" id="sort_<?= $uuid ?>" size="1">
            <option value="ASC" <?php if ($sortDir == "ASC") {
                echo 'selected="selected"';
            } ?>><?= mi18n("SORT_ASC") ?></option>
            <option value="DESC" <?php if ($sortDir == "DESC") {
                echo 'selected="selected"';
            } ?>><?= mi18n("SORT_DESC") ?></option>
        </select>
    </div>

    <div class="form-group">
        <label for="delay_<?= $uuid ?>"><?= mi18n("DELAY") ?></label>
        <input id="delay_<?= $uuid ?>" name="CMS_VAR[3]" type="number" value="<?= $delay ?>"/>
    </div>
</div>
<?php
