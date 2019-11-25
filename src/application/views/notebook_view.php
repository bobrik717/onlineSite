<?php
    require_once(__DIR__.'/../plugins/recaptchalib.php');
    $publickey = PUBKEY;
?>
<div id="content">
    <?php echo $data['crumb']; ?>
    <div><?php if( isset($data['errorBD']) ){ echo $data['errorBD']; } ?></div>
    <div><?php if( isset($data['errorCaph']) ){ echo $data['errorCaph']; } ?></div>
    <form id="notebook" action="" method="post">
        <div class="row">
            <label for="title">TITLE</label>
            <input type="text" name="title" id="title" value="<?=$data['title']?>" />
        </div>
        <div class="row">
            <label for="text">TEXT</label>
            <textarea id="text" name="text"><?=$data['text']?></textarea>
        </div>
        <div class="row">
            <?=recaptcha_get_html($publickey);?>
            <input type="submit" id="submit" name="submit" value="Submit">
        </div>
    </form>
    <div class="all_notes">
        <?php foreach($data['notes'] as $notes): ?>
            <div class="notes">
                <span class="span_1"><?=$notes['title']?></span>
                <span class="span_2"><?=$notes['text']?></span>
                <span class="span_3"><?=$notes['date']?></span>
                <span class="span_4"><input type="checkbox" value="<?=$notes['id']?>" />DONE</span>
            </div>
        <?php endforeach ?>
        <button id="sendChecked" name="checkbox[]" onclick="checkNotes();">Отметить как выполненые,выбранные заметки</button>
        <pre>
            <?php //print_r($data['notes']); ?>
        </pre>
    </div>
</div>
