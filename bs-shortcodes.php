<?php

/**
 * Set of shortcodes for twitter bootstrap 3.0, just include this file in your theme functions.php and off you go!
 */

/**
 * http://getbootstrap.com/components/#wells
 * @param type $atts
 * @param type $content
 * @return string
 */
function bs_well($atts, $content = null) {
    
    $a = shortcode_atts( array(
        'size' => ''
    ), $atts );
    
    $strHTML = '<div class="well';
    
    if($a['size'] != '') {
        $strHTML .= ' well-' . $a['size'];
    }
    
    $strHTML .= '">' . do_shortcode($content) . '</div>';
    
    return $strHTML;
        
}
add_shortcode('bs_well', 'bs_well');

/**
 * http://getbootstrap.com/components/#panels
 * @param type $atts
 * @param type $content
 * @return type
 */
function bs_panel($atts, $content = null) {
    
    $a = shortcode_atts( array(
        'type' => 'default',
        'title' => false
    ), $atts );
    
    ob_start();
?>
    <div class="panel panel-<?php $a['type']; ?>">
<?php
    if($a['title']):
?>
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $a['title']; ?></h3>
        </div>
<?php 
    endif; 
?>
        <div class="panel-body">
<?php        
    do_shortcode($content);
?>
        </div>
    </div>
<?php
    return ob_get_clean();
    
}
add_shortcode('bs_panel', 'bs_panel');


/**
 * http://getbootstrap.com/components/#badges
 * @param type $atts
 * @param type $content
 * @return type.
 */
function bs_badge($atts, $content = null) {
    
    $a = shortcode_atts( array(
        'color' => false
    ), $atts );
    
    if($a['color']) {
        $style = 'background-color:' . $a['color'];
    }
    
    ob_start();
?>
<span class="badge" style="<?php echo $style; ?>"><?php echo $content ?></span>
<?php
    return ob_get_clean();
}
add_shortcode('bs_badge', 'bs_badge');

/**
 * http://getbootstrap.com/components/#labels
 * @param type $atts
 * @param type $content
 * @return type
 */
function bs_label($atts, $content = null) {
    
    $a = shortcode_atts( array(
        'type' => 'default'
    ), $atts );
    
    ob_start();
?>
<span class="label label-<?php echo $a['type']; ?>"><?php echo $content; ?></span>
<?php
    return ob_get_clean();
}
add_shortcode('bs_label', 'bs_label');

/**
 * http://getbootstrap.com/javascript/#tabs
 * @param type $atts
 * @param type $content
 */
function bs_tabs($atts, $content = null) {
    
    $a = shortcode_atts( array(
        'type' => 'tabs',
        'stacked' => false,
        'justified' => false
    ), $atts);
    
    $pattern = get_shortcode_regex();
    preg_match_all( '/'. $pattern .'/s', $content, $matches );
    ob_start();
    
    $tabs = array();
    for($i=0;$i<sizeof($matches[3]);$i++) {
        
        $tabs[] = array(
            'title' => str_replace(array('title=', '"'), array('', ''), $matches[3][$i]),
            'content' => $matches[5][$i],
            'id' => uniqid('tab_')
        );
        
    }
    
?>
    <div role="tabpanel">
        <ul class="nav nav-<?php echo $a['type']; ?>">
<?php
    $i = 0;
    foreach($tabs as $tab):
?>        
        <li role="presentation" class="<?php if($i === 0) echo 'active'; ?>"><a href="#<?php echo $tab['id'] ?>" role="tab" data-toggle="tab"><?php echo $tab['title'] ?></a></li>
<?php
    $i++;
    endforeach;
?>
        </ul>
        <div class="tab-content">
<?php
    $i = 0;
    foreach($tabs as $tab):
?> 
            <div role="tabpanel" class="tab-pane fade<?php if($i === 0) echo ' in active'; ?>" id="<?php echo $tab['id'] ?>">
                <?php echo do_shortcode($tab['content']); ?>
            </div>
<?php
    $i++;
    endforeach;
?>
        </div>
    </div>
<?php
    return ob_get_clean();
}
add_shortcode('bs_tabs', 'bs_tabs');


/**
 * Dummy Shortcode to enable regex match within bs_tabs shortcode
 * @param type $atts
 * @param type $content
 */
function bs_pane($atts, $content = null) {
    $a = shortcode_atts( array(
        'title' => 'Pane Title',
        'disabled' => false
    ), $atts);
}
add_shortcode('bs_pane', 'bs_pane');

/**
 * 
 * @param type $atts
 * @param type $content
 */
function bs_row($atts, $content = null) {
    ob_start();
?>
<div class="row">
    <?php echo do_shortcode($content); ?>
</div>
<?php
    return ob_get_clean();
}
add_shortcode('bs_row', 'bs_row');

/**
 * 
 * @param type $atts
 * @param type $content
 */
function bs_col($atts, $content = null) {
    
    $a = shortcode_atts( array(
        'cols' => 1,
        'offset' => false
    ), $atts);
    
    $offset = '';
    
    if($a['offset']) {
        $offset .= ' col-sm-offset-' . $a['offset'];
    }
    
    ob_start();
?>
<div class="col-xs-1 col-sm-<?php echo $a['cols'] . $offset; ?>">
    <?php echo do_shortcode($content); ?>
</div>
<?php    
    return ob_get_clean();
}
add_shortcode('bs_col', 'bs_col');