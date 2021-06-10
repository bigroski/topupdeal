<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'category_icon' => array(    
		'type'  => 'icon-v2',

	    /**
	     * small | medium | large | sauron
	     * Yes, sauron. Definitely try it. Great one.
	     */
	    'preview_size' => 'medium',

	    /**
	     * small | medium | large
	     */
	    'modal_size' => 'medium',

	    /**
	     * There's no point in configuring value from code here.
	     *
	     * I'll document the result you get in the frontend here:
	     * 'value' => array(
	     *   'type' => 'icon-font', // icon-font | custom-upload
	     *
	     *   // ONLY IF icon-font
	     *   'icon-class' => '',
	     *   'icon-class-without-root' => false,
	     *   'pack-name' => false,
	     *   'pack-css-uri' => false
	     *
	     *   // ONLY IF custom-upload
	     *   // 'attachment-id' => false,
	     *   // 'url' => false
	     * ),
	     */

	    'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
	    'label' => __('Category Icon', '{domain}'),
	    
	)
);