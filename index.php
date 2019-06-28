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
<?php     $per_page = filter_input(INPUT_GET, 'perpage', FILTER_SANITIZE_NUMBER_INT);
    echo '<span class="pull-right"> Show items : ';
    echo '<select onchange="if (this.value) window.location.href=this.value">';
    $orderby_options = array(
        '4' => '4',
        '8' => '8',
        '12' => '12'
    );
    foreach( $orderby_options as $value => $label ) {
        echo "<option ".selected( $per_page, $value )." value='?perpage=$value'>$label items</option>";
    }
    echo '</select>';
    echo '</span>';
    ?>
</span>
</div>
</div>
</div>
<div class="space50"></div>
            
            <div id="isotope" class="isotope"> 
<?php
$meta_query  = WC()->query->get_meta_query();
$tax_query   = WC()->query->get_tax_query();
$tax_query[] = array(
    'taxonomy' => 'product_visibility',
    'field'    => 'name',
    'terms'    => 'featured',
    'operator' => 'IN',
);
 
$args = array(
    'post_type'           => 'product',
    'post_status'         => 'publish',
    'posts_per_page'      => (isset($per_page)?$per_page:8),
    'meta_query'          => $meta_query,
    'tax_query'           => $tax_query,
);
 
$featured_query = new WP_Query( $args );
     
if ($featured_query->have_posts()) {
 
    while ($featured_query->have_posts()) : 
        
        $featured_query->the_post();
        $newness_days = 7;
        $created = strtotime( $product->get_date_created() );
        $product = get_product( $featured_query->post->ID );
        $price = $product->get_price_html();
        $time = time() - ( 60 * 60 * 24 * $newness_days );

        $text = '';
        if($product->product_type != 'grouped'){
            $text .= '<span class="badge onsale">';

            $regular = $product->regular_price;
            $sale = $product->sale_price;

    if($product->product_type == 'variable') {
    $available_variations = $product->get_available_variations();
    $variation_id=$available_variations[0]['variation_id'];
    $variable_product1= new WC_Product_Variation( $variation_id );

    $regular_var = $variable_product1 ->regular_price;
    $sales_var = $variable_product1 ->sale_price;
    
        if(!empty($regular_var && $sales_var))
        {
            $discount = floor( ( ($regular_var - $sales_var) / $regular_var ) * 100 );
        }
    
        }elseif( !empty( $sale ) ) {

        if(!empty($regular && $sale))
        {
            $discount = floor( ( ($regular - $sale) / $regular ) * 100 );
        }
        }else{ $discount = 0; }
        }        
?>
                <div class="isotope-item clothing">
                    <div class="product-item">
                        <div class="item-thumb">
                            <?php

                               if ( $time < $created && !empty($discount)) {
                                echo '<div class="badge new">'.$discount.'% New</div>'; 
                            }elseif (!empty($discount)) {
                                echo '<div class="badge new">'.$discount.'%</div>';
                            }elseif ($time < $created) {
                                echo '<div class="badge new">New</div>';
                            }
                                    ?>      
                           <?php echo woocommerce_get_product_thumbnail(); ?>
                            
                        </div>
                        <div class="product-info">
                            <h4 class="product-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                            <span class="product-price"><?php echo $price;?></span> 
                        </div>
                    </div>
                </div>
<?php
         
         
    endwhile;
     
}
?>
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