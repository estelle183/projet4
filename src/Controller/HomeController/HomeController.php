<?php
namespace App\Controller\HomeController;


use App\Model\ChapterManager;

class HomeController {

    /**
     * Render the homepage with the three last chapters
     */
	public function homePage() {
        $chManager = new ChapterManager();
        $chapters = $chManager->getThreeLastChapters();
	    require ('src/View/home/home.php');
	}

}



