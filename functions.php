<?php
/*=============================================
=            BREADCRUMBS			            =
=============================================*/
//  to include in functions.php
function the_breadcrumb() {
    $sep = ' / ';
    if (!is_front_page()) {

	// Start the breadcrumb with a link to your homepage
        echo '<div class="breadcrumbs">';
        echo '<a href="';
        echo get_option('<i class="fa fa-home" aria-hidden="true"></i> home');
        echo '">';
        bloginfo('name');
        echo '</a>' . $sep;

	// Check if the current page is a category, an archive or a single page. If so show the category or archive name.
        if (is_category() || is_single() ){
            the_category(' / ');
        } elseif (is_archive() || is_single()){
            if ( is_day() ) {
                printf( __( '%s', 'text_domain' ), get_the_date() );
            } elseif ( is_month() ) {
                printf( __( '%s', 'text_domain' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'text_domain' ) ) );
            } elseif ( is_year() ) {
                printf( __( '%s', 'text_domain' ), get_the_date( _x( 'Y', 'yearly archives date format', 'text_domain' ) ) );
            } else {
                _e( 'Blog Archives', 'text_domain' );
            }
        }

	// If the current page is a single post, show its title with the separator
        if (is_single()) {
            echo $sep;
            the_title();
        }

	// If the current page is a static page, show its title.
        if (is_page()) {
            echo the_title();
        }

	// if you have a static page assigned to be you posts list page. It will find the title of the static page and display it. i.e Home >> Blog
        if (is_home()){
            global $post;
            $page_for_posts_id = get_option('page_for_posts');
            if ( $page_for_posts_id ) {
                $post = get_page($page_for_posts_id);
                setup_postdata($post);
                the_title();
                rewind_posts();
            }
        }
        echo '</div>';
    }
}
/*#BREADCRUMBS	*/




if ( ! function_exists( 'ultrabootstrap_setup' ) ) :
function ultrabootstrap_setup() {
	load_theme_textdomain( 'ultrabootstrap', get_template_directory() . '/languages' );
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'ultrabootstrap' ),
		'shop' => esc_html__( 'Shop Menu', 'ultrabootstrap' ),
		'secondary' => esc_html__( 'Top Menu', 'ultrabootstrap' ),
		'blog' => esc_html__( 'Blog Category', 'ultrabootstrap' ),
		'mobile' => esc_html__( 'Mobile Menu', 'ultrabootstrap' ),
	));

	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	));

	add_theme_support( 'custom-logo', array(
   'height'      => 45,
   'width'       => 250,
   'flex-width' => true,
	));
}
endif; // ultrabootstrap_setup
add_action( 'after_setup_theme', 'ultrabootstrap_setup' );

function create_post_type(){
register_post_type('slideshow_home',array('labels'=>array('name'=>__('Slideshow Home'),
'singular_name'=>__('Slideshow Home'),
'all_items'=>__('All Slideshow Home','text_domain'),
'add_new'=>'Add New Slideshow Home','add_new_item'=>'Add New Slideshow Home','show_ui'=>'true','hierarchical'=>'true',),
'public'=>true,'has_archive'=>true,'rewrite'=>array('slug'=>'slideshow_home'),
'supports'=>array('title','editor','author','thumbnail','excerpt','post-formats','page-attributes'),'menu_icon'=>'dashicons-format-image'));
}
add_action('init','create_post_type');




if ( ! isset( $content_width ) ) $content_width = 900;
function ultrabootstrap_content_width() {$GLOBALS['content_width'] = apply_filters( 'ultrabootstrap_content_width', 640 );}
add_action( 'after_setup_theme', 'ultrabootstrap_content_width', 0 );
function ultrabootstrap_filter_front_page_template( $template ) { return is_home() ? '' : $template;}
add_filter( 'front_page_template', 'ultrabootstrap_filter_front_page_template' );

