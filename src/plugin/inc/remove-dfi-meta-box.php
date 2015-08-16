<?php

function filter_post_types() {
	return array('rp3_cpt_work');
}

add_filter('dfi_post_types', 'filter_post_types');
