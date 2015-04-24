<?php

function sisters_get_node_count($content_type) {
    $query = "SELECT COUNT(*) amount FROM {node} n ".
             "WHERE n.type = :type";
    $result = db_query($query, array(':type' => $content_type))->fetch();
    return $result->amount;
}

function sisters_pager($variables) {
  $tags = $variables['tags'];
  $element = $variables['element'];
  $parameters = $variables['parameters'];
  $quantity = $variables['quantity'];
  global $pager_page_array, $pager_total;

  // Calculate various markers within this pager piece:
  // Middle is used to "center" pages around the current page.
  $pager_middle = ceil($quantity / 2);
  // current is the page we are currently paged to
  $pager_current = $pager_page_array[$element] + 1;
  // first is the first page listed by this pager piece (re quantity)
  $pager_first = $pager_current - $pager_middle + 1;
  // last is the last page listed by this pager piece (re quantity)
  $pager_last = $pager_current + $quantity - $pager_middle;
  // max is the maximum page number
  $pager_max = $pager_total[$element];
  // End of marker calculations.

  // Prepare for generation loop.
  $i = $pager_first;
  if ($pager_last > $pager_max) {
    // Adjust "center" if at end of query.
    $i = $i + ($pager_max - $pager_last);
    $pager_last = $pager_max;
  }
  if ($i <= 0) {
    // Adjust "center" if at start of query.
    $pager_last = $pager_last + (1 - $i);
    $i = 1;
  }
  // End of generation loop preparation.

  $li_first = theme('pager_first', array('text' => t('«'), 'element' => $element, 'parameters' => $parameters));
  $li_previous = theme('pager_previous', array('text' => t('‹ Back'), 'element' => $element, 'interval' => 1, 'parameters' => $parameters));
  $li_next = theme('pager_next', array('text' => t('Next ›'), 'element' => $element, 'interval' => 1, 'parameters' => $parameters));
  $li_last = theme('pager_last', array('text' => t('»'), 'element' => $element, 'parameters' => $parameters));

  if ($pager_total[$element] > 1) {
    if ($li_first) {
      $items[] = array(
        'class' => array('pager-first'),
        'data' => $li_first,
      );
    }
    if ($li_previous) {
      $items[] = array(
        'class' => array('pager-previous'),
        'data' => $li_previous,
      );
    }

    // When there is more than one page, create the pager list.
    if ($i != $pager_max) {
      if ($i > 1) {
        $items[] = array(
          'class' => array('pager-ellipsis hidden'),
          'data' => '…',
        );
      }
      // Now generate the actual pager piece.
      for (; $i <= $pager_last && $i <= $pager_max; $i++) {
        if ($i < $pager_current) {
          $items[] = array(
            'class' => array('pager-item'),
            'data' => theme('pager_previous', array('text' => $i, 'element' => $element, 'interval' => ($pager_current - $i), 'parameters' => $parameters)),
          );
        }
        if ($i == $pager_current) {
          $items[] = array(
            'class' => array('pager-current active'),
            'data' => "<a href='#'>$i</a>",
          );
        }
        
        if ($i > $pager_current) {
          $items[] = array(
            'class' => array('pager-item'),
            'data' => theme('pager_next', array('text' => $i, 'element' => $element, 'interval' => ($i - $pager_current), 'parameters' => $parameters)),
          );
        }
      }
      if ($i < $pager_max) {
        $items[] = array(
          'class' => array('pager-ellipsis hidden'),
          'data' => '…',
        );
      }
    }
    // End generation.
    if ($li_next) {
      $items[] = array(
        'class' => array('pager-next'),
        'data' => $li_next,
      );
    }
    if ($li_last) {
      $items[] = array(
        'class' => array('pager-last'),
        'data' => $li_last,
      );
    }
    return '<div class="browse-page"><div class="gray-area"><div class="browse-paging  text-center">' . theme('item_list', array(
      'items' => $items,
      'attributes' => array('class' => array('pagination')),
    )) . '</div> <!-- ./browse-paging --> </div> <!-- browse paging --></div>';
  }
}

function sisters_form_alter(&$form, &$form_state, $form_id) {
  if ($form_id == 'search_block_form') {
    $form['search_block_form']['#title'] = t('Search collection'); // Change the text on the label element
    $form['search_block_form']['#title_display'] = 'invisible'; // Toggle label visibilty
    $form['actions']['submit']['#value'] = t('GO!'); // Change the text on the submit button
    $form['actions']['submit']['#class'] = t('GO!'); // Change the text on the submit button

    // Prevent user from searching the default text
    $form['#attributes']['onsubmit'] = "if(this.search_block_form.value.trim() == ''){ alert('Please enter a search'); return false; }";
    // Alternative (HTML5) placeholder attribute instead of using the javascript
    $form['search_block_form']['#attributes']['placeholder'] = t('Search collection');
    $form['search_block_form']['#attributes']['autocomplete'] = "off";
  }
}

function sisters_js_alter(&$javascript) {
  //We define the path of our new jquery core file
  //assuming we are using the minified version 1.8.3
  $jquery_path = drupal_get_path('theme','sisters') . '/resources/js/jquery-1.11.2.min.js';
 
  //We duplicate the important information from the Drupal one
  $javascript[$jquery_path] = $javascript['misc/jquery.js'];
  //..and we update the information that we care about
  $javascript[$jquery_path]['version'] = '1.11.2';
  $javascript[$jquery_path]['data'] = $jquery_path;
 
  //Then we remove the Drupal core version
  $javascript['misc/jquery.js'] = null;
  unset($javascript['misc/jquery.js']);
}

function sisters_get_all_of_type() {
	$query = new EntityFieldQuery();
	
	$query->entityCondition('entity_type', 'node')
	  ->entityCondition('bundle', 'browse_item')
	  ->propertyCondition('status', 1);
	
	$result = $query->execute();
	if (isset($result['node'])) {
	  	$news_items_nids = array_keys($result['node']);
	  	$news_items = entity_load('node', $news_items_nids);
	  
	  	$arr = array();
	  	foreach ($news_items as $value) {
		    array_push($arr, $value);
		}
		
		return $arr;
	}
	
	return null;
}

function pn_node($node, $mode = 'n') {
  if (!function_exists('prev_next_nid')) {
    return NULL;
  }

  switch($mode) {
    case 'p':
      $n_nid = prev_next_nid($node->nid, 'prev');
        $link_text = 'previous';
      break;
		
    case 'n':
      $n_nid = prev_next_nid($node->nid, 'next');
      $link_text = 'next';
    break;
		
    default:
    return NULL;
  }

  if ($n_nid) {
    $n_node = node_load($n_nid);
		
    switch($n_node->type) {	
      case 'article': 
        if ($mode == 'n'){ $title = 'Next Post &raquo'; } else { $title = '&laquo Previous Post'; }
        $html = l($title, 'node/'.$n_node->nid, array('html' => TRUE, 'attributes' => array('class' => array('prev-next'), 'title' => $n_node->title)));
      return $html; 
    }
  }
}
?>