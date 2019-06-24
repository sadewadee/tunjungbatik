<?php

	/* Template Name: Woo List */

?>

<?php get_header(); ?>
<div class="space60"></div>
<!-- BLOG CONTENT -->
<div class="blog-content">
<div class="container">
<div class="row">
	<!--?php get_sidebar(); ?-->
     
    <div class="col-md-9 col-md-push-3 blog-content">
<!-- BREADCRUMBS -->
<div class="bcrumbs">
       <?php the_breadcrumb(); ?>
</div>

<h2 class="post-title"><?php the_title(); ?></h2>  
<div class="space30"></div>

<div class="filter-wrap">
    <div class="row">
        <div class="col-md-3 col-sm-3">
            View as: <span><a class="active">Grid</a> / <a href="./categories-list.html">List</a></span>
        </div>
        <div class="col-md-5 col-sm-5">
            Sort by:
            <select>
                <option>Default</option>
                <option>Newest</option>
                <option>Popular</option>
                <option>Recently Sold</option>
            </select>
        </div>
        <div class="col-md-4 col-sm-4">
            <span class="pull-right">
                Show:
                <select>
                    <option>9 items</option>
                    <option>18 items</option>
                    <option>27 items</option>
                    <option>50 items</option>
                </select>
            </span>
        </div>
    </div>
</div>
                            
<div class="space30"></div>
<div class="row">
    <div class="col-md-4 col-sm-6">
        <div class="product-item">
            <div class="item-thumb">
                <span class="badge new">New</span>
                <img src="<?php bloginfo("template_url"); ?>/images/products/fashion/9.jpg" class="img-responsive" alt=""/>   
            </div>
            <div class="product-info">
                <h4 class="product-title"><a href="./single-product.html">Product fashion</a></h4>
                <span class="product-price">$99.00 <em>- Pre order</em></span>
              
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-6">
        <div class="product-item">
            <div class="item-thumb">
                <img src="<?php bloginfo("template_url"); ?>/images/products/fashion/9.jpg" class="img-responsive" alt=""/>
            
            </div>
            <div class="product-info">
                <h4 class="product-title"><a href="./single-product.html">Product fashion</a></h4>
                <span class="product-price">$99.00 <em>- Pre order</em></span>
               
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-6">
        <div class="product-item">
            <div class="item-thumb">
                <span class="badge offer">-50%</span>
                <img src="<?php bloginfo("template_url"); ?>/images/products/fashion/9.jpg" class="img-responsive" alt=""/>
               
            </div>
            <div class="product-info">
                <h4 class="product-title"><a href="./single-product.html">Product fashion</a></h4>
                <span class="product-price">$99.00 <em>- Pre order</em></span>
               
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-6">
        <div class="product-item">
            <div class="item-thumb">
                <img src="<?php bloginfo("template_url"); ?>/images/products/fashion/9.jpg" class="img-responsive" alt=""/>
              
            </div>
            <div class="product-info">
                <h4 class="product-title"><a href="./single-product.html">Product fashion</a></h4>
                <span class="product-price">$99.00 <em>- Pre order</em></span>
              
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-6">
        <div class="product-item">
            <div class="item-thumb">
              <img src="<?php bloginfo("template_url"); ?>/images/products/fashion/9.jpg" class="img-responsive" alt=""/>
              
            </div>
            <div class="product-info">
                <h4 class="product-title"><a href="./single-product.html">Product fashion</a></h4>
                <span class="product-price">$99.00 <em>- Pre order</em></span>
               
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-6">
        <div class="product-item">
            <div class="item-thumb">
                <img src="<?php bloginfo("template_url"); ?>/images/products/fashion/9.jpg" class="img-responsive" alt=""/>
                <div class="overlay-rmore fa fa-search quickview" data-toggle="modal" data-target="#myModal"></div>
               
            </div>
            <div class="product-info">
                <h4 class="product-title"><a href="./single-product.html">Product fashion</a></h4>
                <span class="product-price">$99.00 <em>- Pre order</em></span>
               
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-6">
        <div class="product-item">
            <div class="item-thumb">
               <img src="<?php bloginfo("template_url"); ?>/images/products/fashion/9.jpg" class="img-responsive" alt=""/>
               
            </div>
            <div class="product-info">
                <h4 class="product-title"><a href="./single-product.html">Product fashion</a></h4>
                <span class="product-price">$99.00 <em>- Pre order</em></span>
               
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-6">
        <div class="product-item">
            <div class="item-thumb">
               <img src="<?php bloginfo("template_url"); ?>/images/products/fashion/9.jpg" class="img-responsive" alt=""/>
               
            </div>
            <div class="product-info">
                <h4 class="product-title"><a href="./single-product.html">Product fashion</a></h4>
                <span class="product-price">$99.00 <em>- Pre order</em></span>
               
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-6">
        <div class="product-item">
            <div class="item-thumb">
                 <img src="<?php bloginfo("template_url"); ?>/images/products/fashion/9.jpg" class="img-responsive" alt=""/>
               
            </div>
            <div class="product-info">
                <h4 class="product-title"><a href="./single-product.html">Product fashion</a></h4>
                <span class="product-price">$99.00 <em>- Pre order</em></span>
              
            </div>
        </div>
    </div>
</div>
                            <div class="pagenav-wrap">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        Results: <span>1 - 9 of 86 items</span>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="pull-right">
                                            <em>Page:</em>
                                            <ul class="page_nav">
                                                <li><a href="#">1</a></li>
                                                <li><a href="#">2</a></li>
                                                <li><a href="#">3</a></li>
                                                <li><a href="#">4</a></li>
                                                <li><a href="#">5</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
    <div class="space30"></div>
    </div>
    <?php include_once('sidebar-woo.php'); ?> 
</div>
</div>
</div>
<div class="clearfix space60"></div>
<?php get_footer(); ?>