function ultrabootstrap_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'ultrabootstrap' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<div class="side-widget space30 sidebar">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
			'name'          => __('Contact','ultrabootstrap'),
			'id'            => 'contact',
			'description'   => __('Contact Widget','ultrabootstrap'),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<h2>',
			'after_title'   => '</h2>',
	) );
	register_sidebar( array(
			'name'          => __('Icons There','ultrabootstrap'),
			'id'            => 'icons',
			'description'   => __('Icons Widget','ultrabootstrap'),
			'before_widget' => '<div class="socialx">',
			'after_widget'  => '</div>',
			'before_title'  => '',
			'after_title'   => '',
		) );
	register_sidebar( array(
			'name'          => __('Sidebar Woo','ultrabootstrap'),
			'id'            => 'sidebarwoo',
			'description'   => '',
		'before_widget' => '<div class="side-widget space30 sidebar">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
		) );
	register_sidebar( array(
		'name'          => __('Address','ultrabootstrap'),
		'id'            => 'address',
		'description'   => __('Address Widget','ultrabootstrap'),
		'before_widget' => '',
		'after_widget'  => ' ',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
	register_sidebar( array(
		'name'          => __('Footer','ultrabootstrap'),
		'id'            => 'footer',
		'description'   => __('Footer Widget','ultrabootstrap'),
		'before_widget' => '<div class="col-md-4 widget-footer col-sm-4">',
		'after_widget'  => '<div class="clearfix"></div></div> ',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
}
add_action( 'widgets_init', 'ultrabootstrap_widgets_init' );



/**
 * Custom woo fucntions.
 */
require get_template_directory() . '/inc/woo-extras.php';
/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/class.php';
require get_template_directory() . '/inc/wp_bootstrap_navwalker.php';
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';
/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';
/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
*/
require get_template_directory() . '/inc/customizer.php';
/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';



/**
 * Customized menu output
 */
// Variable & intelligent excerpt length.
function print_excerpt($length) { // Max excerpt length. Length is set in characters
	global $post;
	$text = $post->post_excerpt;
	if ( '' == $text ) {
		$text = get_the_content('');
		$text = apply_filters('the_content', $text);
		$text = str_replace(']]>', ']]>', $text);
	}
	$text = strip_shortcodes($text); // optional, recommended
	$text = strip_tags($text); // use ' $text = strip_tags($text,'<p><a>'); ' if you want to keep some tags
	$text = substr($text,0,$length);
	$excerpt = reverse_strrchr($text, '.', 1);
	if( $excerpt ) {
		echo apply_filters('the_excerpt',$excerpt);
	} else {
		echo apply_filters('the_excerpt',$text);
	}
}



// Returns the portion of haystack which goes until the last occurrence of needle
function reverse_strrchr($haystack, $needle, $trail) {
    return strrpos($haystack, $needle) ? substr($haystack, 0, strrpos($haystack, $needle) + $trail) : false;
}




function mytheme_comment($comment, $args, $depth) {
    if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }
    ?>

    <?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
       <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
    <?php endif; ?>
    <div class="comment-author vcard">
        <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
        <?php printf( __( '<cite class="fn">%s</cite> <span class="says">says:</span>' ), get_comment_author_link() ); ?>
    </div>
    <?php if ( $comment->comment_approved == '0' ) : ?>
         <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em>
          <br />
    <?php endif; ?>
    <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
        <?php
        /* translators: 1: date, 2: time */
        printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)' ), '  ', '' );
        ?>
    </div>
    <?php comment_text(); ?>
    <div class="reply">
        <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
    </div>
    <?php if ( 'div' != $args['style'] ) : ?>
    </div>
    <?php endif; ?>
    <?php
}





// custom admin login logo
function custom_login_logo() {
	echo '<style type="text/css" class="logooo">
	h1 a { background-image: url('.get_bloginfo('template_directory').'/images/login.png)!important; background-size:100%!important; width: auto!important;}
	</style>';
}
add_action('login_head', 'custom_login_logo');


//icon dasboard//
function wps_admin_bar() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('about');
    $wp_admin_bar->remove_menu('wporg');
    $wp_admin_bar->remove_menu('documentation');
    $wp_admin_bar->remove_menu('support-forums');
    $wp_admin_bar->remove_menu('feedback');
    //bagian menambahkan link
        $wp_admin_bar->add_menu( array(
            'id'    => 'wp-logo',
            'title' => '<img src=" '.get_bloginfo('template_directory').'/panel/images/themeoptions-icon.png" width="15" height="10" />',
            'href'  => self_admin_url( '' ),
            'meta'  => array(
                'title' => __('Tatepo'),
            ),
        ) );
}
add_action( 'wp_before_admin_bar_render', 'wps_admin_bar' );


