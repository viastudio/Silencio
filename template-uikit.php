<?php
/*
Template Name: UI Kit
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
            <div class="columns">
                <div class="column is-one-third">
                    <nav class="menu">
                        <ul class="menu-list">
                            <p class="menu-label">Jump To:</p>
                            <li><a href="#buttons">Buttons</a></li>
                            <li><a href="#tables">Tables</a></li>
                            <li><a href="#forms">Forms</a></li>
                            <li>
                                <a href="#pagination">Pagination</a>
                                <ul>
                                    <li><a href="#numeric">Numeric</a></li>
                                    <li><a href="#prev-next">Previous / Next</a></li>
                                    <li><a href="#breadcrumbs">Breadcrumbs</a></li>
                                </ul>
                            </li>
                            <li><a href="#notifications">Notifications</a></li>
                            <li><a href="#panels">Panels</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="column">
                    <p>This is your UI Kit. A user interface (UI) kit includes the user interface components that convey meaning and provide functionality to users of your site.</p>
                </div>
            </div>

            <hr />

            <!-- Buttons
            ================================================== -->
            <div>
                <h2 id="buttons">Buttons</h2>
                <p>
                    <button type="button" class="button button-default">Default</button>
                    <button type="button" class="button button-primary">Primary</button>
                    <button type="button" class="button button-link">Link</button>
                </p>
            </div>
            <hr>

            <!-- Tables
            ================================================== -->
            <div>
                <h2 id="tables">Tables</h2>
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Column heading</th>
                            <th>Column heading</th>
                            <th>Column heading</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Column content</td>
                            <td>Column content</td>
                            <td>Column content</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Column content</td>
                            <td>Column content</td>
                            <td>Column content</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Column content</td>
                            <td>Column content</td>
                            <td>Column content</td>
                          </tr>
                        <tr>
                            <td>4</td>
                            <td>Column content</td>
                            <td>Column content</td>
                            <td>Column content</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <hr>

            <!-- Forms
            ================================================== -->
            <div>
                <h2 id="forms">Forms</h2>
                <!-- TODO -->
            </div>
            <hr>

            <!-- Navs
            ================================================== -->
            <div>
                <h2 id="pagination">Pagination</h2>
                <h3 id="numeric">Numeric</h3>
                <nav class="pagination is-centered">
                    <ul class="pagination-list">
                        <li><span class="page-numbers current">1</span></li>
                        <li><a class="page-numbers" href="#">2</a></li>
                        <li><a class="page-numbers" href="#">3</a></li>
                        <li><a class="page-numbers" href="#">4</a></li>
                        <li><a class="page-numbers" href="#">5</a></li>
                    </ul>
                </nav>
                <h3 id="prev-next">Previous/next</h3>
                <nav class="navigation">
                    <ul class="pager">
                        <li class="previous disabled"><a href="#">&larr; Older</a></li>
                        <li class="next"><a href="#">Newer &rarr;</a></li>
                    </ul>
                </nav>
                <h3 id="breadcrumbs">Breadcrumbs</h3>
<?php
if (function_exists('yoast_breadcrumb')) {
    yoast_breadcrumb('<div class="breadcrumbs">', '</div>');
} else {
    echo 'Enable Yoast SEO breadcrumbs to style.';
}
?>
                <h3>Social Media</h3>
                <ul class="social-media">
                    <li>
                        <a href="#" target="_blank">
                            <i class="fa fa-facebook"></i><span class="sr-only">Facebook</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" target="_blank">
                            <i class="fa fa-twitter"></i><span class="sr-only">Twitter</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" target="_blank">
                            <i class="fa fa-youtube"></i><span class="sr-only">YouTube</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" target="_blank">
                            <i class="fa fa-google"></i><span class="sr-only">Google</span>
                        </a>
                    </li>
                </ul>
                <h3>Tags/Categories</h3>
                <footer class="footer-meta">
                    <span>Categories: <span class="taxonomy-list category-list"><a href="#" rel="category tag">Uncategorized</a> <a href="#" rel="category tag">another</a> <a href="#" rel="category tag">anothererore</a></span> </span><span>Tags: <span class="taxonomy-list category-list"><a href="#" rel="tag">test</a> <a href="#" rel="tag">tags</a></span></span>
                </footer>
            </div>
            <hr>

            <!-- Notifications
            ================================================== -->
            <div>
                <h2 id="notifications">Notifications</h2>
                <div class="notification is-danger">
                    <button type="button" class="delete" data-dismiss="notification"></button>
                    <strong>Oh snap!</strong> <a href="#" class="alert-link">Change a few things up</a> and try submitting again.
                </div>
                <div class="notification is-success">
                    <button type="button" class="delete" data-dismiss="notification"></button>
                    <strong>Well done!</strong> You successfully read <a href="#" class="alert-link">this important alert message</a>.
                </div>
            </div>
            <hr>

            <!-- Containers
            ================================================== -->
            <div>
                <h2 id="panels">Panels</h2>
                <div class="columns">
                    <div class="column">
                        <div class="panel">
                            <div class="panel-block">
                                Basic panel
                            </div>
                        </div>
                    </div>
                    <div class="column">
                        <div class="panel">
                            <div class="panel-heading">Basic Panel with Heading</div>
                            <div class="panel-block">
                                Panel content
                            </div>
                        </div>
                    </div>
                    <div class="column">
                        <nav class="panel">
                            <div class="panel-heading">
                                <h4>Complex Panel</h4>
                            </div>
                            <div class="panel-block">
                                <div class="control">
                                    <input class="input is-small" type="text" placeholder="search">
                                </div>
                            </div>
                            <div class="panel-tabs">
                                <a class="is-active">here</a>
                                <a>are</a>
                                <a>some</a>
                                <a>tabs</a>
                            </div>
                            <div class="panel-block is-active">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente provident ea incidunt! Distinctio dicta nobis voluptatibus quos, voluptatum fugit molestiae, veritatis nemo dolorum dolore tempore architecto, vero quaerat perspiciatis vitae!</p>
                            </div>
                            <div class="panel-block">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora nihil harum corrupti, ullam nisi! Ad ducimus tenetur sapiente, harum eum velit et sit aliquam doloremque beatae pariatur quibusdam rerum neque.</p>
                            </div>
                        </nav>
                    </div>
                </div>
        </main><!-- #main -->
    </div><!-- #primary -->
<?php
get_sidebar('page');
get_footer();
