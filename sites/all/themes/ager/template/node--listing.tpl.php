<?php

/**
 * @file
 * Default theme implementation to display a node.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: An array of node items. Use render($content) to print them all,
 *   or print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $user_picture: The node author's picture from user-picture.tpl.php.
 * - $date: Formatted creation date. Preprocess functions can reformat it by
 *   calling format_date() with the desired parameters on the $created variable.
 * - $name: Themed username of node author output from theme_username().
 * - $node_url: Direct URL of the current node.
 * - $display_submitted: Whether submission information should be displayed.
 * - $submitted: Submission information created from $name and $date during
 *   template_preprocess_node().
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - node: The current template type; for example, "theming hook".
 *   - node-[type]: The current node type. For example, if the node is a
 *     "Blog entry" it would result in "node-blog". Note that the machine
 *     name will often be in a short form of the human readable label.
 *   - node-teaser: Nodes in teaser form.
 *   - node-preview: Nodes in preview mode.
 *   The following are controlled through the node publishing options.
 *   - node-promoted: Nodes promoted to the front page.
 *   - node-sticky: Nodes ordered above other non-sticky nodes in teaser
 *     listings.
 *   - node-unpublished: Unpublished nodes visible only to administrators.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type; for example, story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $view_mode: View mode; for example, "full", "teaser".
 * - $teaser: Flag for the teaser state (shortcut for $view_mode == 'teaser').
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * Field variables: for each field instance attached to the node a corresponding
 * variable is defined; for example, $node->body becomes $body. When needing to
 * access a field's raw values, developers/themers are strongly encouraged to
 * use these variables. Otherwise they will have to explicitly specify the
 * desired field language; for example, $node->body['en'], thus overriding any
 * language negotiation rule that was previously applied.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 * @see template_process()
 *
 * @ingroup themeable
 */
