<div id="blog-fullwidth">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<article <?php post_class('entry'); ?>>

            <section class="bg-white pt pb30 bb-ltgray">
                <div class="container">
            		<div class="row">
            			<div class="col-md-10 col-md-offset-1">
                			<h1 class="text-center"><?php the_title(); ?></h1>
                			<div class="entry-content"><?php the_content(); ?></div>
<!--
                			<div class="col-md-6 col-md-offset-3 centered">
                				<form class="mc-form">
                			        <input id="mc-email" type="email" class="subscribe-input" placeholder="Enter your e-mail" required>
                			        <button type="submit" class='btn btn-orange subscribe-submit p10'>Subscribe</button>
                			        <label for="mc-email"></label>
                			    </form>
                			</div>
-->
            			</div>
            		</div>
                </div>
            </section>

            <?php
            // check if the flexible content field has rows of data
            if( have_rows('twitter_list') ) { ?>

                <section id="single-list-items" class="nnr-filter">

                    <div id="twitter-filter" class="text-center pt pb bg-dkwhite">
                        <span>
                            <small><strong>Filters: </strong></small>
                            <a href="#twitter-filter" class="label label-success">All</a>
                            <a href="#twitter-filter" class="label label-danger ">Developer</a>
                            <a href="#twitter-filter" class="label label-primary">Designer</a>
                            <a href="#twitter-filter" class="label label-info   ">Consultant</a>
                            <a href="#twitter-filter" class="label label-warning">Educator</a>
                            <a href="#twitter-filter" class="label label-danger ">Marketer</a>
                            <a href="#twitter-filter" class="label label-primary">Writer</a>
                        </span>
                    </div>

            	    <?php
                    // build containing array for sorting
            	    $user_data_array = array();

            	    // loop through all rows in the field group
            	    while ( have_rows('twitter_list') ) : the_row();

                        // get current flexible content field layout name
            			$row_type = get_row_layout();

                        // check if the flexible content field is 'user'
                        if ( $row_type == 'user' ) {

                            // get field data
                            $handle     = get_sub_field('handle');
                            $name       = get_sub_field('name');
                	        $tagline    = get_sub_field('tagline');
                	        $bio        = get_sub_field('bio');
                	        $tags       = get_sub_field('tags');
                	        $site       = get_sub_field('website');
                	        $image      = get_sub_field('image_url');

                            // get tags
                            if( have_rows('tags') ):

                                // initialize a variable to store tag html
                                $tags_html ='';

                             	// loop through the rows of data
                                while ( have_rows('tags') ) : the_row();

                                    $tag = get_sub_field('tag');

                                    if      ( $tag == 'Educator'                                        ) { $tag_class = 'label-warning'; }
                                    else if ( $tag == 'Designer'    || $tag == 'Writer'                 ) { $tag_class = 'label-primary'; }
                                    else if ( $tag == 'Consultant'  || $tag == 'Community Ambassador'   ) { $tag_class = 'label-info';    }
                                    else if ( $tag == 'Developer'   || $tag == 'Marketer'               ) { $tag_class = 'label-danger';  }
                                    else                                                                  { $tag_class = 'label-default'; }

                                    $tags_html = $tags_html . '<a href="#twitter-filter" class="label tag-All ' . $tag_class . ' tag-' . $tag . ' mt10" style="margin-right:5px;">' . $tag . '</a>';

                                endwhile;
                            endif;

                            // set transient for each handle
                            if ( false === ( $user_data = get_transient( 'nnr_tw_infl_' . $handle ) ) ) {
                                // this code runs when there is no valid transient set
                                $user_data  = nnr_get_twitter_user($handle);
                                set_transient( 'nnr_tw_infl_' . $handle, $user_data, 60*60*24);
                            }

                            // setup user data
                            $followers  = $user_data->followers_count;
                            $lists      = $user_data->listed_count;
                            $user_name  = $user_data->name;
                            $user_bio   = $user_data->description;
                            $user_site  = $user_data->entities->url->urls[0]->expanded_url;
                            $user_img   = nnr_enlarge_twitter_user_image($user_data->profile_image_url);

                            // override user data if field is defined
                            if      ( isset($name)      && $name        != '' ) { $user_name = $name;           }
                            if      ( isset($bio)       && $bio         != '' ) { $user_bio  = $bio;            }
                            if      ( isset($image)     && $image       != '' ) { $user_img  = $image;          }
                            if      ( isset($site)      && $site        != '' ) { $user_site = $site;           }
                            else if ( isset($user_site) && $user_site   != '' ) { $user_site = $user_site;      }
                            else                                                { $user_site = $user_data->url; }

                            // single user array contruction
                            $user = array(
                                'handle'    => $handle,
                                'followers' => $followers,
                                'lists'     => $lists,
                                'img'       => $user_img,
                                'tags_html' => $tags_html,
                                'name'      => $user_name,
                                'website'   => $user_site,
                                'tagline'   => $tagline,
                                'bio'       => $user_bio,
                            );

                            // add user to users array
                            array_push($user_data_array, $user);
                        }

                    endwhile;

                    // Sort user by followers
                    usort($user_data_array, 'nnr_sort_followers');

                    // Display users
            	    $i = 1;
                    foreach ($user_data_array as $user) {
                        if ( $i > 99 ) { break; }
                    ?>

                        <div class="single-list-item pt pb bt-ltgray text-center">
                            <div class="container pt pb">
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <img class="radius-full bd-ltgray" src="<?php echo $user['img']; ?>" />
                                                <div class="text-center">
                                                    <div class="p10">
<!--                                                         <strong title="# Twitter Followers"><i class="fa fa-users"></i> </strong> -->
<!--                                                         <span title="# Twitter Followers" class="badge" style="background:#01B7EE;"><?php /* echo number_format( $user['followers'] ); */ ?> </span>&nbsp; -->
<!--
                                                        <strong title="# Twitter Lists On"><i class="fa fa-bars"></i> </strong>
                                                        <span title="# Twitter Lists On" class="badge bg-gray"><?php /* echo $user['lists']; */ ?></span>
-->
                                                    </div>
<!--                                                     <a href="https://twitter.com/<?php /* echo $user['handle']; */ ?>" class="twitter-follow-button hidden-xs" data-show-count="false" data-size="large">Follow <?php /* echo '@'.$user['handle']; */ ?></a> -->
                                                    <a class="btn btn-ltgray" href="https://twitter.com/<?php echo $user['handle']; ?>" target="_blank"><i class="fa fa-twitter text-blue"></i><?php echo ' Follow @' . $user['handle']; ?></a>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6">

                                                <?php echo $user['tags_html']; ?>

                                                <h2 class="mb10">
<!--                                                     <span>#<?php /* echo $i; */ ?> - </span> -->
                                                    <?php echo $user['name']; ?>
                                                    <?php if (isset($user['website']) && $user['website'] != '') { ?>
                                                        <small><a target="_blank" href="<?php echo $user['website']; ?>"><i class="fa fa-link"></i></a></small>
                                                    <?php } ?>
                                                </h2>
                                                <div class="clearfix"></div>
                                                <div>
                                                    <?php if (isset($user['tagline']) && $user['tagline'] != '') { ?>
                                                        <span class="light"><?php echo $user['tagline']; ?></span>
                                                    <?php } ?>
                                                </div>
                                                <hr class="hidden-xs" />
                                                <p class="pb0">
                                                    <?php echo $user['bio']; ?>
                                                </p>
                                                <div class="text-center hidden-lg hidden-md hidden-sm">
<!--                                                     <a href="https://twitter.com/<?php /* echo $user['handle']; */ ?>" class="twitter-follow-button" data-show-count="false" data-size="large">Follow <?php /* echo '@'.$user['handle']; */ ?></a> -->
                                                    <a class="btn btn-ltgray" href="https://twitter.com/<?php echo $user['handle']; ?>" target="_blank"><i class="fa fa-twitter text-blue"></i><?php echo ' Follow @' . $user['handle']; ?></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- /item -->

                    <?php ++$i; } ?>

                </section>

                <section class="bg-dkwhite">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2 text-center mt mb">
                                <h2>Did We Miss Someone?</h2>
                                <p>Comment below with their Twitter handle and we'll look into it! Check back later to see how the list has changed!</p>
                            </div>
                        </div>
                    </div>
                </section>

            <?php
            // check if the flexible content field has rows of data
            } else if ( have_rows('website_list') ) { ?>

                <section id="single-list-items" class="nnr-filter">

                    <div id="twitter-filter" class="text-center pt pb bg-dkwhite">
                        <span>
                            <small><strong>Filters: </strong></small>
                            <a href="#twitter-filter" style="cursor:pointer;" class="label label-success">All</a>
                            <a href="#twitter-filter" style="cursor:pointer;" class="label label-danger ">Entertainment</a>
                            <a href="#twitter-filter" style="cursor:pointer;" class="label label-primary">Music</a>
                            <a href="#twitter-filter" style="cursor:pointer;" class="label label-info   ">Technology</a>
                            <a href="#twitter-filter" style="cursor:pointer;" class="label label-warning">Media</a>
                            <a href="#twitter-filter" style="cursor:pointer;" class="label label-danger ">Sports</a>
                            <a href="#twitter-filter" style="cursor:pointer;" class="label label-primary">Fashion</a>
                            <a href="#twitter-filter" style="cursor:pointer;" class="label label-info   ">Education</a>
                            <a href="#twitter-filter" style="cursor:pointer;" class="label label-warning">Finance</a>
                            <a href="#twitter-filter" style="cursor:pointer;" class="label label-default">Other</a>
                        </span>
                    </div>

            	    <?php
            	    $user_data_array = array();
                    $i = 0;
            	    while ( have_rows('website_list') ) : the_row();

            			$row_type = get_row_layout();

                        if ( $row_type == 'website' ) {
                            $i++;
                            // get field data
                            $image   = get_sub_field('image');
                            $title   = get_sub_field('title');
                	        $desc    = get_sub_field('description');
                	        $link    = get_sub_field('link');

                	        $google  = get_sub_field('page_rank');
                	        $moz     = get_sub_field('domain_authority');
                	        $alexa   = get_sub_field('alexa_rank');


                	        // get tags
                            if( have_rows('tags') ):
                                $tags_html ='';
                             	// loop through the rows of data
                                while ( have_rows('tags') ) : the_row();

                                    $tag = get_sub_field('tag');

                                    if      ( $tag == 'Media' || $tag == 'Finance'              ) { $tag_class = 'label-warning'; }
                                    else if ( $tag == 'Music' || $tag == 'Fashion'              ) { $tag_class = 'label-primary'; }
                                    else if ( $tag == 'Technology' || $tag == 'Education'       ) { $tag_class = 'label-info';    }
                                    else if ( $tag == 'Entertainment' || $tag == 'Sports'       ) { $tag_class = 'label-danger';  }
                                    else                                                          { $tag_class = 'label-default'; }

                                    $tags_html = $tags_html . '<a href="#twitter-filter" class="label tag-All ' . $tag_class . ' tag-' . $tag . ' mt10" style="margin-right:5px;">' . $tag . '</a>';

                                endwhile;
                            endif;
                	        ?>

                	        <div class="single-list-item single-list-item-big-website pt pb bt-ltgray text-center">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-10 col-md-offset-1">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <h1 class="mb10">
                                                        <?php if (isset($link) && $link != '') { ?>
                                                            <a target="_blank" class="text-dkgray" href="<?php echo $link; ?>">
                                                        <?php } ?>
                                                            <?php echo $title; ?>
                                                        <?php if (isset($link) && $link != '') { ?>
                                                            </a>
                                                        <?php } ?>
                                                    </h1>
                                                    <div class="mb20"><?php echo $tags_html; ?></div>
                                                    <img class="bd-ltgray" src="<?php echo $image; ?>" />
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="website-data pt30">
                                                        <div class="col-sm-4 bg-ltgray text-center p30">
                                                            <span class="website-rating"><?php echo $google; ?><small> / 10</small></span><br/>
<!--                                                             <a href="http://google.about.com/od/searchengineoptimization/a/pagerankexplain.htm"> -->Google P.R.<!-- </a> -->
                                                        </div>
                                                        <div class="col-sm-4 bg-dkwhite text-center p30">
                                                            <span class="website-rating"><?php echo $moz; ?><small> / 100</small></span><br/>
<!--                                                             <a href="https://moz.com/learn/seo/domain-authority"> -->Moz D.A.<!-- </a> -->
                                                        </div>
                                                        <div class="col-sm-4 bg-ltgray text-center p30">
                                                            <span class="website-rating"><?php echo $alexa; ?></span><br/>
<!--                                                             <a href="http://winningwp.com/alexa-traffic-rank/"> -->Alexa Rank<!-- </a> -->
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <p class="pb0 pt20">
                                                        <?php echo $desc; ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- /item -->

                        <?php }

                    endwhile; ?>

                </section>

                <section class="bg-dkwhite">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2 text-center mt mb">
                                <h2>Did We Miss One?</h2>
                                <p>Comment below with their URL and we'll look into it! <br/>Check back later to see how the list has changed!</p>
                            </div>
                        </div>
                    </div>
                </section>

            <?php
            // check if the flexible content field has rows of data
            } else if ( have_rows('plugin_list') ) { ?>

                <section id="single-list-items" class="nnr-filter">

                    <div id="twitter-filter" class="text-center pt pb bg-dkwhite">
                        <span>
                            <small><strong>Filters: </strong></small>
                            <a href="#twitter-filter" style="cursor:pointer;" class="label label-success">All</a>
                            <a href="#twitter-filter" style="cursor:pointer;" class="label label-danger ">Functionality</a>
                            <a href="#twitter-filter" style="cursor:pointer;" class="label label-primary">SEO</a>
                            <a href="#twitter-filter" style="cursor:pointer;" class="label label-info   ">Speed</a>
                            <a href="#twitter-filter" style="cursor:pointer;" class="label label-warning">Email</a>
                            <a href="#twitter-filter" style="cursor:pointer;" class="label label-danger ">Media</a>
                            <a href="#twitter-filter" style="cursor:pointer;" class="label label-primary">Security</a>
                            <a href="#twitter-filter" style="cursor:pointer;" class="label label-info   ">Social</a>
                            <a href="#twitter-filter" style="cursor:pointer;" class="label label-warning">Analytics</a>
                            <a href="#twitter-filter" style="cursor:pointer;" class="label label-default">Other</a>
                        </span>
                    </div>

            	    <?php
            	    $user_data_array = array();
                    $i = 0;
                    $data = get_option( 'listicle_website_data' );

                    if ( $data === false ) {
                        $data = array();
                    }

            	    while ( have_rows('plugin_list') ) : the_row();

            			$row_type = get_row_layout();

                        if ( $row_type == 'plugin' ) {

                            $i++;

                            if ( !isset($data[$i]) ) {

                    	        // get tags
                                if( have_rows('tags') ):
                                    $tags_html ='';
                                 	// loop through the rows of data
                                    while ( have_rows('tags') ) : the_row();

                                        $tag = get_sub_field('tag');

                                        if      ( $tag == 'Email' || $tag == 'Analytics'  ) { $tag_class = 'label-warning'; }
                                        else if ( $tag == 'SEO' || $tag == 'Security' ) { $tag_class = 'label-primary'; }
                                        else if ( $tag == 'Speed' || $tag == 'Social'  ) { $tag_class = 'label-info';    }
                                        else if ( $tag == 'Media' || $tag == 'Functionality' ) { $tag_class = 'label-danger';  }
                                        else                          { $tag_class = 'label-default'; }

                                        $tags_html = $tags_html . '<a href="#twitter-filter" class="label tag-All ' . $tag_class . ' tag-' . $tag . ' mt10" style="margin-right:5px;">' . $tag . '</a>';

                                    endwhile;
                                endif;

                                // get field data
                                $data[$i] = array(
                                    'image'         => get_sub_field('image'),
                                    'name'          => get_sub_field('name'),
                        	        'desc'          => get_sub_field('description'),
                        	        'link'          => get_sub_field('link'),
                        	        'author'        => get_sub_field('author'),
                        	        'author_link'   => get_sub_field('author_link'),
                        	        'installs'      => get_sub_field('installs'),
                        	        'tags_html'     => $tags_html,
                                );

                                update_option( 'listicle_website_data', $data );

                            }

                            // pull out variable names from the array
                            extract($data[$i]);

                	        ?>

                	        <div class="single-list-item single-list-item-big-website pt pb bt-ltgray">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-10 col-md-offset-1">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <h1 class="nm">
                                                        <span>
                                                            #<?php echo $i; ?> -
                                                        </span>
                                                        <?php if (isset($link) && $link != '') { ?>
                                                            <a target="_blank" class="text-dkgray" href="<?php echo $link; ?>">
                                                        <?php } ?>
                                                            <?php echo $name; ?>
                                                        <?php if (isset($link) && $link != '') { ?>
                                                            </a>
                                                        <?php } ?>
                                                    </h1>
                                                    <p class="pb0 pt20">
                                                        <?php echo $desc; ?>
                                                    </p>
                                                    <?php if (isset($link) && $link != '') { ?>
                                                        <p>
                                                            <a target="_blank" class="btn btn-blue btn-lg" href="<?php echo $link; ?>">Learn More</a>
                                                        </p>
                                                    <?php } ?>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="mb20"><?php echo $tags_html; ?></div>
                                                    <a target="_blank" href="<?php echo $link; ?>">
                                                        <img class="bd-ltgray mb20" src="<?php echo $image; ?>" />
                                                    </a>
                                                    <div class="col-sm-6 bg-ltgray text-center p10">
                                                        <?php if (isset($installs) && $installs != '') { ?>
                                                            <span class="website-rating"><small>Installs: </small><strong><?php echo $installs; ?></strong></span>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="col-sm-6 bg-dkwhite text-center p10">
                                                        <?php if (isset($author_link) && $author_link != '' && isset($author) && $author != '') { ?>
                                                            <span class="website-rating">
                                                                <small>Author: </small>
                                                                <a target="_blank" href="<?php echo $author_link; ?>"><?php echo $author; ?></a>
                                                            </span>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- /item -->

                        <?php }

                    endwhile; ?>

                </section>

                <section class="bg-dkwhite">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2 text-center mt mb">
                                <h2>Did We Miss One?</h2>
                                <p>Comment below with their URL and we'll look into it! <br/>Check back later to see how the list has changed!</p>
                            </div>
                        </div>
                    </div>
                </section>

            <?php } ?>

            <section class="container">
        		<div class="row">
        			<div class="col-md-8 col-md-offset-2">
                		<?php
                		// Display edit post link to site admin
        				edit_post_link(__('Edit This Post','gabfire'),'<p>','</p>');

        				$subtitle = get_post_meta($post->ID, 'subtitle', true);
        				if ($subtitle != '') {
        					echo "<p class='subtitle'>$subtitle</p>";
        				}

        				if( 'post' == get_post_type() ) { ?>
        					<div class="single_postmeta mt mb">
            					<div class="">
                					<hr class="mb" />
                					<div class="col-sm-2">
            						    <?php echo get_avatar( get_the_author_meta('email'), '90'); ?>
                					</div>
                					<div class="col-sm-10">
                    					<p class="author-byline">
                							<?php
                							$authorlink = '<a href="'.get_author_posts_url(get_the_author_meta( 'ID' )).'" rel="author" class="author vcard"><span class="fn">'.  get_the_author() . '</span></a>';

                							printf(esc_attr__('Written by %1$s','gabfire'), $authorlink); ?>
                						</p>
            						    <p class="text-gray"><?php echo get_the_author_meta('description'); ?></p>
                                        <div>
                                            <?php if (get_the_author_meta('twitter')) { ?>
                                                <a href="https://twitter.com/<?php echo get_the_author_meta('twitter'); ?>" class="twitter-follow-button hidden-xs" data-show-count="false" data-size="large">Follow <?php echo '@'.get_the_author_meta('twitter'); ?></a>
                                            <?php } ?>
                                        </div>
                					</div>
                					<div class="clearfix"></div>
                					<hr class="mt" />
            					</div>
        					</div>
        				<?php }
                        gabfire_dynamic_sidebar('PostWidget'); ?>

    				</div><!-- col-md-12 -->
        		</div>
        	</section><!-- container content-wrapper -->

		</article>

        <section class="container mb">
    		<div class="row">
    			<div class="col-md-8 col-md-offset-2">
                    <?php if(!is_page()) { comments_template(); } ?>
    			</div>
    		</div>
        </section>

	<?php endwhile; else : endif; ?>

	<div class="clearfix"></div>

</div><!-- /blog-fullwidth -->

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.ajaxchimp.min.js"></script>
<script type="text/javascript">
    // mailchimp
    jQuery(document).ready(function($){
		$('.mc-form').ajaxChimp({
		    url: '//wpsite.us5.list-manage.com/subscribe/post?u=82c2341134bbdc37714642adb&amp;id=642b18616e'
		});
	});
</script>