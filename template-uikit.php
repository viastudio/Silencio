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
                <div class="row">
                    <div class="col-lg-12">
                        <h1 id="buttons">Buttons</h1>
                        <p class="bs-component">
                            <button type="button" class="btn btn-default">Default</button>
                            <button type="button" class="btn btn-primary">Primary</button>
                            <button type="button" class="btn btn-success">Success</button>
                            <button type="button" class="btn btn-info">Info</button>
                            <button type="button" class="btn btn-warning">Warning</button>
                            <button type="button" class="btn btn-danger">Danger</button>
                            <button type="button" class="btn btn-link">Link</button>
                        </p>
                        <p class="bs-component">
                            <button type="button" class="btn btn-default disabled">Default</button>
                            <button type="button" class="btn btn-primary disabled">Primary</button>
                            <button type="button" class="btn btn-success disabled">Success</button>
                            <button type="button" class="btn btn-info disabled">Info</button>
                            <button type="button" class="btn btn-warning disabled">Warning</button>
                            <button type="button" class="btn btn-danger disabled">Danger</button>
                            <button type="button" class="btn btn-link disabled">Link</button>
                        </p>
                    </div>
                </div>
            </div>


            <!-- Tables
            ================================================== -->
            <div class="bs-docs-section">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-header">
                            <h1 id="tables">Tables</h1>
                        </div>
                        <div class="bs-component">
                            <table class="table table-striped table-hover ">
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
                                    <tr class="info">
                                        <td>3</td>
                                        <td>Column content</td>
                                        <td>Column content</td>
                                        <td>Column content</td>
                                      </tr>
                                    <tr class="success">
                                        <td>4</td>
                                        <td>Column content</td>
                                        <td>Column content</td>
                                        <td>Column content</td>
                                    </tr>
                                    <tr class="danger">
                                        <td>5</td>
                                        <td>Column content</td>
                                        <td>Column content</td>
                                        <td>Column content</td>
                                    </tr>
                                    <tr class="warning">
                                        <td>6</td>
                                        <td>Column content</td>
                                        <td>Column content</td>
                                        <td>Column content</td>
                                    </tr>
                                    <tr class="active">
                                        <td>7</td>
                                        <td>Column content</td>
                                        <td>Column content</td>
                                        <td>Column content</td>
                                    </tr>
                                </tbody>
                            </table>
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
                            <h1 id="forms">Forms</h1>
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
                            <h1 id="nav">Navs</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <h2 id="pagination">Pagination</h2>
                        <div class="bs-component">
                            <ul class="pagination">
                                <li class="disabled"><a href="#">&laquo;</a></li>
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li><a href="#">&raquo;</a></li>
                            </ul>
                            <ul class="pagination pagination-lg">
                                <li class="disabled"><a href="#">&laquo;</a></li>
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">&raquo;</a></li>
                            </ul>
                            <ul class="pagination pagination-sm">
                                <li class="disabled"><a href="#">&laquo;</a></li>
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li><a href="#">&raquo;</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h2 id="pager">Pager</h2>
                        <div class="bs-component">
                            <ul class="pager">
                                <li><a href="#">Previous</a></li>
                                <li><a href="#">Next</a></li>
                            </ul>
                            <ul class="pager">
                                <li class="previous disabled"><a href="#">&larr; Older</a></li>
                                <li class="next"><a href="#">Newer &rarr;</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Indicators
            ================================================== -->
            <div class="bs-docs-section">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-header">
                            <h1 id="indicators">Indicators</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Alerts</h2>
                        <div class="bs-component">
                            <div class="alert alert-dismissable alert-warning">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <h4>Warning!</h4>
                                <p>Best check yo self, you're not looking too good. Nulla vitae elit libero, a pharetra augue. Praesent commodo cursus magna, <a href="#" class="alert-link">vel scelerisque nisl consectetur et</a>.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="bs-component">
                            <div class="alert alert-dismissable alert-danger">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Oh snap!</strong> <a href="#" class="alert-link">Change a few things up</a> and try submitting again.
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="bs-component">
                            <div class="alert alert-dismissable alert-success">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Well done!</strong> You successfully read <a href="#" class="alert-link">this important alert message</a>.
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="bs-component">
                            <div class="alert alert-dismissable alert-info">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Heads up!</strong> This <a href="#" class="alert-link">alert needs your attention</a>, but it's not super important.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Labels</h2>
                        <div class="bs-component" style="margin-bottom: 40px;">
                            <span class="label label-default">Default</span>
                            <span class="label label-primary">Primary</span>
                            <span class="label label-success">Success</span>
                            <span class="label label-warning">Warning</span>
                            <span class="label label-danger">Danger</span>
                            <span class="label label-info">Info</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Containers
            ================================================== -->
            <div class="bs-docs-section">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-header">
                            <h1 id="container">Containers</h1>
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
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Panel success</h3>
                                </div>
                                <div class="panel-body">
                                    Panel content
                                </div>
                            </div>
                            <div class="panel panel-warning">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Panel warning</h3>
                                </div>
                                <div class="panel-body">
                                    Panel content
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="bs-component">
                            <div class="panel panel-danger">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Panel danger</h3>
                                </div>
                                <div class="panel-body">
                                    Panel content
                                </div>
                            </div>
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Panel info</h3>
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
