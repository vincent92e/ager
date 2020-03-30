<?php

/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $base_url: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup themeable
 */
?>

<!-- page wrapper -->
<div id="page-wrapper">
  <div id="page">


    <!-- navigation -->
    <nav class="navbar navbar-expand-lg navbar-bkg">
      <a class="navbar-brand" href="<?php print url("<front>"); ?>"><img src="<?php print $base_url . '/sites/all/themes/ager/img/blue-arrow.png'; ?>" alt="logo-arrow">
        <div class="ag ml-2">AG</div><div class="er">ER</div>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown mr-4">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Home
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="<?php print $base_url . '/listings'; ?>">Listings</a>
            </div>
          </li>
          <li class="nav-item dropdown mr-4">
            <span class="new text-center">new</span>
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Search
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="<?php print $base_url . '/listings'; ?>">Listings</a>
            </div>
          </li>
          <li class="nav-item dropdown mr-4">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Explore
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
            </div>
          </li>
          <li><a class="agr-btn btn btn-primary mr-4" href="#" role="button">Submit Ad</a></li>
          <li class="sign-in"><i class="fa fa-user"></i> Sign In</li>
        </ul>
      </div>
    </nav>
    <!-- /navigation -->


    <!-- banner -->
    <div class="banner <?php print $clip; ?>">
      <div class="overlay"></div>
      <div class="slider">
        <h1 class="slider-title">Buy low, sell high.</h1>
        <p>World leading marketplace with <span class="ads-count">753 ads</span> available!</p>
      </div>

      <!-- display exposed form only on the frontpage -->
      <?php if (($page['content_exposed_form']) && ($is_front == TRUE)): ?>
        <div class="exposed-search-form">
          <div class="container">
            <div class="row">
              <div class="col col-lg-9 ml-auto mr-auto visible">
                <!-- print region with exposed form -->
                <?php print render($page['content_exposed_form']); ?>
                <div class="pop-searches "><span class="pop-searches-cust">Popular searches:</span> backyard, baby, books, cloth, pets, mobile</div>
              </div>
            </div>
          </div>
        </div>
      <?php endif; ?>
      <!-- /display exposed form only on the frontpage -->
    </div>
    <!-- /banner -->


    <!-- display only when page is frontpage -->
    <?php if ($is_front == TRUE): ?>

      <!-- display frontpage tabs -->
      <div id="main-wrapper">
        <div id="main" class="clearfix">
          <div class="featured">
            <div class="container">
              <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                  <a class="nav-item nav-link active mr-1" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Trending Ads</a>
                  <a class="nav-item nav-link mr-1" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Featured Ads</a>
                  <a class="nav-item nav-link mr-1" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Newest Ads</a>
                </div>
              </nav>
              <div class="tab-content" id="nav-tabContent">

                <!-- content ads first region -->
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                  <?php if ($page['content_ads_first']): ?>
                    <?php print render($page['content_ads_first']); ?>
                  <?php endif; ?>
                </div>
                <!-- /content ads first region -->

                <!-- content ads second region -->
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                  <?php if ($page['content_ads_second']): ?>
                    <?php print render($page['content_ads_second']); ?>
                  <?php endif; ?>
                </div>
                <!-- /content ads second region -->

                <!-- content ads third region -->
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                  <?php if ($page['content_ads_third']): ?>
                    <?php print render($page['content_ads_third']); ?>
                  <?php endif; ?>
                </div>
                <!-- /content ads third region -->

              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /display frontpage tabs -->

      <!-- display content region -->
      <div class="content">
        <div id="content" class="column"><div class="section">
            <?php print render($page['content']); ?>
          </div></div>
      </div>
      <!-- /display content region -->

    <?php endif; ?>
    <!-- /display only when page is frontpage -->


    <!-- Display only when page is not frontpage -->
    <?php if ($is_front == FALSE): ?>

      <!-- display exposed form to all pages except frontpage -->
      <?php if ($page['content_exposed_form']): ?>
        <div class="container">
          <div class="row">
            <div class="col col-lg-9 ml-auto mr-auto">
              <!-- print region with exposed form -->
              <?php print render($page['content_exposed_form']); ?>
            </div>
          </div>
        </div>
      <?php endif; ?>
      <!-- /display exposed form to all pages except frontpage -->


      <!-- main wrapper -->
      <div id="main-wrapper">
        <div id="main" class="clearfix">

          <!-- content region -->
          <div id="content" class="column <?php print $content; ?>"><div class="section">
              <?php if (($page['highlighted']) && (arg(0) != 'listings')): ?><div id="highlighted"><?php print render($page['highlighted']); ?></div><?php endif; ?>
              <a id="main-content"></a>
              <?php print render($title_prefix); ?>
              <?php if ($title): ?><h1 class="title" id="page-title"><?php print $title; ?></h1><?php endif; ?>
              <?php print render($title_suffix); ?>
              <?php if ($tabs): ?><div class="tabs"><?php //print render($tabs); ?></div><?php endif; ?>
              <?php print render($page['help']); ?>
              <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
              <?php print render($page['content']); ?>
              <?php print $feed_icons; ?>
            </div>
          </div>
          <!-- /content region -->

          <!-- leftsidebar region -->
          <?php if (($page['left_sidebar']) && (arg(0) != 'listings')): ?>
            <div id="sidebar-first" class="column sidebar <?php print $leftsidebarclass; ?>"><div class="section">
                <?php print render($page['left_sidebar']); ?>
              </div></div>
          <?php endif; ?>
          <!-- /leftsidebar region -->

          <!-- rightsidebar region -->
          <?php if (($page['right_sidebar']) && (arg(0) != 'listings')): ?>
            <div id="sidebar-second" class="column sidebar <?php print $rightsidebarclass; ?>"><div class="section">
                <?php print render($page['right_sidebar']); ?>
              </div></div> <!-- /.section, /#sidebar-second -->
          <?php endif; ?>
          <!-- /rightsidebar region -->

        </div>
      </div>
      <!-- /main wrapper -->

      <!-- sponsors list -->
      <div class="sponsors-list">
        <div class="container">
          <div class="row">
            <div class="col-4 col-md-2 mb-3"><div class="spons-img text-center"><img class="img-fluid mt-auto mb-auto p-3" src="<?php print $base_url . '/sites/all/themes/ager/img/Houston.png'; ?>"></div></div>
            <div class="col-4 col-md-2"><div class="spons-img text-center"><img class="img-fluid mt-auto mb-auto p-3" src="<?php print $base_url . '/sites/all/themes/ager/img/Henderson.png'; ?>"></div></div>
            <div class="col-4 col-md-2"><div class="spons-img text-center"><img class="img-fluid mt-auto mb-auto p-3" src="<?php print $base_url . '/sites/all/themes/ager/img/HookMiller.png'; ?>"></div></div>
            <div class="col-4 col-md-2"><div class="spons-img text-center"><img class="img-fluid mt-auto mb-auto p-3" src="<?php print $base_url . '/sites/all/themes/ager/img/HoneyDev.png'; ?>"></div></div>
            <div class="col-4 col-md-2"><div class="spons-img text-center"><img class="img-fluid mt-auto mb-auto p-3" src="<?php print $base_url . '/sites/all/themes/ager/img/Woodhills.png'; ?>"></div></div>
            <div class="col-4 col-md-2"><div class="spons-img text-center"><img class="img-fluid mt-auto mb-auto p-3" src="<?php print $base_url . '/sites/all/themes/ager/img/Mechanix.png'; ?>"></div></div>
          </div>
        </div>
      </div>
      <!-- /sponsors list -->

    <?php endif; ?>
    <!-- /Display only when page is not frontpage -->


    <!-- footer top region -->
    <?php if($page['footer_top']):?>
      <?php print render($page['footer_top']); ?>
    <?php endif;?>
    <!-- /footer top region -->


    <!-- footer region -->
    <footer class="footer">
      <div class="container">
        <div class="row">

          <!-- footer bottom one region -->
          <div class="col-6 col-md-5 col-lg-4">
            <?php if($page['footer_bottom_one']):?>
              <h4 class="mb-2">Locations</h4>
              <?php print render($page['footer_bottom_one']); ?>
            <?php endif;?>
          </div>
          <!-- /footer bottom one region -->

          <!-- footer bottom two region -->
          <div class="col-6 col-md-3 col-lg-2">
            <?php if($page['footer_bottom_two']):?>
              <h4 class="mb-2">Pages</h4>
              <?php print render($page['footer_bottom_two']); ?>
            <?php endif;?>
          </div>
          <!-- /footer bottom two region -->

          <!-- footer bottom three region -->
          <div class="col-lg-3 d-none d-lg-block">
            <?php if($page['footer_bottom_three']):?>
              <h4 class="mb-2">Looking for app?</h4>
              <?php print render($page['footer_bottom_three']); ?>
            <?php endif;?>
          </div>
          <!-- /footer bottom three region -->

          <!-- footer bottom four region -->
          <div class="col-12 col-md-4 col-lg-3">
            <?php if($page['footer_bottom_four']):?>
              <h4 class="mb-2">Share</h4>
              <?php print render($page['footer_bottom_four']); ?>
            <?php endif;?>
          </div>
          <!-- /footer bottom four region -->

        </div>
      </div>
    </footer>
    <!-- /footer region -->


  </div>
</div>
<!-- /page wrapper -->
