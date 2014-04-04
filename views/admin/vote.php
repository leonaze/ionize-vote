<div id="maincolumn">
 
    <h2 class="main vote"><?php echo lang('module_vote_title'); ?></h2>
 
    <div class="subtitle">
 
        <!-- About this module -->
        <p class="lite">
            <?php echo lang('module_vote_about'); ?>
        </p>
    </div>
	
	<div id="moduleVoteNamesList"></div>
	
	<div id="moduleVoteResults"></div>
	
</div>
 
<script type="text/javascript">
 
    // Init the panel toolbox is mandatory
    ION.initModuleToolbox('vote','vote_toolbox');
	
	// Update the authors list
    ION.HTML(
            'module/vote/name/get_list',      // URL to the controller
            {},                                 // Data send by POST. Nothing
            {'update':'moduleVoteNamesList'}  // JS request options
    );
 
</script>