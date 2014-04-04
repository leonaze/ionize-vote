<div class="divider">
    <a class="button light" id="newNameToolbarButton">
        <i class="icon-plus"></i><?php echo lang('module_vote_button_create_name'); ?>
    </a>
</div>
 
<script type="text/javascript">
 
    $('newNameToolbarButton').addEvent('click', function(e)
    {
        ION.formWindow(
            'name',
            'nameForm',
            Lang.get('module_vote_label_new_name'),
            admin_url + 'module/vote/name/create',
            {
               'width':350,
               'height':70
            }
        );
    });
 
</script>