<?php
/**
 * Created by PhpStorm.
 * User: rodrigo
 * Date: 20/08/18
 * Time: 10:16
 */

namespace App\Views;


class View
{
	private $page;
	private $params;

	public function __construct($page) {
		$this->page = $page;
	}

	public function assign($params) {
		$this->params = $params;
	}
	public function render() {
		ob_start();
		require "app/Views/layout/header.php";
		$file = "app/Views/pages/".$this->page.'.php';
		if(file_exists($file)) {
			require $file;
		} else {
			die("Couldn't find the page specified.");
		}
		require "app/Views/layout/footer.php";
		ob_end_flush();
	}
}