?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <div class="container">
    <div class="row">

      <!--  breadcrump  -->
      <div class="col-12 col-lg-11 ml-auto mr-auto">
        <div class="breadcrumb-row mb-4">
          <i class="fa fa-home"></i><?php print render($custom_breadcrumb); ?>
        </div>
      </div>
      <!--  /breadcrump  -->

      <!--   main content   -->
      <div class="col-12 col-lg-8 ml-auto">
        <div class="listing-info">

          <!--  display ad image  -->
          <?php print render($content['field_image2']); ?>
          <!--  /display ad image  -->

          <div class="descrip">

            <!-- display ad user interface -->
            <div class="view-count text-center">
              <div class="cont row">
                <div class="views col mr-2"><i class="fa fa-eye mr-2"></i>458 views</div>
                <div class="watch-list col mr-2"><i class="fa fa-star mr-2"></i>Add to watchlist</div>
                <div class="post col mr-2"><i class="fa fa-copy mr-2"></i>Post similar ad</div>
                <div class="make-offer col mr-3"><i class="fa fa-hand-o-left mr-2" aria-hidden="true"></i><div class="offer-count"><span>12</span></div>Make an offer</div>
                <div class="report-ad col ml-2"><i class="fa fa-flag mr-2"></i>Report this ad</div>
              </div>
            </div>
            <!-- /display ad user interface -->

            <!-- display ad informations -->
            <div class="useful-info p-4">
              <div class="address pr-4">
                <img class="mr-1" src="<?php print $base_url . '/sites/all/themes/ager/img/place.png'; ?>"><?php print render($content['location']); ?>
              </div>
              <div class="created-date pl-4 pr-4"><i class="fa fa-calendar mr-2" aria-hidden="true"></i><?php print render($content['created_date']); ?></div>
              <div class="category pl-4">
                <i class="fa fa-bars mr-2"></i>
                <?php print render($content['field_category'][0]['#title']); ?>
              </div>
              <div class="title mt-4"><?php print render($title); ?></div>
              <div class="body mt-4"><?php print render($content['body'][0]['#markup']); ?></div>
              <div class="price">$<?php print render($content['field_price3'][0]['#markup']); ?></div>
            </div>
            <!-- /display ad informations -->

            <!-- display table informations -->
            <div class="cust-tabs">
              <ul class="nav nav-pills" id="pills-tab" role="tablist">
                <li class="nav-item mr-2">
                  <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Ad Details</a>
                </li>
                <li class="nav-item mr-2">
                  <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Ad Video</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Ad Description</a>
                </li>
              </ul>
              <div class="tab-content" id="pills-tabContent">
                <div class="row pl-2 pr-2">
                  <div class="col-sm-6">
                    <table class="table table-striped">
                      <tbody>
                      <tr>
                        <td class="text-left cust-left">Mark</td>
                        <td class="text-right cust-right">Otto</td>
                      </tr>
                      <tr>
                        <td class="text-left cust-left">Jacob</td>
                        <td class="text-right cust-right">Thornton</td>
                      </tr>
                      <tr>
                        <td class="text-left cust-left">Lary</td>
                        <td class="text-right cust-right">Bird</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="col-sm-6">
                    <table class="table table-striped">
                      <tbody>
                      <tr>
                        <td class="text-left cust-left">Mark</td>
                        <td class="text-right cust-right">Otto</td>
                      </tr>
                      <tr>
                        <td class="text-left cust-left">Jacob</td>
                        <td class="text-right cust-right">Thornton</td>
                      </tr>
                      <tr>
                        <td class="text-left cust-left">Lary</td>
                        <td class="text-right cust-right">Bird</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- /display table informations -->

          </div>
        </div>
      </div>
      <!-- /main content -->

      <!-- side content -->
      <div class="col-sm-3 d-none d-lg-block mr-auto">
        <div class="sidebar-info">
          <div class="user-info">
            <div class="row ml-0 mb-2">

              <!-- display profile picture -->
              <div class="col-sm-4 pl-0">
                <img class="img-fluid profile-pic" src="<?php print $base_url . '/sites/all/themes/ager/img/user.JPG'; ?>">
              </div>
              <!-- /display profile picture -->

              <!-- display verified user icon -->
              <div class="col pl-0">
                <img class="img-fluid verified" src="<?php print $base_url . '/sites/all/themes/ager/img/verified_user.png'; ?>">
                <div class="username"><?php print ($user->name); ?></div>
                <div class="seen">
                  <div class="last-seen">Last seen:</div>
                  <div class="days">2 days ago</div>
                </div>
                <div class="all-members">All member ads (5) <i class="fa fa-level-up"></i></div>
              </div>
              <!-- /display verified user icon -->

            </div>

            <!-- display user mobile information -->
            <div class="row ml-0">
              <div class="col-sm-2 pl-0"><i class="fa fa-mobile" aria-hidden="true"></i></div>
              <div class="col pl-0 mr-2">
                <div class="numbers p-3">
                  <div class="number"><?php print '+44'.($user->mobile); ?></div>
                  <div class="show-number">click to show number</div>
                </div>
              </div>
            </div>
            <!-- /display user mobile information -->

            <!-- display user email information -->
            <div class="row ml-0">
              <div class="col-sm-2 pl-0"><i class="fa fa-envelope"></i></div>
              <div class="col pl-0 mr-2">
                <div class="email p-3">
                  <div class="number"><?php print ($user->mail); ?></div>
                  <div class="show-email">click to show email</div>
                </div>
              </div>
            </div>
            <!-- /display user email information -->

          </div>

          <!-- display random ad informations -->
          <div class="rand-ads mt-3">
            <div class="image">
              <div class="adv-hover text-center">ad</div>
              <?php print render($random_ad['image']); ?>
            </div>
            <div class="price"><?php print '$'.render($random_ad['price']); ?></div>
            <div class="title"><?php print render($random_ad['title']); ?></div>
          </div>
          <!-- /display random ad informations -->

        </div>
      </div>
      <!-- /side content -->

    </div>
  </div>
</div>
