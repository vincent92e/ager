<?php

/**
  * hook_preprocess_page()
**/
function ager_preprocess_page(&$variables) {
    if (arg(0) == 'listings') {
        foreach($variables['page']['#views_contextual_links_info']['views_ui']['view']->result as $key => $content) {
            $variables['listings'][$key]['title'] = $content->_entity_properties['entity object']->title;
            $variables['listings'][$key]['location'] = $content->_entity_properties['entity object']->field_town['und'][0]['safe_value'].", ".$content->_entity_properties['entity object']->field_city['und'][0]['safe_value'];
            $variables['listings'][$key]['price'] = $content->_entity_properties['entity object']->field_price3['und'][0]['value'];
            //$variables['listings'][$key]['image'] = $content->_entity_properties['entity object']->field_city_image['und'][0];
            $variables['listings'][$key]['image'] = array(
                '#theme' => 'image_formatter',
                '#item' => $content->_entity_properties['entity object']->field_image2['und'][0],
                '#access' => TRUE,
            );

            $variables['listings'][$key]['image']['#item']['attributes']['class'][] = 'img-fluid';
        }
    }

    if (!empty($variables['page']['left_sidebar']) && !empty($variables['page']['right_sidebar'])) {
      $variables['leftsidebarclass'] = 'col-md-4 col-lg-3 mb-4';
      $variables['contentclass'] = 'col';
      $variables['rightsidebarclass'] = 'col-sm-3';
    }
    elseif (!empty($variables['page']['left_sidebar'])) {
      $variables['leftsidebarclass'] = 'col-md-4 col-lg-3 mb-4';
      $variables['contentclass'] = 'col';
    }
    elseif (!empty($variables['page']['right_sidebar'])) {
      $variables['rightsidebarclass'] = 'col-sm-3';
      $variables['contentclass'] = 'col';
    }
    else {
      $variables['contentclass'] = 'col-sm-12';
    }

    // assign the clip class if page is not frontpage
    $variables['clip'] = ($variables['is_front'])? '':'clip';
}

/**
 * Implements hook_preprocess_node().
 */
function ager_preprocess_node(&$variables) {
    $variables['content']['field_image2'][0]['#item']['attributes']['class'][] = 'img-fluid';
    $variables['content']['location'] = $variables['content']['field_town']['#items'][0]['safe_value'].", ".$variables['content']['field_city']['#items'][0]['safe_value'];

    $date = $variables['created'];
    $month = date('M', $date).'. ';
    $day = date('j', $date).'. ';
    $year = date('Y', $date).'.';
    $variables['content']['created_date'] = $month.$day.$year;

    // load node according to node type
    $type = 'listing';
    $query = new EntityFieldQuery;
    $result = $query->entityCondition('entity_type', 'node')
      ->entityCondition('bundle', $type)
      ->execute();
    if (!empty($result['node'])) {
      $nids = array_keys($result['node']);
      $random_nid = array_rand($nids, 1);
      // Now use node_load_multiple() to load the nodes belonging to those node IDs.
      $node = node_load($random_nid);
      $ad = array();
      $ad['title'] = $node->title;
      $ad['price'] = $node->field_price3['und'][0]['value'];
      $ad['image'] = array(
        '#theme' => 'image_formatter',
        '#item' => $node->field_image2['und'][0],
        '#access' => TRUE,
      );
      $ad['image']['#item']['attributes']['class'][] = 'img-fluid';
      $variables['random_ad'] = $ad;
      // .... continue as before
    }
    // End noad load

    // create custom breadcrumb
    if (($variables['is_front'] == FALSE) && ($variables['type'] == 'listing')) {
        $variables['custom_breadcrumb'] = '<div class="brdcrmb ml-2"><a href="'.url("<front>").'">Home</a>'.'<span class="arrow ml-1 mr-1">'.' > </span>'.' Listing</div>';
    }
}

/*
 * Implemments hook_facetapi_title()
 */
