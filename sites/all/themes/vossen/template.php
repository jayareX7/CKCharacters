<?php

function vossen_preprocess_html(&$variables)
{
  // Add variables for path to theme.
  $variables['base_path'] = base_path();
  $variables['path_to_theme'] = drupal_get_path('theme', 'vossen');
}

/**
 * Unset core and contrib JS and CSS files.
 */
function vossen_css_alter(&$css) {
  // Unset Drupal core CSS files to avoid conflicts; we'll style these in the main stylesheets
  unset($css[drupal_get_path('module', 'system') . '/system.menus.css']);
  unset($css[drupal_get_path('module', 'system') . '/system.messages.css']);
  unset($css[drupal_get_path('module', 'system') . '/system.theme.css']);
  unset($css[drupal_get_path('module', 'user') . '/user.css']);
  unset($css[drupal_get_path('module', 'field') . '/theme/field.css']);
}

/**
 * Override or insert variables into the page template for specific content types.
 */
function vossen_preprocess_page(&$variables) {
  if (isset($variables['node']->type)) {
    $nodetype = $variables['node']->type;
    $variables['theme_hook_suggestions'][] = 'page__' . $nodetype;
  }

  drupal_add_js((drupal_get_path('theme', 'vossen') . '/js/plugins/moderniz.min.js'), array('type' => 'file', 'scope' => 'footer', 'weight' => 1));
  drupal_add_js((drupal_get_path('theme', 'vossen') . '/js/plugins/smoothscroll.min.js'), array('type' => 'file', 'scope' => 'footer', 'weight' => 2));
  drupal_add_js((drupal_get_path('theme', 'vossen') . '/js/plugins/revslider.min.js'), array('type' => 'file', 'scope' => 'footer', 'weight' => 3));
  drupal_add_js((drupal_get_path('theme', 'vossen') . '/js/plugins/bootstrap.min.js'), array('type' => 'file', 'scope' => 'footer', 'weight' => 4));
  drupal_add_js((drupal_get_path('theme', 'vossen') . '/js/plugins/waypoints.min.js'), array('type' => 'file', 'scope' => 'footer', 'weight' => 5));
  drupal_add_js((drupal_get_path('theme', 'vossen') . '/js/plugins/parallax.min.js'), array('type' => 'file', 'scope' => 'footer', 'weight' => 6));
  drupal_add_js((drupal_get_path('theme', 'vossen') . '/js/plugins/easign1.3.min.js'), array('type' => 'file', 'scope' => 'footer', 'weight' => 7));
  drupal_add_js((drupal_get_path('theme', 'vossen') . '/js/plugins/cubeportfolio.min.js'), array('type' => 'file', 'scope' => 'footer', 'weight' => 8));
  drupal_add_js((drupal_get_path('theme', 'vossen') . '/js/plugins/owlcarousel.min.js'), array('type' => 'file', 'scope' => 'footer', 'weight' => 9));
  drupal_add_js('http://maps.googleapis.com/maps/api/js?sensor=false', array('type' => 'external', 'scope' => 'footer', 'weight' => 10));
  drupal_add_js((drupal_get_path('theme', 'vossen') . '/js/plugins/gmap3.min.js'), array('type' => 'file', 'scope' => 'footer', 'weight' => 11));
  drupal_add_js((drupal_get_path('theme', 'vossen') . '/js/plugins/wow.min.js'), array('type' => 'file', 'scope' => 'footer', 'weight' => 12));
  drupal_add_js((drupal_get_path('theme', 'vossen') . '/js/plugins/counterup.min.js'), array('type' => 'file', 'scope' => 'footer', 'weight' => 13));
  drupal_add_js((drupal_get_path('theme', 'vossen') . '/js/plugins/masonry.js'), array('type' => 'file', 'scope' => 'footer', 'weight' => 14));
  drupal_add_js((drupal_get_path('theme', 'vossen') . '/js/scripts.js'), array('type' => 'file', 'scope' => 'footer', 'weight' => 15));
  drupal_add_js((drupal_get_path('theme', 'vossen') . '/js/imagesloaded.pkgd.min.js'), array('type' => 'file', 'scope' => 'footer', 'weight' => 16)); 
    
    drupal_add_js((drupal_get_path('theme', 'vossen') . '/js/cells-by-column.js'), array('type' => 'file', 'scope' => 'footer', 'weight' => 17));
    
    drupal_add_js((drupal_get_path('theme', 'vossen') . '/js/cells-by-row.js'), array('type' => 'file', 'scope' => 'footer', 'weight' => 18));
    
    drupal_add_js((drupal_get_path('theme', 'vossen') . '/js/horizontal.js'), array('type' => 'file', 'scope' => 'footer', 'weight' => 19));
    
    drupal_add_js((drupal_get_path('theme', 'vossen') . '/js/isotope.pkgd.js'), array('type' => 'file', 'scope' => 'footer', 'weight' => 20));
     drupal_add_js((drupal_get_path('theme', 'vossen') . '/js/isotope.pkgd.min.js'), array('type' => 'file', 'scope' => 'footer', 'weight' => 21));
    
     drupal_add_js((drupal_get_path('theme', 'vossen') . '/js/masonry.js'), array('type' => 'file', 'scope' => 'footer', 'weight' => 22));
    
     drupal_add_js((drupal_get_path('theme', 'vossen') . '/js/masonry.pkgd.js'), array('type' => 'file', 'scope' => 'footer', 'weight' => 23));
    
     drupal_add_js((drupal_get_path('theme', 'vossen') . '/js/masonry-horizontal.js'), array('type' => 'file', 'scope' => 'footer', 'weight' => 24));
    
     drupal_add_js((drupal_get_path('theme', 'vossen') . '/js/packery-mode.pkgd.js'), array('type' => 'file', 'scope' => 'footer', 'weight' => 25));
    
    
     drupal_add_js((drupal_get_path('theme', 'vossen') . '/js/jquery.autopager-1.0.0.js'), array('type' => 'file', 'scope' => 'footer', 'weight' => 26));
    
    
     drupal_add_js((drupal_get_path('theme', 'vossen') . '/js/jquery.cycle.all.js'), array('type' => 'file', 'scope' => 'footer', 'weight' => 27));
    
    

  if (theme_get_setting('sticky_header')) {
    drupal_add_js('
                   (function($) {
        $(window).scroll(function(){    
          /* -------------------
          Header Animation
          ---------------------*/
          if ($(this).scrollTop() > 5){  
            $(\'nav\').addClass("navbar-small")
          }
          else {
            $(\'nav\').removeClass("navbar-small")
          }
        });
      })(jQuery, window, document);',
                 array('type' => 'inline', 'scope' => 'footer', 'weight' => 17)); //end inline sticky-header
  }

  if (isset($variables['node']) && $variables['node']->type == 'homepage') {
    $map_address = theme_get_setting('map_address');
    $map_marker = theme_get_setting('map_marker');

    drupal_add_js((drupal_get_path('theme', 'vossen') . '/js/homepage.js'), array('type' => 'file', 'scope' => 'footer', 'weight' => 16));
    drupal_add_js('
                   (function($) {
                     /* -------------------
                     Google Maps
                     ---------------------*/
                     $("#map").gmap3({
                       marker:{     
                       address:" ' . $map_address . ' ", 
                       options:{ icon: "' . $map_marker . '"}},
                       map:{
                       options:{
                       styles: [ {
                       stylers: [ { "saturation":-90 }, { "lightness": 0 }, { "gamma": 0.0 }]},
                       ],
                       zoom: 13,
                       scrollwheel:false,
                       draggable: true }
                       }
                     });
                   })(jQuery, window, document);',
                 array('type' => 'inline', 'scope' => 'footer', 'weight' => 18)); //end inline drupal_add_js Google Maps
    $variables['scripts'] = drupal_get_js();
  }
}

function vossen_preprocess_views_view(&$vars) {
  if($vars['view']->name == 'blog' && $vars['view']->current_display == 'blog_masonry') {
    drupal_add_js('
                   var msnry = new Masonry( \'#masonry\', {
                     // options
                   });',
                 array('type' => 'inline', 'scope' => 'footer', 'weight' => 19)); //end inline masonry
  }
}

/**
 * Override or insert variables into the node template.
 */
function vossen_preprocess_node(&$variables)
{
  if ($variables['view_mode'] == 'full' && node_is_page($variables['node'])) {
    $variables['classes_array'][] = 'node-full';
  }
}

/**
 * Override or insert variables into the block template.
 */
function vossen_preprocess_block(&$variables)
{
  // In the header region visually hide block titles.
  if ($variables['block']->region == 'header') {
    $variables['title_attributes_array']['class'][] = 'element-invisible';
  }
}

/**
 * Implements theme_field__field_type().
 */
function vossen_field__taxonomy_term_reference($variables)
{
  $output = '';

  // Render the label, if it's not hidden.
  if (!$variables['label_hidden']) {
    $output .= '<h3 class="field-label">' . $variables['label'] . ': </h3>';
  }

  // Render the items.
  $output .= ($variables['element']['#label_display'] == 'inline') ? '<ul class="links inline">' : '<ul class="links">';
  foreach ($variables['items'] as $delta => $item) {
    $output .= '<li class="taxonomy-term-reference-' . $delta . '"' . $variables['item_attributes'][$delta] . '>' . drupal_render($item) . '</li>';
  }
  $output .= '</ul>';

  // Render the top-level DIV.
  $output = '<div class="' . $variables['classes'] . (!in_array('clearfix', $variables['classes_array']) ? ' clearfix' : '') . '"' . $variables['attributes'] . '>' . $output . '</div>';

  return $output;
}

/**
 * Implements theme_menu_tree().
 */
function vossen_menu_tree($variables)
{
  return '<ul class="menu clearfix">' . $variables['tree'] . '</ul>';
}

// Disabling the default system main menu
function vossen_links__system_main_menu() {
  return null;
}

// main-menu: Adding classes to main <ul>
function vossen_menu_tree__main_menu($variables) {
  return '<ul class="nav navbar-nav navbar-right">'.$variables['tree'].'</ul>';
}

// main-menu: Adding classes to dropdown <ul>
function vossen_menu_tree__main_menu_inner($variables) {
    return '<ul class="dropdown-menu" role="menu">' . $variables['tree'] . '</ul>';
}

// main-menu: Theming menu links
function vossen_menu_link__main_menu(array $variables) {
  $element = $variables['element'];
  $sub_menu = '';

  if ($element['#below']) {
    foreach ($element['#below'] as $key => $val) {
      if (is_numeric($key)) {             
        $element['#below'][$key]['#theme'] = 'menu_link__main_menu_inner'; // Second level <li>
      }
    }
    $element['#below']['#theme_wrappers'][0] = 'menu_tree__main_menu_inner';  // Second level <ul>
    $sub_menu = drupal_render($element['#below']);
    $output = l($element['#title'], $element['#href'], $element['#localized_options']);
    return '<li' . drupal_attributes($element['#attributes']) . '><span class="dropdown-toggle" data-toggle="dropdown">' . $output . '<b class="caret"></b></span>' . $sub_menu . "</li>\n";
  }
  $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}

// main-menu: Theming inner menu links
function vossen_menu_link__main_menu_inner(array $variables) {
  $element = $variables['element'];
  $sub_menu = '';

  if ($element['#below']) {
    $sub_menu = drupal_render($element['#below']);
  }

  $element['#localized_options']['html'] = TRUE;
  $linktext = '<span>' . $element['#title'] . '</span>';

  $output = l($linktext, $element['#href'], $element['#localized_options']);
  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}

/**
 * Form alter
 */
function vossen_form_alter(&$form, &$form_state, $form_id)
{
  // Main contact form
  if ($form_id == 'contact_site_form') {
    $form['#attributes'] = array('class' => 'col-md-6 col-md-offset-3 text-center wow fadeInUp animated');
    $form['name']['#attributes']['placeholder'] = t('Name');
    $form['mail']['#attributes']['placeholder'] = t('Email');
    $form['subject']['#attributes']['placeholder'] = t('Subject');
    $form['message']['#attributes']['placeholder'] = t('Message');
    unset($form['name']['#title']);
    unset($form['mail']['#title']);
    unset($form['subject']['#title']);
    unset($form['message']['#title']);
    $form['message']['#resizable'] = FALSE;
  }
  // Search page form
  if ($form_id == 'search_form') {
    // Adding placeholders to fields
    $form['basic']['keys']['#attributes']['placeholder'] = t('Enter some terms...');
    $form['advanced']['keywords']['or']['#attributes']['placeholder'] = t('e.g. bike, shed');
    $form['advanced']['keywords']['phrase']['#attributes']['placeholder'] = t('e.g. outside the bike shed');
    $form['advanced']['keywords']['negative']['#attributes']['placeholder'] = t('e.g. bicycle');
    unset($form['basic']['keys']['#title']);
  }
  // Search form block 
  if ($form_id == 'search_block_form') {
    $form['search_block_form']['#attributes']['placeholder'] = t('Search Blog');
    $form['search_block_form']['#attributes']['class'][] = 'form-control search';

    // Hide main search button, but don't unset
    hide($form['actions']['submit']);

    $form['button'] = array(
      '#prefix' => '<span class="input-group-btn"><button type="submit" id="edit-submit" name="op" class="btn search-button"><span class="ion-search">',
      '#suffix' => '</span></button></span>',
      '#markup' => '', // Required to force the element to render
      '#weight' => 1000,
    );
  }
  // SIMPLENEWS SUBSCRIPTION FORM (FOOTER NEWSLETTER BLOCK: 1)
  $newsletter_subscription_id = theme_get_setting('newsletter_subscription_id');

  if ($form_id == 'simplenews_block_form_' . $newsletter_subscription_id) {
    $form['mail']['#attributes']['placeholder'] = t('Your Email Address');
    $form['submit']['#attributes']['class'][] = 'subscribe-form-submit btn-primary-full';
    $form['submit']['#attributes']['data-loading-text'] = 'Loading...';
    $form['submit']['#ajax'] = array(
      //'callback' => 'simplenews_block_form_ajax_submit_' . $newsletter_subscription_id,
      'callback' => 'simplenews_block_form_ajax_submit_1',
      'wrapper' => 'block-simplenews-' . variable_get('simplenews_id', $newsletter_subscription_id),
      'method' => 'replace',
      'effect' => 'fade',
      'progress' => array('type' => 'none'),
      'event' => 'click',
    );
    $form['submit']['#executes_submit_callback'] = TRUE;
    unset($form['#submit']);
    unset($form['#validate']);
    unset($form['mail']['#title']);
  }
  // SIMPLENEWS SUBSCRIPTION FORM (LAUNCH PAGE BLOCK: 2)
  $launch_list_subscription_id = theme_get_setting('launch_list_subscription_id');

  if ($form_id == 'simplenews_block_form_' . $launch_list_subscription_id) {
    $form['#attributes']['class'][] = 'input-group';
    $form['mail']['#attributes']['placeholder'] = t('Your Email Address');
    $form['submit']['#attributes']['class'][] = 'subscribe-form-submit btn-primary-full';
    $form['submit']['#attributes']['data-loading-text'] = 'Loading...';
    $form['submit']['#prefix'] = '<span class="input-group-btn sign-btn">';
    $form['submit']['#suffix'] = '</span>';
    $form['submit']['#ajax'] = array(
      'callback' => 'simplenews_block_form_ajax_submit_2',
      'wrapper' => 'block-simplenews-' . variable_get('simplenews_id', $launch_list_subscription_id),
      'method' => 'replace',
      'effect' => 'fade',
      'progress' => array('type' => 'none'),
      'event' => 'click',
    );
    $form['submit']['#executes_submit_callback'] = TRUE;
    unset($form['#submit']);
    unset($form['#validate']);
    unset($form['mail']['#title']);
  }
}

/**
 * AJAX CALLBACK: SIMPLENEWS SUBSCRIPTION FORM (FOOTER NEWSLETTER BLOCK: 1)
 */
function simplenews_block_form_ajax_submit_1($form, $form_state) {
  $newsletter_subscription_id = theme_get_setting('newsletter_subscription_id');

  $return = '<div id="block-simplenews-'. $newsletter_subscription_id.' " class="block block-simplenews">';
  $return .= '<h2>' . t('Newsletter') . '</h2>';
  if (!valid_email_address($form_state['values']['mail'])) {
    $return .= '<div class="form-validation alert alert-danger">' . t('The e-mail address is not valid.') . '</div>';
    return $return . render($form);
  }
  else {
    if (module_exists('simplenews')) {
      module_load_include('inc', 'simplenews', 'views/simplenews.subscription');
      $tid = $form['#tid'];
      $account = simplenews_load_user_by_mail($form_state['values']['mail']);
      $confirm = simplenews_require_double_opt_in($tid, $account);

      switch ($form_state['values']['action']) {
        case 'subscribe':
          simplenews_subscribe_user($form_state['values']['mail'], $tid, $confirm, 'website');
          if ($confirm) {
            $return .= '<div class="form-validation alert alert-success">' . t('Success! Please check your e-mail to complete your subscription.') . '</div>';
            return $return . render($form);
          }
          else {
            $return .= '<div class="form-validation alert alert-success">' . t('Success! You\'ve been subscribed to our newsletter.') . '</div>';
            return $return . '<input disabled class="subscribe-form-submit btn-primary-full btn submit ajax-processed" data-loading-text="Loading..." type="submit" id="edit-submit" name="op" value="Subscribed">';
          }
        break;
        case 'unsubscribe':
          simplenews_unsubscribe_user($form_state['values']['mail'], $tid, $confirm, 'website');
          if ($confirm) {
            $return .= '<div class="form-validation alert alert-success">' . t('You\'re nearly there. Please check your e-mail to confirm.') . '</div>';
            return $return . render($form);
          }
          else {
            $return .= '<div class="form-validation alert alert-success">' . t('OK, you\'re unsubscribed. Sorry to see you go.') . '</div>';
            return $return . '<input disabled class="subscribe-form-submit btn-primary-full btn submit ajax-processed" data-loading-text="Loading..." type="submit" id="edit-submit" name="op" value="Unsubscribed">';
          }
        break;
      }
    }
  }
  $return .= render($form);
  $return .= '</div>';
}

/**
 * AJAX CALLBACK: SIMPLENEWS SUBSCRIPTION FORM (FOOTER NEWSLETTER BLOCK: 2)
 */
function simplenews_block_form_ajax_submit_2($form, $form_state) {
  $launch_list_subscription_id = theme_get_setting('launch_list_subscription_id');

  $return = '<div id="block-simplenews-'. $launch_list_subscription_id.'" class="block block-simplenews home-signin input-group wow fadeIn animated home-signin-return">';
  //$return .= '<h2>' . t('Newsletter') . '</h2>';
  if (!valid_email_address($form_state['values']['mail'])) {
    $return .= '<div class="form-validation alert alert-danger">' . t('The e-mail address is not valid.') . '</div>';
    return $return . render($form);
  }
  else {
    if (module_exists('simplenews')) {
      module_load_include('inc', 'simplenews', 'views/simplenews.subscription');
      $tid = $form['#tid'];
      $account = simplenews_load_user_by_mail($form_state['values']['mail']);
      $confirm = simplenews_require_double_opt_in($tid, $account);

      switch ($form_state['values']['action']) {
        case 'subscribe':
          simplenews_subscribe_user($form_state['values']['mail'], $tid, $confirm, 'website');
          if ($confirm) {
            $return .= '<div class="form-validation alert alert-success">' . t('Success! Please check your e-mail to complete your subscription.') . '</div>';
            return $return . render($form);
          }
          else {
            $return .= '<div class="form-validation alert alert-success">' . t('Success! You\'ve been subscribed to our newsletter.') . '</div>';
            return $return . '<input disabled class="subscribe-form-submit btn-primary-full btn submit ajax-processed" data-loading-text="Loading..." type="submit" id="edit-submit" name="op" value="Subscribed">';
          }
        break;
        case 'unsubscribe':
          simplenews_unsubscribe_user($form_state['values']['mail'], $tid, $confirm, 'website');
          if ($confirm) {
            $return .= '<div class="form-validation alert alert-success">' . t('You\'re nearly there. Please check your e-mail to confirm.') . '</div>';
            return $return . render($form);
          }
          else {
            $return .= '<div class="form-validation alert alert-success">' . t('OK, you\'re unsubscribed. Sorry to see you go.') . '</div>';
            return $return . '<input disabled class="subscribe-form-submit btn-primary-full btn submit ajax-processed" data-loading-text="Loading..." type="submit" id="edit-submit" name="op" value="Unsubscribed">';
          }
        break;
      }
    }
  }
  $return .= render($form);
  $return .= '</div>';
}

// Theming comment form
function vossen_form_comment_form_alter(&$form, &$form_state) {
  $form['author']['name']['#attributes']['placeholder'] = t('Name');
  $form['author']['mail']['#attributes']['placeholder'] = t('Email (Will be kept private)');
  $form['subject']['#attributes']['placeholder'] = t('Subject');
  $form['comment_body'][$form['comment_body']['#language']][0]['#attributes']['placeholder'] = t('Comment');
  $form['comment_body'][$form['comment_body']['#language']][0]['#resizable'] = false;
  $form['comment_body']['#after_build'][] = 'vossen_configure_comment_form';
  $form['actions']['submit']['#attributes']['value'][] = t('Post comment');
  $form['actions']['submit']['#attributes']['class'][] = 'btn-xs';
  $form['actions']['cancel']['#attributes']['class'][] = 'btn-xs';
  unset($form['actions']['preview']);
  $form['author']['homepage']['#access'] = FALSE;
}

function vossen_configure_comment_form(&$form) {
  unset($form[LANGUAGE_NONE][0]['format']);
  return $form;
}

/* Theming all submit buttons */
function vossen_button($variables) {
  $element = $variables ['element'];
  $element ['#attributes']['type'] = 'submit';
  element_set_attributes($element, array('id', 'name', 'value'));
  $element ['#attributes']['class'][] = 'btn btn-primary submit';
  if (!empty($element ['#attributes']['disabled'])) {
    $element ['#attributes']['class'][] = 'form-button-disabled';
  }
  return '<input' . drupal_attributes($element ['#attributes']) . ' />';
}

/* Pager */
function vossen_pager_link($variables) {
  $text = $variables['text'];
  $page_new = $variables['page_new'];
  $element = $variables['element'];
  $parameters = $variables['parameters'];
  $attributes = $variables['attributes'];

  $page = isset($_GET['page']) ? $_GET['page'] : '';
  if ($new_page = implode(',', pager_load_array($page_new[$element], $element, explode(',', $page)))) {
    $parameters['page'] = $new_page;
  }

  $query = array();
  if (count($parameters)) {
    $query = drupal_get_query_parameters($parameters, array());
  }
  if ($query_pager = pager_get_query_parameters()) {
    $query = array_merge($query, $query_pager);
  }

  // Set each pager link title
  if (!isset($attributes['title'])) {
    static $titles = NULL;
    if (!isset($titles)) {
      $titles = array(
        t('?? first') => t('Go to first page'),
        t('??? previous') => t('Go to previous page'),
        t('next ???') => t('Go to next page'),
        t('last ??') => t('Go to last page'),
      );
    }
    if (isset($titles[$text])) {
      $attributes['title'] = $titles[$text];
    }
    elseif (is_numeric($text)) {
      $attributes['title'] = t('Go to page @number', array('@number' => $text));
    }
  }

  // @todo l() cannot be used here, since it adds an 'active' class based on the
  //   path only (which is always the current path for pager links). Apparently,
  //   none of the pager links is active at any time - but it should still be
  //   possible to use l() here.
  // @see http://drupal.org/node/1410574
  $attributes['href'] = url($_GET['q'], array('query' => $query));
  return '<a' . drupal_attributes($attributes) . '>' . $text . '</a>';
}

/* Messages */
function vossen_status_messages($variables) {
  $display = $variables['display'];
  $output = '';

  $status_heading = array(
    'status' => t('Status message'),
    'error' => t('Error message'),
    'warning' => t('Warning message'),
  );

  // Mapping default Drupal message statuses to Bootstrap statuses
  $bootstrap_statuses = array(
    'status' => 'alert-success',
    'error' => 'alert-warning',
    'warning' => 'alert-danger',
  );

  foreach (drupal_get_messages($display) as $type => $messages) {
    // Grab class for Bootstrap status matching its $type
    $bootstrap_class = $bootstrap_statuses[$type];
    $output .= "<div class=\"fade-in alert $bootstrap_class\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">??</button>\n";
    if (!empty($status_heading[$type])) {
      $output .= '<h2 class="element-invisible">' . $status_heading[$type] . "</h2>\n";
    }
    if (count($messages) > 1) {
      $output .= " <ul>\n";
      foreach ($messages as $message) {
        $output .= '  <li>' . $message . "</li>\n";
      }
      $output .= " </ul>\n";
    }
    else {
      $output .= $messages[0];
    }
    $output .= "</div>\n";
  }
  return $output;
}

/* System Tabs */
function vossen_menu_local_tasks(&$variables) {
  $output = '';

  if (!empty($variables['primary'])) {
    $variables['primary']['#prefix'] = '<h2 class="element-invisible">' . t('Primary tabs') . '</h2>';
    $variables['primary']['#prefix'] .= '<ul class="tabs primary nav nav-tabs">';
    $variables['primary']['#suffix'] = '</ul>';
    $output .= drupal_render($variables['primary']);
  }
  if (!empty($variables['secondary'])) {
    $variables['secondary']['#prefix'] = '<h2 class="element-invisible">' . t('Secondary tabs') . '</h2>';
    $variables['secondary']['#prefix'] .= '<ul class="tabs secondary nav nav-tabs">';
    $variables['secondary']['#suffix'] = '</ul>';
    $output .= drupal_render($variables['secondary']);
  }

  return $output;
}