// pagenav 1 2 3
function wp_pagenavi($before = '', $after = '') {
global $wpdb, $wp_query;
if (is_single())
return;
$pagenavi_options = array();
$pagenavi_options['pages_text'] = __('Page %CURRENT_PAGE% of %TOTAL_PAGES%');
$pagenavi_options['current_text'] = '%PAGE_NUMBER%';
$pagenavi_options['page_text'] = '%PAGE_NUMBER%';
$pagenavi_options['first_text'] = __('<< First');
$pagenavi_options['last_text'] = __('Last >>');
$pagenavi_options['next_text'] = __('>');
$pagenavi_options['prev_text'] = __('<');
$pagenavi_options['dotright_text'] = __('...');
$pagenavi_options['dotleft_text'] = __('...');
$pagenavi_options['style'] = 1;
$pagenavi_options['num_pages'] = 5;
$pagenavi_options['always_show'] = 0;
$request = $wp_query->request;
$posts_per_page = intval(get_query_var('posts_per_page'));
$paged = intval(get_query_var('paged'));
$numposts = $wp_query->found_posts;
$max_page = intval($wp_query->max_num_pages);

if (empty($paged) || $paged == 0)
$paged = 1;
$pages_to_show = intval($pagenavi_options['num_pages']);
$larger_page_to_show = intval($pagenavi_options['num_larger_page_numbers']);
$larger_page_multiple = intval($pagenavi_options['larger_page_numbers_multiple']);
$pages_to_show_minus_1 = $pages_to_show - 1;
$half_page_start = floor($pages_to_show_minus_1/2);
$half_page_end = ceil($pages_to_show_minus_1/2);
$start_page = $paged - $half_page_start;

if ($start_page <= 0)
$start_page = 1;
$end_page = $paged + $half_page_end;
if (($end_page - $start_page) != $pages_to_show_minus_1) {
$end_page = $start_page + $pages_to_show_minus_1;
}
if ($end_page > $max_page) {
$start_page = $max_page - $pages_to_show_minus_1;
$end_page = $max_page;
}

if ($start_page <= 0)
$start_page = 1;
$larger_pages_array = array();
if ( $larger_page_multiple )
for ( $i = $larger_page_multiple; $i <= $max_page; $i += $larger_page_multiple )
$larger_pages_array[] = $i;

if ($max_page > 1 || intval($pagenavi_options['always_show'])) {
// $pages_text = str_replace("%CURRENT_PAGE%", number_format_i18n($paged), $pagenavi_options['pages_text']);
	$pages_text = str_replace("%CURRENT_PAGE%", number_format_i18n($paged));
$pages_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pages_text);
echo $before.'<div class="wp-pagenavi" style="text-align: center;">'."\n";
switch(intval($pagenavi_options['style'])) {

// Normal
case 1:
if (!empty($pages_text)) {
echo '<span class="pages">'.$pages_text.'</span>';
}

if ($start_page >= 2 && $pages_to_show < $max_page) {
$first_page_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pagenavi_options['first_text']);
echo '<a href="'.clean_url(get_pagenum_link()).'" class="first" title="'.$first_page_text.'">'.$first_page_text.'</a>';
if (!empty($pagenavi_options['dotleft_text'])) {
echo '<span class="extend">'.$pagenavi_options['dotleft_text'].'</span>';
}}
$larger_page_start = 0;
foreach($larger_pages_array as $larger_page) {
if ($larger_page < $start_page && $larger_page_start < $larger_page_to_show) {
$page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($larger_page), $pagenavi_options['page_text']);
echo '<a href="'.clean_url(get_pagenum_link($larger_page)).'" class="page" title="'.$page_text.'">'.$page_text.'</a>';
$larger_page_start++;
}}

