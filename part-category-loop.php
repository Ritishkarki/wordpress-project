<!-- Category posts Start -->
<ul class="category-grouping">
    <?php
    $catQuery = $wpdb->get_results("SELECT * FROM $wpdb->terms AS wterms INNER JOIN $wpdb->term_taxonomy AS wtaxonomy ON ( wterms.term_id = wtaxonomy.term_id ) WHERE wtaxonomy.taxonomy = 'category' AND wtaxonomy.parent = 0 AND wtaxonomy.count > 3");
    $catCounter = 0;

    foreach ($catQuery as $category) {
        $catCounter++;
        $catStyle = '';
        $postsToShow = 0;
        $isDeck = false;
        if(is_int($catCounter / 2)){
            $catStyle = ' class="three-cards"';
            $postsToShow = 3;
        }else{
            $catStyle = ' class="deck-cards"';
            $postsToShow = 4;
            $isDeck = true;
        }
        $catLink = get_category_link($category->term_id);

        echo '<li'.$catStyle.'>
                <h2 class="category-title">
                    <a href="'.$catLink.'" title="'.$category->name.'">'.$category->name.'</a>
                </h2>';
                echo ($isDeck ? '<div class="posts-deck">':'<ul>');
                        $query_post_full =  new WP_Query('cat='.$category->term_id.'&showposts='.$postsToShow);
                        $query_post_one =  new WP_Query('cat='.$category->term_id.'&showposts=1');
                        ?>

                        <?php if($isDeck) echo '<div class="featured">' ?>
                            <?php while ($query_post_one->have_posts() && $isDeck) : $query_post_one->the_post(); ?>
                                <article <?php post_class( 'entry' ); ?>>
                                    <div class="entry-featured">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail(); ?>
                                        </a>
                                    </div>
                                    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                    <div class="entry-meta">
                                        <time class="entry-date" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
                                    </div>
                                    <div class="etimated-time">
                                        <i class="fa fa-clock-o" aria-hidden="true"></i> 
                                        <?php echo get_estimated_reading_time(get_the_content());?> by <?php the_author();?>
                                    </div>
                                    <?php the_excerpt(); ?> 
                                </article>
                            <?php endwhile; ?>
                        <?php if($isDeck) echo '</div>' ?>

                        <?php if($isDeck) echo '<ul class="deck-list">' ?>
                            <?php while ($query_post_full->have_posts()) : $query_post_full->the_post(); ?>
                                <li>
                                    <article <?php post_class( 'entry' ); ?>>
                                        <div class="entry-featured">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_post_thumbnail(); ?>
                                            </a>
                                        </div>
                                        <?php if($isDeck) echo '<div class="entry-details">' ?>
                                            <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                            <div class="entry-meta">
                                                <time class="entry-date" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
                                            </div>
                                            <div class="etimated-time">
                                                <i class="fa fa-clock-o" aria-hidden="true"></i> 
                                                <?php echo get_estimated_reading_time(get_the_content());?> by <?php the_author();?>
                                            </div>
                                        <?php if($isDeck) echo '</div>' ?>
                                        <div class="article-content">
                                            <?php the_excerpt(); ?> 
                                        </div>
                                    </article>
                                </li>
                            <?php endwhile; ?>
                        <?php if($isDeck) echo '</ul>' ?>
                <?php echo ($isDeck ? '</div>':'</ul>'); ?>
                <a class="read-more" href="<?php echo $catLink; ?>" title="<?php echo $category->name; ?>">See all in <strong><?php echo $category->name; ?></strong></a>
            </li>
        <?php } ?>
</ul>
<!-- Category posts End -->