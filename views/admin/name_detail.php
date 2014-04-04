<?php
    $id = $id_vote;
?>
 
<form name="nameForm<?php echo $id ?>" id="nameForm<?php echo $id ?>" action="<?php echo admin_url() ?>module/vote/name/save">
 
    <!-- Hidden fields -->
    <input id="id_vote<?php echo $id ?>" name="id_vote" type="hidden" value="<?php echo $id ?>" />
 
    <!-- Name -->
    <dl class="small">
        <dt>
            <label for="name<?php echo $id ?>"><?php echo lang('ionize_label_name')?></label>
        </dt>
        <dd>
            <input id="name<?php echo $id ?>" name="name" class="inputtext required" type="text" value="<?php echo $name ?>" data-validators="required"/>
        </dd>
    </dl>
 
</form>
 
<!-- Save / Cancel buttons
   Must be named bSave[windows_id] where 'window_id' is the used ID
   or the window opening through ION.formWindow()
-->
<div class="buttons">
    <button id="bSavename<?php echo $id ?>" type="button" class="button yes right"><?php echo lang('ionize_button_save_close') ?></button>
    <button id="bCancelname<?php echo $id ?>"  type="button" class="button no right"><?php echo lang('ionize_button_cancel') ?></button>
</div>
 
<script type="text/javascript">
 
</script>