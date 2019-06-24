<?php $search_text = empty($_GET['s']) ? "Search" : get_search_query(); ?> 
<form method="get" class="search-widget" id="searchform" action="<?php bloginfo('home'); ?>/"> 
<input class="form-control"  type="text" value="<?php echo $search_text; ?>" 
	name="s" id="s"  onblur="if (this.value == '')  {this.value = '<?php echo $search_text; ?>';}"  
	onfocus="if (this.value == '<?php echo $search_text; ?>') {this.value = '';}" />
 <button type="submit"><i class="fa fa-search"></i></button>
</form>