previous_posts_link($pagenavi_options['prev_text']);
for($i = $start_page; $i <= $end_page; $i++) {

if ($i == $paged) {
$current_page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['current_text']);
echo '<span class="current">'.$current_page_text.'</span>';
} else {
$page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['page_text']);
echo '<a href="'.clean_url(get_pagenum_link($i)).'" class="page" title="'.$page_text.'">'.$page_text.'</a>';
}}
next_posts_link($pagenavi_options['next_text'], $max_page);
$larger_page_end = 0;
foreach($larger_pages_array as $larger_page) {
if ($larger_page > $end_page && $larger_page_end < $larger_page_to_show) {
$page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($larger_page), $pagenavi_options['page_text']);
echo '<a href="'.clean_url(get_pagenum_link($larger_page)).'" class="page" title="'.$page_text.'">'.$page_text.'</a>';
$larger_page_end++;
}}
if ($end_page < $max_page) {
if (!empty($pagenavi_options['dotright_text'])) {
echo '<span class="extend">'.$pagenavi_options['dotright_text'].'</span>';
}
$last_page_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pagenavi_options['last_text']);
echo '<a href="'.clean_url(get_pagenum_link($max_page)).'" class="last" title="'.$last_page_text.'">'.$last_page_text.'</a>';
}
break;

// Dropdown
case 2;
echo '<form action="'.htmlspecialchars($_SERVER['PHP_SELF']).'" method="get">'."\n";
echo '<select size="1" onchange="document.location.href = this.options[this.selectedIndex].value;">'."\n";
for($i = 1; $i <= $max_page; $i++) {
$page_num = $i;
if ($page_num == 1) {
$page_num = 0;
}

if ($i == $paged) {
$current_page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['current_text']);
echo '<option value="'.clean_url(get_pagenum_link($page_num)).'" selected="selected" class="current">'.$current_page_text."</option>\n";
} else {
$page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['page_text']);
echo '<option value="'.clean_url(get_pagenum_link($page_num)).'">'.$page_text."</option>\n";
}}
echo "</select>\n";
echo "</form>\n";
break;}
echo '</div>'.$after;
}}

// Exclude page from search
function SearchFilter($query) {
if ($query->is_search) {
$query->set('post_type',  array( 'post', 'reviews'));
}
return $query;
}
//add_filter('pre_get_posts','SearchFilter');

// Add post thumbnail functionality
if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support('post-thumbnails', array('post','reviews'));
	add_image_size('review-thumb', 140, 140, true);
	add_image_size('big-post-thumb', 300, 190, true);
	add_image_size('small-post-thumb', 120, 120, true);
	add_image_size('related-thumb', 300, 190, true);
	add_image_size('big-nivo-thumb', 1200, 400, true);
	add_image_size('shop_catalog_thumb', 250, 340, true);
	add_image_size('featured-thumb', 620, 450, true);
	add_image_size('full-featured-thumb', 1000, 500, true);
	add_image_size('blog1-thumb', 300, 190, true);
	add_image_size('slideshow_home',1280,600,true);
	add_image_size('post-thumbnails',500,350,true);

}


// Widgets
include_once('panel/widgets/social-widget.php');
include_once('panel/widgets/search-widget.php');
include_once('panel/widgets/facebook-like-widget.php');
include_once('panel/widgets/recent-posts-widget.php');
include_once('panel/widgets/recent-posts-text.php');

// UI Panel Options
include_once('panel/panel-options.php');
// Include reedwan framework file for the Koran Renon theme panel
include_once('panel/framework.php');
// Translation
load_theme_textdomain('reedwan', get_template_directory() . '/languages');

// Adds RSS feeds link
if(!get_option('reedwan_feedburner')) {
	add_theme_support('automatic-feed-links');
}