function ager_facetapi_title($variables) {
    $title = '<div class="cont-title">'.$variables['title'].'<i class="fa fa-angle-down ml-auto"></i></div>';

    return $title;
}

/**
 * Implements hook_preprocess_views_view()
 *
 */
function ager_preprocess_views_view(&$variables) {
    if ($variables['view']->name == 'listings') {
        foreach($variables['view']->result as $key => $var) {
          $variables['listings'][$key]['title'] = $variables['view']->result[$key]->_entity_properties['entity object']->title;

          $variables['listings'][$key]['location'] = $variables['view']->result[$key]->_entity_properties['entity object']->field_town['und'][0]['safe_value'].", ".$variables['view']->result[$key]->_entity_properties['entity object']->field_city['und'][0]['safe_value'];

          $variables['listings'][$key]['price'] = $variables['view']->result[$key]->_entity_properties['entity object']->field_price3['und'][0]['value'];

          $variables['listings'][$key]['image'] = array(
                '#theme' => 'image_formatter',
                '#item' => $variables['view']->result[$key]->_entity_properties['entity object']->field_image2['und'][0],
                '#access' => TRUE,
                //'#path' => 'node/'.$variables['view']->result[$key]->_entity_properties['nid'],
            );

          //start: make image to link to main content
          $variables['listings'][$key]['image']['#path']['path'] = 'node/'.$variables['view']->result[$key]->_entity_properties['nid'];

          $variables['listings'][$key]['image']['#path']['options'] = $variables['view']->result[$key]->_field_data['field_image2'];
          //end:

          // Adding a class to an image
          $variables['listings'][$key]['image']['#item']['attributes']['class'][] = 'img-fluid';
        }

        // create custom breadcrumb
        if (($variables['is_front'] == FALSE) && ($variables['view']->name == 'listings')) {
            $variables['custom_breadcrumb'] = '<div class="brdcrmb ml-2"><a href="'.url("<front>").'">Home</a>'.'<span class="arrow ml-1 mr-1">'.' > </span>'.' Listing</div>';
        }
    }

    if ($variables['view']->name == 'trending_ads') {
        foreach($variables['view']->result as $key => $var) {
          $variables['trending_ads'][$key]['title'] = $variables['view']->result[$key]->node_title;

          $variables['trending_ads'][$key]['location'] = $variables['view']->result[$key]->field_field_town[0]['rendered']['#markup'] .", ". $variables['view']->result[$key]->field_field_city[0]['rendered']['#markup'];

          $variables['trending_ads'][$key]['price'] = $variables['view']->result[$key]->field_field_price3[0]['rendered'];

          $variables['trending_ads'][$key]['image'] = $variables['view']->result[$key]->field_field_image2[0]['rendered'];

          // Adding a class to an image
          $variables['trending_ads'][$key]['image']['#item']['attributes']['class'][] = 'img-fluid'; // WORKS!
      }
    }

    if ($variables['view']->name == 'featured_ads') {
        foreach($variables['view']->result as $key => $var) {
          $variables['featured_ads'][$key]['title'] = $variables['view']->result[$key]->node_title;

          $variables['featured_ads'][$key]['location'] = $variables['view']->result[$key]->field_field_town[0]['rendered']['#markup'] .", ". $variables['view']->result[$key]->field_field_city[0]['rendered']['#markup'];

          $variables['featured_ads'][$key]['price'] = $variables['view']->result[$key]->field_field_price3[0]['rendered'];

          $variables['featured_ads'][$key]['image'] = $variables['view']->result[$key]->field_field_image2[0]['rendered'];

          // Adding a class to an image
          $variables['featured_ads'][$key]['image']['#item']['attributes']['class'][] = 'img-fluid'; // WORKS!
      }
    }

    if ($variables['view']->name == 'newest_ads') {
        foreach($variables['view']->result as $key => $var) {
          $variables['newest_ads'][$key]['title'] = $variables['view']->result[$key]->node_title;

          $variables['newest_ads'][$key]['location'] = $variables['view']->result[$key]->field_field_town[0]['rendered']['#markup'] .", ". $variables['view']->result[$key]->field_field_city[0]['rendered']['#markup'];

          $variables['newest_ads'][$key]['price'] = $variables['view']->result[$key]->field_field_price3[0]['rendered'];

          $variables['newest_ads'][$key]['image'] = $variables['view']->result[$key]->field_field_image2[0]['rendered'];

          // Adding a class to an image
          $variables['newest_ads'][$key]['image']['#item']['attributes']['class'][] = 'img-fluid'; // WORKS!
      }
    }

    if ($variables['view']->name == 'category_views') {
        foreach($variables['view']->result as $key => $var) {
          $variables['category_view_count'][$key]['title'] = $variables['view']->result[$key]->taxonomy_term_data_node_name;
          $variables['category_view_count'][$key]['count'] = $variables['view']->result[$key]->nodeviewcount_nid;
          $variables['category_view_count'][$key]['image'] = $variables['view']->result[$key]->field_field_category_image[0]['rendered'];
          $variables['category_view_count'][$key]['image']['#item']['attributes']['class'][] = 'img-fluid'; // WORKS!
      }
    }

    if ($variables['view']->name == 'latest_news') {
        foreach($variables['view']->result as $key => $var) {
          $variables['latest_news'][$key]['title'] = $variables['view']->result[$key]->node_title;
          $variables['latest_news'][$key]['topic'] = $variables['view']->result[$key]->field_field_topic[0]['rendered'];
          $variables['latest_news'][$key]['image'] = $variables['view']->result[$key]->field_field_image3[0]['rendered'];
          $variables['latest_news'][$key]['image']['#item']['attributes']['class'][] = 'img-fluid'; // WORKS!
      }
    }

    if ($variables['view']->name == 'ads_by_cities') {
        foreach($variables['view']->result as $key => $var) {
          $variables['ads_by_cities'][$key]['city'] = $variables['view']->result[$key]->field_data_field_city_field_city_value;
          $variables['ads_by_cities'][$key]['ads'] = $variables['view']->result[$key]->nodeviewcount_nid;
          $variables['ads_by_cities'][$key]['image'] = $variables['view']->result[$key]->field_field_city_image[0]['rendered'];
          $variables['ads_by_cities'][$key]['image']['#item']['attributes']['class'][] = 'img-fluid'; // WORKS!
      }
    }
}

