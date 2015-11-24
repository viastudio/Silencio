<?php
/*
Template Name: Typography
*/
get_header();
?>
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

<?php
while (have_posts()) {
    the_post();
    get_template_part('content', 'page');
}
?>
            <p class="entry-meta"><em>by</em> Jon Snow  22nd October 2014</p>

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
        </main><!-- #main -->
    </div><!-- #primary -->
<?php
get_footer();
