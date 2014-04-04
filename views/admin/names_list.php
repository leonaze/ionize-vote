<ul class="namesPanelList list mb20 mt10">
 
    <?php foreach($names as $name) :?>
 
    <?php
    $id = $name['id_vote'];
    ?>
 
    <li class="name<?php echo $id ?> pointer" id="author_<?php echo $id ?>" data-id="<?php echo $id ?>">
        <a class="icon drag left"></a><!--<a class="icon delete right"></a>--><a class="icon edit right"></a>
        <a class="left pl5 edit title" data-id="<?php echo $id ?>">
            ID : <?php echo $id ?> - <?php echo $name['name'] ?>
        </a>
    </li>
 
    <?php endforeach ;?>
 
</ul>

<script type="text/javascript">
 
    // Click Event to display the details of one creator
    $$('.namesPanelList li').each(function(item, idx)
    {
        var id = item.getProperty('data-id');
        var a = item.getElement('a.title');
		var del = item.getElement('a.delete');
		var view = item.getElement('a.edit');
 
        a.removeEvents('click');
        a.addEvent('click', function(e)
        {
            // see : /themes/admin/javascript/ionize/ionize_window.js
            // ION.formWindow : function(id, form, title, wUrl, wOptions, data)
            ION.formWindow(
                    'name' + id, // ID of the window
                    'nameForm' + id, // ID of the author form
                    'module_vote_title_edit_name', // term of the window title
                    'module/vote/name/get/' + id, // URL of the controller
                    {
                        'width':350,
                        'height':70
                    }
            );
        });
		
		ION.initRequestEvent(
                del, // The item to add the event on
                admin_url + 'module/vote/name/delete/' + id, // URL to call
                {}, // Data to send. Here nothing.
                // Confirmation object
                {
                    'confirm': true,
                    'message': Lang.get('ionize_confirm_element_delete')
                }
        );
		
		view.addEvent('click', function(e)
        {
			
            // Update the results graph
			ION.HTML(
					'module/vote/view/results/' + id,      // URL to the controller
					{},                                 // Data send by POST. Nothing
					{'update':'moduleVoteResults'}  // JS request options
			);
		
        });
		
    });
 
</script>