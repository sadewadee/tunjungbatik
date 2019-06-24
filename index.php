<?php get_header(); ?>
<?php include_once('inc/slider.php'); ?>
<div class="f-categories">
<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12">
		<?php
        $the_query = new WP_Query( array( 'page_id' => 13 ) );
        if ( $the_query->have_posts() ) {
        while ( $the_query->have_posts() ) {
        $the_query->the_post();
        ?>  
            <div class="heading-sub text-center">
                <h1 class="title space20"><?php the_title(); ?></h1>
                <?php the_content(); ?>
            </div> 
        <?php }} else { }?> 
        </div>
    </div>
</div>
</div>


<!-- FEATURED PRODUCTS -->
<div class="featured-products">
    <div class="container">
        <div class="row">
            <h2 class="heading title  text-center space20">Featured Products</h2>
            <hr />
            
<div class="filter-wrap">
<div class="row">
<div class="col-md-3 col-sm-3">
View as: <span><a href="./categories-grid.html">Grid</a> / <a class="active">List</a></span>
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
<div class="space50"></div>
            
            <div id="isotope" class="isotope">
                <div class="isotope-item clothing">
                    <div class="product-item">
                        <div class="item-thumb">
                            <div class="badge new">New</div>
                           <img src="<?php bloginfo("template_url"); ?>/images/products/fashion/9.jpg" class="img-responsive" alt=""/>
                            
                        </div>
                        <div class="product-info">
                            <h4 class="product-title"><a href="./single-product.html">Product fashion</a></h4>
                            <span class="product-price">$99.00 </span>     
                        </div>
                    </div>
                </div>
                <div class="isotope-item clothing">
                    <div class="product-item">
                        <div class="item-thumb">
                            <img src="<?php bloginfo("template_url"); ?>/images/products/fashion/9.jpg" class="img-responsive" alt=""/>
                           
                        </div>
                        <div class="product-info">
                            <h4 class="product-title"><a href="./single-product.html">Product fashion</a></h4>
                            <span class="product-price">$99.00</span>
                            
                        </div>
                    </div>
                </div>
                <div class="isotope-item clothing">
                    <div class="product-item">
                        <div class="item-thumb">
                            <div class="badge offer">-50%</div>
                           <img src="<?php bloginfo("template_url"); ?>/images/products/fashion/9.jpg" class="img-responsive" alt=""/>
                           
                        </div>
                        <div class="product-info">
                            <h4 class="product-title"><a href="./single-product.html">Product fashion</a></h4>
                            <span class="product-price"><small class="cutprice">$200.00</small> $99.00 </span>
                         
                        </div>
                    </div>
                </div>
                <div class="isotope-item accessories shoes">
                    <div class="product-item">
                        <div class="item-thumb">
                           <img src="<?php bloginfo("template_url"); ?>/images/products/fashion/9.jpg" class="img-responsive" alt=""/>
                        </div>
                        <div class="product-info">
                            <h4 class="product-title"><a href="./single-product.html">Product fashion</a></h4>
                            <span class="product-price">$99.00 </span>
                           
                        </div>
                    </div>
                </div>
                <div class="isotope-item clothing">
                    <div class="product-item">
                        <div class="item-thumb">
                           <img src="<?php bloginfo("template_url"); ?>/images/products/fashion/9.jpg" class="img-responsive" alt=""/>
                        </div>
                        <div class="product-info">
                            <h4 class="product-title"><a href="./single-product.html">Product fashion</a></h4>
                            <span class="product-price">$99.00 </span>
                          
                        </div>
                    </div>
                </div>
                <div class="isotope-item accessories shoes">
                    <div class="product-item">
                        <div class="item-thumb">
                           <img src="<?php bloginfo("template_url"); ?>/images/products/fashion/9.jpg" class="img-responsive" alt=""/>
                           
                        </div>
                        <div class="product-info">
                            <h4 class="product-title"><a href="./single-product.html">Product fashion</a></h4>
                            <span class="product-price">$99.00 </span>
                            
                        </div>
                    </div>
                </div>
                <div class="isotope-item clothing">
                    <div class="product-item">
                        <div class="item-thumb">
                            <img src="<?php bloginfo("template_url"); ?>/images/products/fashion/9.jpg" class="img-responsive" alt=""/>
                           
                        </div>
                        <div class="product-info">
                            <h4 class="product-title"><a href="./single-product.html">Product fashion</a></h4>
                            <span class="product-price"><small class="cutprice">$200.00</small> $99.00 </span>
                           
                        </div>
                    </div>
                </div>
                <div class="isotope-item accessories handbags">
                    <div class="product-item">
                        <div class="item-thumb">
                          <img src="<?php bloginfo("template_url"); ?>/images/products/fashion/9.jpg" class="img-responsive" alt=""/>
                            
                        </div>
                        <div class="product-info">
                            <h4 class="product-title"><a href="./single-product.html">Product fashion</a></h4>
                            <span class="product-price">$99.00 </span>
                           
                        </div>
                    </div>
                </div>

            </div>
            
            
            
<div class="pagenav-wrap">   
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
    </div>
</div>

           
            <div class="space30 clearfix"></div>
  

<?php get_footer(); ?>