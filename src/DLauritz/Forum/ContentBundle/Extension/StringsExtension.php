<?php

namespace DLauritz\Forum\ContentBundle\Extension;

class StringsExtension extends \Twig_Extension {
	
	public function getFilters() {
		return array(
			'truncate' => new \Twig_Filter_Method($this, 'truncate')
		);
	}
	
	public function getName() {
		return 'strings_extension';
	}
	
	// The body of this function was taken from 
	// http://hugohamon.com/en/blog/six-reasons-why-twig-template-engine-makes-my-life-better
	public function truncate($text, $max = 50) {
		$lastSpace = 0;
 
        if (strlen($text) >= $max)
        {
            $text = substr($text, 0, $max);
            $lastSpace = strrpos($text,' ');
            $text = substr($text, 0, $lastSpace).'...';
        }
 
        return $text;
	}
	
}
