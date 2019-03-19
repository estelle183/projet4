<?php
session_start();
require ('vendor/autoload.php');

use App\Controller\HomeController\HomeController;
use App\Controller\ChaptersController\ChaptersController;
use App\Controller\ChaptersController\ChapterController;
use App\Model\Chapters;
use App\Model\Comments;
use App\Controller\CommentsController\CommentsController;
use App\Controller\AdminController\AdminChaptersController;
use App\Controller\AdminController\AdminCommentsController;
use App\Controller\AdminController\AdminNewChapterController;
use App\Controller\AdminController\AdminReportedController;

$url = '';
if (isset($_GET['url'])) {
	$url = $_GET['url'];
}

if ($url === '') {
	$home = new HomeController();
	$home->homePage();
}


elseif ($url === 'chapitres') {
        $chapters = new ChaptersController();
        $chapters->chaptersPage();
    }

elseif ($url === 'chapitre') {
    $chapter = new Chapters(['id'=>$_GET['id']]);
    $chapterController = new ChapterController();
    $chapterController->chapterWithComments($chapter);
}

elseif ($url === 'addComment') {
if(isset($_POST['pseudo']) && isset($_POST['message']) && isset($_GET['id'])) {
    if(!empty($_POST['pseudo']) && !empty($_POST['message']) && !empty($_GET['id'])) {
        $commentController = new CommentsController();
        $commentController->addComment ($_GET['id'], $_POST['pseudo'], $_POST['message']);
    }
}
}

elseif ($url === 'reportedComment') {
    $comment = new Comments(['id'=>$_GET['id']]);
    $commentController = new CommentsController();
    $commentController->reportedComment ($comment, $_GET['id_chapter']);

}

elseif ($url === 'admin-modération') {
    $comments = new AdminCommentsController();
    $comments->adminReportedComments();
}

elseif ($url === 'admin-liste-chapitres') {
    $chapters = new AdminChaptersController();
    $chapters->adminChaptersPage();
        }

elseif ($url === 'addChapter') {
    $newChapter = new AdminNewChapterController();
    $newChapter->addChapter ($_POST['title'], $_POST['content']);
}

elseif ($url === 'adminCancelReport') {
    $comment = new Comments(['id'=>$_GET['id']]);
    $adminReportedController = new AdminReportedController();
    $adminReportedController->cancelReportedComment ($comment);
}

elseif ($url === "admin-nouveau-chapitre") {
$newChapter = new AdminNewChapterController();
$newChapter->newChapter();
}
