<?php
namespace App\Controller\HomeController;


use App\Model\ChapterManager;

class HomeController {

	public function homePage() {
        $chManager = new ChapterManager();
        $chapters = $chManager->getFiveLastChapters();
	    require ('src/View/home/home.php');
	}

}



