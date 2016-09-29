<?php
/*
Template Name: Typography
*/
get_header();
?>
<div id="primary" class="content-area container">
    <main id="main" class="site-main row" role="main">
<?php
while (have_posts()) {
    the_post();
?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('col-sm-10 col-sm-offset-1'); ?>>
            <header class="entry-header">
                <h1 class="entry-title"><?php the_title(); ?></h1>
                <div class="entry-meta">
<?php
    silencio_posted_on();
?>
                </div>
            </header>
            <div class="entry-content">
                <h1>Heading One</h1>
                <h2>Heading Two</h2>
                <h3>Heading Three</h3>
                <h4>Heading Four</h4>
                <h5>Heading Five</h5>
                <h6>Heading Six</h6>

                <p class="intro">An introductory paragraph is a great way to summarise the content before the reader really digs into the detail of your story. With a .intro class attached, this special paragraph can have a unique text size while inheriting its other attributes from it's parent.</p>

                <p>Did you ever heat a piece of <a href="/">paper before the fire </a>until it was real hot, then lay it upon the table and rub it from end to end with your hand, and finally see it cling to the wall? Were you ever in a factory where there were large belts running rapidly over pulleys or wheels, and where large sparks would jump to your hands when held near the belts?</p>

                <p>There are dozens of simple, fascinating experiments that may be performed with this kind of electricity.</p>

                <p>Did you ever succeed in proving to the pussy-cat that something unusual occurs when you thoroughly rub his warm fur with your hand? Did you notice the bright sparks that passed to your hand when it was held just above the cat's back? You should be able to see, hear, and feel these sparks, especially when the air is dry and you are in a dark room.</p>

                <blockquote class="pull-quote">
                  <p class="quote">“You should be able to see, hear, and feel these sparks, especially when the air is dry and you are in a dark room.”</p>
                </blockquote>

                <p>Did you ever succeed in proving to the pussy-cat that something unusual occurs when you thoroughly rub his warm fur with your hand? Did you notice the bright sparks that passed to your hand when it was held just above the cat's back? You should be able to see, hear, and feel these sparks, especially when the air is dry and you are in a dark room.</p>

                <ul>
                  <li>The first item in an unordered list</li>
                  <li>Second item right here</li>
                  <li>This is the third item in the list</li>
                </ul>

                <p>Did you ever succeed in proving to the pussy-cat that something unusual occurs when you thoroughly rub his warm fur with your hand? Did you notice the bright sparks that passed to your hand when it was held just above the cat's back? You should be able to see, hear, and feel these sparks, especially when the air is dry and you are in a dark room.</p>

                <ol>
                  <li>Item number one of three</li>
                  <li>The second place item</li>
                  <li>Last but not least in an ordered list</li>
                </ol>
            </div>
            <footer class="footer-meta">
                <span>Categories: <span class="taxonomy-list category-list"><a href="#" rel="category tag">Uncategorized</a> <a href="#" rel="category tag">another</a> <a href="#" rel="category tag">anothererore</a></span> </span><span>Tags: <span class="taxonomy-list category-list"><a href="#" rel="tag">test</a> <a href="#" rel="tag">tags</a></span></span>
            </footer>
        </article>
<?php
}
?>
    </main><!-- #main -->
</div><!-- #primary -->
<?php
get_footer();
