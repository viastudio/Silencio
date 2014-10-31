<?php
get_header();
?>

    <div id="primary-full" class="content-area">
        <main id="main" class="site-main" role="main">

            <section class="error-404 not-found">
                <header class="page-header">
                    <h1 class="page-title">Page Not Found</h1>
                </header><!-- .page-header -->

                <div class="page-content">
                    <p>Nothing was found. Please use the Search box below.</p>
<?php
get_search_form();
?>
                </div><!-- .page-content -->
            </section><!-- .error-404 -->

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
