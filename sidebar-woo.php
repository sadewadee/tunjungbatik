<aside class="col-md-3 col-md-pull-9">
<div class="side-widget space30">
    <h3>Search</h3>
<?php $search_text = empty($_GET['s']) ? "Search" : get_search_query(); ?> 
<!-- <form method="get" class="search-widget" id="searchform" action="<?php bloginfo('home'); ?>/"> 
<input class="form-control"  type="text" value="<?php echo $search_text; ?>" 
	name="s" id="s"  onblur="if (this.value == '')  {this.value = '<?php echo $search_text; ?>';}"  
	onfocus="if (this.value == '<?php echo $search_text; ?>') {this.value = '';}" />
 <button type="submit"><i class="fa fa-search"></i></button>
</form> -->
</div>
 <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebarwoo')): endif; ?>



<!--  <div class="side-widget space30 sidebar">
 <h3><span>Shop by</span></h3>
    <div id="gw-sidebar" class="gw-sidebar">
    <div class="nano-content">
      <ul class="gw-nav gw-nav-list">
        <li class="init-un-active"> <a href="javascript:void(0)"> <span class="gw-menu-text">Navigation Menu</span> </a> </li>
        <li class="init-arrow-down"> <a href="javascript:void(0)"> <span class="gw-menu-text">Category 1</span> <b class="gw-arrow"></b> </a>
          <ul class="gw-submenu">
            <li> <a href="javascript:void(0)">Menu 1</a> </li>
          </ul>
        </li>
        <li class="init-arrow-down"> <a href="javascript:void(0)"> <span class="gw-menu-text">Category 2</span> <b class="gw-arrow icon-arrow-up8"></b> </a>
          <ul class="gw-submenu">
            <li> <a href="javascript:void(0)">Menu 1</a> </li>
            <li> <a href="javascript:void(0)">Menu 2</a> </li>
            <li> <a href="javascript:void(0)">Menu 3</a> </li>
          </ul>
        </li>
        <li class="init-arrow-down"> <a href="javascript:void(0)"> <span class="gw-menu-text">Category 3</span> <b></b> </a>
          <ul class="gw-submenu">
            <li> <a href="javascript:void(0)">Menu 1</a> </li>
            <li> <a href="javascript:void(0)">Menu 2</a> </li>
            <li> <a href="javascript:void(0)">Menu 3</a> </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
   </div>  -->
</aside>