/**
 * Implement hook_theme()
 */
function ager_theme() {
    return array(
        'views_exposed_form__listings__page' => array(   // should have the form_id
            'render element' => 'form',
            'template' => 'views-exposed-form--listings--page',
            'path' => drupal_get_path('theme', 'ager') . '/template/views/form',
        ),
    );
}

/**
 * Implement hook_form_alter()
 * @param $form
 * @param $form_state
 * @param $form_id
 */
function ager_form_alter(&$form, &$form_state, $form_id) {
    if($form['#id'] == 'views-exposed-form-listings-page') {
        $form['field_category']['#theme_wrappers'] = array();
        $form['field_category']['#options']['All'] = t('Category');
        $form['search_api_views_fulltext']['#theme_wrappers'] = array();
        $form['search_api_views_fulltext']['#attributes']['class'] = array('form-control');
        $form['search_api_views_fulltext']['#attributes']['placeholder'] = array('(keyword, e.g. car)');
        $form['search_api_views_fulltext_1']['#theme_wrappers'] = array();
        $form['search_api_views_fulltext_1']['#attributes']['class'] = array('form-control');
        $form['search_api_views_fulltext_1']['#attributes']['placeholder'] = array('(city, address...)');
        $form['submit']['#attributes']['class'] = array('btn', 'btn-primary', 'col-sm-2', 'ml-2', 'mb-2');
        $form['submit']['#value'] = t('Search');
    }
}
