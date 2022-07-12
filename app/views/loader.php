<?php

namespace View;

// if (!isset($_SESSION)) {
//     session_start();
// };

isset($_SESSION) ? '':session_start();

class Loader {
	public static function make() {
		$twig = new \Twig\Environment(new \Twig\Loader\FilesystemLoader(dirname(__FILE__)), array('cache' => false));
		$twig->addGlobal('session', $_SESSION);
		return $twig;
	}
}
