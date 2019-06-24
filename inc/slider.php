    <!-- SLIDER -->
    <div class="slider-wrap">
        <div class="tp-banner-container">
            <div class="tp-banner" >
            <?php $slideshow_home = ( array(  'posts_per_page' => '5','post_type' => 'slideshow_home' )); query_posts( $slideshow_home ); ?>
                <ul>
<?php if (have_posts()) : while (have_posts()) : the_post();  ?>
<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'slideshow_home'); ?>
                    <!-- SLIDE  -->
                    <li data-transition="fade" data-slotamount="2" data-masterspeed="500" data-thumb="homeslider_thumb1.jpg"  data-saveperformance="on"  data-title="Intro Slide">
                        <!-- MAIN IMAGE -->
                        <img src="<?php echo $image[0]; ?>"  alt="slidebg1" data-lazyload="<?php echo $image[0]; ?>" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
                        <!-- LAYERS -->
                      
                        <!-- LAYER NR. 2 -->
                        <!--div class="tp-caption lft skewtoleftshort rs-parallaxlevel-9"
                             data-x="center"
                             data-y="250"
                             data-speed="1000"
                             data-start="1400"
                             data-easing="Power3.easeInOut"
                             data-elementdelay="0.1"
                             data-endelementdelay="0.1"
                             data-end="7300"
                             data-endspeed="1000"
                             style="z-index: 3; max-width: auto; max-height: auto; white-space: nowrap;font-family: Raleway;
                             font-size: 36px;
                             font-weight: bold;
                             text-transform: uppercase;	color: #343434;"><?php the_title(); ?>
                         </div-->
                         
                        <!--div class="tp-caption lft skewtoleftshort rs-parallaxlevel-9"
                             data-x="center"
                             data-y="310"
                             data-speed="1000"
                             data-start="1800"
                             data-easing="Power3.easeInOut"
                             data-elementdelay="0.1"
                             data-endelementdelay="0.1"
                             data-end="7300"
                             data-endspeed="1000"
                             style="z-index: 3; max-width: auto; max-height: auto; white-space: nowrap;	font-family: Raleway;
                             font-size: 18px;
                             color: #333;text-align:center;">
                             <?php echo string_limit_words(get_the_excerpt(), 18); ?>
                        </div-->
                        
                        <!--div class="tp-caption lft skewtoleftshort rs-parallaxlevel-9"
                             data-x="center"
                             data-y="375"
                             data-speed="1000"
                             data-start="2200"
                             data-easing="Power3.easeInOut"
                             data-elementdelay="0.1"
                             data-endelementdelay="0.1"
                             data-end="7300"
                             data-endspeed="1000"
                             style="z-index: 3; max-width: 80px; max-height: 4px; width:100%;height:100%;background:#000000;">
                             </div-->
                        <!--a href="<?php the_permalink(); ?>" class="tp-caption lft skewtoleftshort rs-parallaxlevel-9"
                           data-x="center"
                           data-y="395"
                           data-speed="1000"
                           data-start="2600"
                           data-easing="Power3.easeInOut"
                           data-elementdelay="0.1"
                           data-endelementdelay="0.1"
                           data-end="7300"
                           data-endspeed="1000"
                           style="z-index: 3; max-height:100%;line-height:43px;color:#fff;font-family: Montserrat;
                           font-size: 12px;
                           display:table;
                           font-weight: bold;
                           text-transform:uppercase;padding:0 40px;background:#000000;position:relative;z-index:77;">
                            Shop Now !
                        </a-->
                    </li>
                    <?php endwhile; endif; ?>
                </ul>
                <div class="tp-bannertimer"></div>
            </div><?php wp_reset_query(); ?>
        </div>
    </div>