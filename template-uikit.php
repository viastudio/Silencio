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
            <div class="bs-docs-section">
                <h2 id="buttons">Buttons</h2>
                <div class="row">
                    <div class="col-sm-6">
                        <h3>Standard</h3>
                        <p class="bs-component">
                            <button type="button" class="btn btn-default">Default</button>
                            <button type="button" class="btn btn-primary">Primary</button>
                            <button type="button" class="btn btn-success">Success</button>
                            <button type="button" class="btn btn-danger">Danger</button>
                            <button type="button" class="btn btn-link">Link</button>
                        </p>
                        <p class="bs-component">
                            <button type="button" class="btn btn-default disabled">Default</button>
                            <button type="button" class="btn btn-primary disabled">Primary</button>
                            <button type="button" class="btn btn-success disabled">Success</button>
                            <button type="button" class="btn btn-danger disabled">Danger</button>
                            <button type="button" class="btn btn-link disabled">Link</button>
                        </p>
                    </div>
                    <div class="col-sm-6">
                        <h3>Dropdown</h3>
                        <!-- forced open for styling convenience -->
                        <div class="btn-group open">
                            <button type="button" class="btn btn-default dropdown-toggle" aria-haspopup="true" aria-expanded="false">
                                Action <i class="fa fa-caret-down"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Tables
            ================================================== -->
            <div class="bs-docs-section">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-header">
                            <h2 id="tables">Tables</h2>
                        </div>
                        <div class="bs-component">
                            <table class="table">
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
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    Panel Table
                                </div>
                                <table class="table">
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
                        </div><!-- /example -->
                    </div>
                </div>
            </div>

            <!-- Forms
            ================================================== -->
            <div class="bs-docs-section">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-header">
                            <h2 id="forms">Forms</h2>
                        </div>
                    </div>
                </div>
                <div class="bs-component">
<?php
gravity_form(1);
?>
                </div>
            </div>

            <!-- Navs
            ================================================== -->
            <div class="bs-docs-section">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-header">
                            <h2 id="nav">Navs</h2>
                        </div>
                    </div>
                </div>
                <h3>Pagination</h3>
                <div class="row">
                    <div class="col-lg-6">
                        <h4>Numeric</h4>
                        <nav class="navigation">
                            <div class="pagination-container">
                                <ul class="pagination">
                                   <li class="disabled"><a class="page-numbers" href="#">prev</a></li>
                                    <li><a class="page-numbers current" href="#">1</a></li>
                                    <li><a class="page-numbers" href="#">2</a></li>
                                    <li><a class="page-numbers" href="#">3</a></li>
                                    <li><a class="page-numbers" href="#">4</a></li>
                                    <li><a class="page-numbers" href="#">5</a></li>
                                    <li><a class="next page-numbers" href="#">next</a></li>
                                </ul>
                            </div>
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