// How comments are displayed
function reedwan_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
		<div class="the-comment">
			<div class="alignleft">
				<?php echo get_avatar($comment,$size='70'); ?>
				<div class="clear"></div>
				<div class="reply-comment"><?php comment_reply_link(array_merge( $args, array('reply_text' => 'Reply', 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?></div>
			</div>
			<div class="comment-box">
				<div class="comment-author">
					<span class="name"><?php echo get_comment_author_link() ?></span>
					<small><?php printf(__('%1$s at %2$s', 'DF'), get_comment_date(),  get_comment_time()) ?><a><?php edit_comment_link(__(' Edit','DF')) ?></a></small>
				</div>
				<div class="comment-text">
					<?php if ($comment->comment_approved == '0') : ?>
					<em><?php _e('Your comment is awaiting moderation.', 'DF') ?></em>
					<br />
					<?php endif; ?>
					<?php comment_text() ?>
				</div>
                </div>
		</div>

<?php }


// Related Post..//
function get_related_posts($post_id, $tags = array()) {
	$query = new WP_Query();
	$post_types = get_post_types();
	unset($post_types['page'], $post_types['attachment'], $post_types['revision'], $post_types['nav_menu_item']);
	if($tags) {

		foreach($tags as $tag) {

			$tagsA[] = $tag->term_id;

		}

	}

	$query = new WP_Query( array('showposts' => 4,'post_type' => $post_types,'post__not_in' => array($post_id),'tag__in' => $tagsA,'ignore_sticky_posts' => 1,

	));

  	return $query;

}



// Kresi Pagination

function kriesi_pagination($pages = '', $range = 2)

{

     $showitems = ($range * 2)+1;



     global $paged;

     if(empty($paged)) $paged = 1;



     if($pages == '')

     {

         global $wp_query;

         $pages = $wp_query->max_num_pages;

         if(!$pages)

         {

             $pages = 1;

         }

     }



     if(1 != $pages)

     {

         echo "<div class='pagination'>";

         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'><span class='arrows'>&laquo;</span> First</a>";

         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'><span class='arrows'>&lsaquo;</span> Previous</a>";



         for ($i=1; $i <= $pages; $i++)

         {

             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))

             {

                 echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";

             }

         }



         if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'>Next <span class='arrows'>&rsaquo;</span></a>";

         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last <span class='arrows'>&raquo;</span></a>";

         echo "</div>\n";

     }

}



// Limit Word

function string_limit_words($string, $word_limit)

{

	$words = explode(' ', $string, ($word_limit + 1));



	if(count($words) > $word_limit) {

		array_pop($words);

	}



	return implode(' ', $words);

}

//Product Cat Create page
function wh_taxonomy_add_new_meta_field() {
    ?>
    <div class="form-field">
        <label for="wh_meta_title"><?php _e('Category Tagline', 'wh'); ?></label>
        <input type="text" name="wh_meta_title" id="wh_meta_title">
        <p class="description"><?php _e('Enter a meta title, <= 60 character', 'wh'); ?></p>
    </div>
    <?php
}



//Product Cat Edit page
function wh_taxonomy_edit_meta_field($term) {
    //getting term ID
    $term_id = $term->term_id;
    // retrieve the existing value(s) for this meta field.
    $wh_meta_title = get_term_meta($term_id, 'wh_meta_title', true);
    ?>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="wh_meta_title"><?php _e('Category Tagline', 'wh'); ?></label></th>
        <td>
            <input type="text" name="wh_meta_title" id="wh_meta_title" value="<?php echo esc_attr($wh_meta_title) ? esc_attr($wh_meta_title) : ''; ?>">
            <p class="description"><?php _e('Enter a meta title, <= 60 character', 'wh'); ?></p>
        </td>
    </tr>
    <?php
}
add_action('product_cat_add_form_fields', 'wh_taxonomy_add_new_meta_field', 10, 1);
add_action('product_cat_edit_form_fields', 'wh_taxonomy_edit_meta_field', 10, 1);

// Save extra taxonomy fields callback function.

function wh_save_taxonomy_custom_meta($term_id) {
    $wh_meta_title = filter_input(INPUT_POST, 'wh_meta_title');
    update_term_meta($term_id, 'wh_meta_title', $wh_meta_title);
}

add_action('edited_product_cat', 'wh_save_taxonomy_custom_meta', 10, 1);
add_action('create_product_cat', 'wh_save_taxonomy_custom_meta', 10, 1);

function show_pro($ids){
    $prod_categories = get_terms( array(
    'taxonomy' => 'product_cat',
    'term_taxonomy_id' => $ids,
    'orderby' => 'id',
    'order' => 'DESC',
) );

    foreach( $prod_categories as $prod_cat ) :

        $cat_thumb_id = get_woocommerce_term_meta( $prod_cat->term_id, 'thumbnail_id', true );

        $cat_thumb_url = wp_get_attachment_thumb_url( $cat_thumb_id );

        $term_link = get_term_link( $prod_cat, 'product_cat' );

        $catTagline = get_term_meta($prod_cat->term_id, 'wh_meta_title', true);

        $description= $prod_cat->description;



?>





            <div class="product-category">

              <div class="product-category-thumbnail">

                <a href="#"> <img class="thumbnail-list" src="<?php echo $cat_thumb_url; ?>" /></a>

              </div>

              <h2 class="product-category-title"><a href="<?php echo $term_link; ?>"><?php echo $prod_cat->name; ?></a></h2>

            </div>

<?php endforeach; wp_reset_query(); ?>



<?php

}

