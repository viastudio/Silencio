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
            <hr />

            <!-- Buttons
            ================================================== -->
            <div>
                <h2>Buttons</h2>
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
                <h2>Tables</h2>
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

            <!-- Forms
            ================================================== -->
            <div>
                <h2>Forms</h2>
<?php
gravity_form(1);
?>
            </div>

            <!-- Navs
            ================================================== -->
            <div>
                <h2>Pagination</h2>
                <h3>Numeric</h3>
                <nav class="pagination is-centered">
                    <ul class="pagination-list">
                        <li><span class="page-numbers current">1</span></li>
                        <li><a class="page-numbers" href="#">2</a></li>
                        <li><a class="page-numbers" href="#">3</a></li>
                        <li><a class="page-numbers" href="#">4</a></li>
                        <li><a class="page-numbers" href="#">5</a></li>
                    </ul>
                </nav>
                    </div>
                    <div class="col-lg-6">
                        <h4>Previous/next</h4>
                        <nav class="navigation">
                            <ul class="pager">
                                <li class="previous disabled"><a href="#">&larr; Older</a></li>
                                <li class="next"><a href="#">Newer &rarr;</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="bs-docs-section">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>Breadcrumbs</h3>
<?php
if (function_exists('yoast_breadcrumb')) {
    yoast_breadcrumb('<div class="breadcrumbs">', '</div>');
} else {
    echo 'Enable Yoast SEO breadcrumbs to style.';
}
?>
                    </div>
                    <div class="col-sm-6">
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
                    </div>
                </div>
            </div>
            <div class="bs-docs-section">
                <h3>Tags/Categories</h3>
                <footer class="footer-meta">
                    <span>Categories: <span class="taxonomy-list category-list"><a href="#" rel="category tag">Uncategorized</a> <a href="#" rel="category tag">another</a> <a href="#" rel="category tag">anothererore</a></span> </span><span>Tags: <span class="taxonomy-list category-list"><a href="#" rel="tag">test</a> <a href="#" rel="tag">tags</a></span></span>
                </footer>
            </div>

            <!-- Indicators
            ================================================== -->
            <div class="bs-docs-section">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-header">
                            <h2 id="indicators">Indicators</h2>
                        </div>
                    </div>
                </div>
                <h2>Alerts</h2>
                <div class="alert alert-dismissable alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Oh snap!</strong> <a href="#" class="alert-link">Change a few things up</a> and try submitting again.
                </div>
                <div class="alert alert-dismissable alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Well done!</strong> You successfully read <a href="#" class="alert-link">this important alert message</a>.
                </div>
            </div>

            <!-- Containers
            ================================================== -->
            <div class="bs-docs-section">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-header">
                            <h2 id="container">Containers</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Panels</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="bs-component">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    Basic panel
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">Panel heading</div>
                                <div class="panel-body">
                                    Panel content
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    Panel content
                                </div>
                                <div class="panel-footer">Panel footer</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="bs-component">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Panel primary</h3>
                                </div>
                                <div class="panel-body">
                                    Panel content
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Wells</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="bs-component">
                            <div class="well">
                                Look, I'm in a well!
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="bs-component">
                            <div class="well well-sm">
                                Look, I'm in a small well!
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="bs-component">
                            <div class="well well-lg">
                                Look, I'm in a large well!
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main><!-- #main -->
    </div><!-- #primary -->
<?php
get_sidebar('page');
get_footer();