function show_cat(){



$args = array(

    'number'     => $number,

    'orderby'    => 'title',

    'order'      => 'ASC',

    'hide_empty' => $hide_empty,

    'include'    => $ids,

    'parent'	 => 0

);

$product_categories = get_terms( 'product_cat', $args );

$count = count($product_categories);

if ( $count > 0 ){

    foreach ( $product_categories as $prod_cat ) {

        $thumbnail_id = get_woocommerce_term_meta( $prod_cat->term_id, 'thumbnail_id', true );

        $img = wp_get_attachment_image( $thumbnail_id, $image_size = 'shop_thumbnail', false,

        array(

          'class'=>'img-responsive'

          ));

        $img_holder=wc_placeholder_img_src(  $size = 'shop_thumbnail' );

        ?>

    <div class="item">

     <div class="product-category">



        <div class="product-category-thumbnail">

        	<?php if(!empty($img)) { ?>

			<a href="<?php echo get_category_link( $prod_cat->term_id ); ?>"><?php echo $img; ?></a>

        	<?php } else {?>

            <a href="<?php echo get_category_link( $prod_cat->term_id ); ?>"><img src="<?php echo $img_holder;?>"></a>

            <?php } ?>

              </div>

              <div>

              <h3 class="product-category-title"><a href="<?php echo get_category_link( $prod_cat->term_id ); ?>"><?php echo $prod_cat->name; ?></a></h3>

              </div>

            </div>

    </div>

        <?php

    }

}

}



/**

 * Place a cart icon with number of items and total cost in the menu bar.

 *

 * Source: http://wordpress.org/plugins/woocommerce-menu-bar-cart/

 */

add_filter('wp_nav_menu_items','sk_wcmenucart', 10, 2);

function sk_wcmenucart($menu, $args) {



	// Check if WooCommerce is active and add a new item to a menu assigned to Primary Navigation Menu location

	if ( !in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) || 'shop' !== $args->theme_location )

		return $menu;



	ob_start();

		global $woocommerce;

		$viewing_cart = __('View your shopping cart', 'your-theme-slug');

		$start_shopping = __('Start shopping', 'your-theme-slug');

		$cart_url = $woocommerce->cart->get_cart_url();

		$shop_page_url = get_permalink( woocommerce_get_page_id( 'shop' ) );

		$cart_contents_count = $woocommerce->cart->cart_contents_count;

		$cart_contents = sprintf(_n('%d item', '%d items', $cart_contents_count, 'your-theme-slug'), $cart_contents_count);

		$cart_total = $woocommerce->cart->get_cart_total();

		// Uncomment the line below to hide nav menu cart item when there are no items in the cart

		// if ( $cart_contents_count > 0 ) {

			if ($cart_contents_count == 0) {

				//$menu_item = '<li class="right"><a class="wcmenucart-contents" href="'. $shop_page_url .'" title="'. $start_shopping .'">';
				$menu_item = '<li class="right"><a class="wcmenucart-contents" href="'. $cart_url .'" title="'. $start_shopping .'">';

			} else {

				$menu_item = '<li class="right"><a class="wcmenucart-contents" href="'. $cart_url .'" title="'. $viewing_cart .'">';

			}



			$menu_item .= '<i class="fa fa-shopping-cart"></i> ';



			$menu_item .= $cart_contents;

			//$menu_item .= $cart_contents.' - '. $cart_total;

			$menu_item .= '</li></a>';

		// Uncomment the line below to hide nav menu cart item when there are no items in the cart

		// }

		echo $menu_item;

	$social = ob_get_clean();

	return $menu . $social;



}

if (!function_exists('woocommerce_template_loop_add_to_cart')) {
	function woocommerce_template_loop_add_to_cart() {
		global $product;
		if ( ! $product->is_in_stock() || ! $product->is_purchasable() ) return;
		woocommerce_get_template('loop/add-to-cart.php');
	}
}

add_action( 'after_setup_theme', 'woo_gallery' );
function woo_gallery() {
remove_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );
}
