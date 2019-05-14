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
use App\Controller\AdminController\AdminAddChapterController;
use App\Controller\AdminController\AdminUpdateChapterController;
use App\Controller\AdminController\AdminDeleteChapterController;
use App\Controller\AdminController\AdminLoginController;
use App\Controller\ContactController\ContactController;
use App\Controller\AdminController\AdminHomeController;
use App\Controller\AdminController\AdminContactsController;
use App\Model\Contact;
use App\Controller\ErrorController\ErrorController;
use App\Controller\AdminController\AdminNewPasswordController;
use App\Controller\AuthorController\AuthorController;
use App\Controller\LegalController\LegalController;



$url = '';
if (isset($_GET['url'])) {
	$url = $_GET['url'];
}

// HOMEPAGE

if ($url === '') {
	$home = new HomeController();
	$home->homePage();

}

// CHAPTERS MANAGEMENT

elseif ($url === 'chapitres') {
        $chapters = new ChaptersController();
        $chapters->chaptersPage();
    }

elseif ($url === 'chapitre') {
    if (isset($_GET['id']) && !empty($_GET['id']) && preg_match ("/\d+/", $_GET['id'])) {
        $chapter = new Chapters(['id' => $_GET['id']]);
        $chapterController = new ChapterController();
        $chapterController->chapterWithComments ($chapter);
    } else {
        $error = new ErrorController();
        $error->Error404 ();
    }
}

// AUTHOR MANAGEMENT

elseif ($url === 'auteur') {
    $author = new AuthorController();
    $author->Author ();
}

// COMMENTS MANAGEMENT

elseif ($url === 'addComment') {
if(isset($_POST['pseudo']) && isset($_POST['message']) && isset($_POST['id'])) {
    if(!empty($_POST['pseudo']) && !empty($_POST['message']) && !empty($_POST['id'])) {
        $commentController = new CommentsController();
        $commentController->addComment ($_POST['id'], $_POST['pseudo'], $_POST['message']);
    }
}
else {
    $error = new ErrorController();
    $error->Error404 ();
}
}


elseif ($url === 'reportedComment') {
    $comment = new Comments(['id'=>$_GET['id']]);
    $commentController = new CommentsController();
    $commentController->reportedComment ($comment, $_GET['id_chapter']);

}

// CONTACT MANAGEMENT

elseif ($url === 'contact') {
    $contact = new ContactController();
    $contact->contactForm ();
}

elseif ($url === 'contact-form') {
    if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message']) && isset($_POST['consent']))
    {
        if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['subject']) && !empty($_POST['message']) && !empty($_POST['consent']) && $_POST['consent'] == 1)
        {
            if(preg_match ('#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#', $_POST['email']))
            {
            $contact = new ContactController();
            $contact->sendContactForm ($_POST['name'], $_POST['email'], $_POST['subject'], $_POST['message'], $_POST['consent']);
        }
            echo 'L\'adresse ' . $_POST['email'] . ' n\'est pas valide, recommencez !';
    }
} else {
        $error = new ErrorController();
        $error->Error404 ();
    }
    }

// ADMIN CONNECTION MANAGEMENT

elseif ($url === 'admin-connexion') {
    $login = new AdminLoginController();
    $login->adminLoginPage ();
}


elseif ($url === 'admin-connexion-check') {
    if (isset($_POST['pseudo']) && isset($_POST['password'])) {
        if (!empty($_POST['pseudo']) && !empty($_POST['password'])) {
            $login = new AdminLoginController();
            $login->checkLogin ($_POST['pseudo'], $_POST['password']);
        }
    }
    else {
        $error = new ErrorController();
        $error->Error404 ();
    }
}

elseif ($url === 'admin-oubli-motdepasse') {
    $password = new AdminNewPasswordController();
    $password->adminForgotPasswordPage ();

}

elseif ($url === 'admin-email-check') {
    if (isset($_POST['email'])) {
        if (!empty($_POST['email'])) {
            $password = new AdminNewPasswordController();
            $password->checkEmail ($_POST['email']);
        }
    }
    else {
        $error = new ErrorController();
        $error->Error404 ();
    }
}

elseif ($url === 'admin-nouveau-motdepasse') {
    if (isset($_GET['token']) && !empty($_GET['token'])) {
        $password = new AdminNewPasswordController();
        $password->resetPasswordForm ($_GET['token']);
    } else {
        $error = new ErrorController();
        $error->Error404 ();
    }
}

elseif ($url === 'admin-new-password') {
    if (isset($_POST['token']) && !empty($_POST['token'])) {
        if (isset($_POST['password']) && isset($_POST['password2'])) {
            if (!empty($_POST['password']) && !empty($_POST['password2'])) {
                if ($_POST['password'] === $_POST['password2']) {
                    $password = new AdminNewPasswordController();
                    $password->changePassword ($_POST['token'], password_hash ($_POST['password'], PASSWORD_BCRYPT));
                } else {
                    header("location:".  $_SERVER['HTTP_REFERER']);
                    $_SESSION['flash'] = "Les mots de passe ne sont pas identiques, recommencez !";
                    $flash = $_SESSION['flash'];

                }
            }
        }
    }
    else {
        $error = new ErrorController();
        $error->Error404 ();
    }
}

elseif ($url === 'admin-deconnexion') {
    session_destroy ();
    header('Location: chapitres');
}

elseif ($url === 'admin-signalement') {
    if (isset($_SESSION['pseudo'])) {
        $comments = new AdminCommentsController();
        $comments->adminReportedComments();
    } else {
        header ('Location: admin-connexion');
    }
}

// ADMIN HOMEPAGE MANAGEMENT

elseif ($url === 'admin-accueil') {
    if(isset($_SESSION['pseudo'])) {
        $nbChapters = new AdminHomeController();
        $nbChapters->adminChapterCount ();
    } else {
        header ('Location: admin-connexion');
    }
}

// ADMIN COMMENTS MANAGEMENT


elseif ($url === 'admin-moderation') {
    if (isset($_SESSION['pseudo'])) {
        $comments = new AdminCommentsController();
        $comments->adminModerateComments ();
    } else {
        header ('Location: admin-connexion');
    }
}

elseif ($url === 'adminCancelReport') {
    $comment = new Comments(['id'=>$_GET['id']]);
    $adminReportedController = new AdminReportedController();
    $adminReportedController->cancelReportedComment ($comment);
}

elseif ($url === 'adminModerate') {
    $comment = new Comments(['id'=>$_GET['id']]);
    $adminModerate = new AdminReportedController();
    $adminModerate->moderateComment ($comment);
}

elseif ($url === 'adminCancelModerate') {
    $comment = new Comments(['id'=>$_GET['id']]);
    $adminModerateController = new AdminReportedController();
    $adminModerateController->cancelModerateComment ($comment);
}

// ADMIN CHAPTERS MANAGEMENT


elseif ($url === 'admin-liste-chapitres') {
    if(isset($_SESSION['pseudo'])) {
        $chapters = new AdminChaptersController();
        $chapters->adminChaptersPage();
    } else {
        header('Location: admin-connexion');
    }

        }

elseif ($url === 'admin-nouveau-chapitre') {
    if(isset($_SESSION['pseudo'])) {
        $newChapter = new AdminNewChapterController();
        $newChapter->newChapter();
    } else {
        header ('Location: admin-connexion');
    }
}

elseif ($url === 'addChapter') {
        if (!empty($_POST['title']) && !empty($_POST['subtitle']) && !empty($_POST['content'])) {
            $newChapter = new AdminAddChapterController();
            $newChapter->addChapter ($_POST['title'], $_POST['subtitle'], $_POST['content']);
        }
        else {
            $error = new ErrorController();
            $error->Error404 ();
        }
}

elseif ($url === 'admin-modification-chapitre') {
    if(isset($_SESSION['pseudo'])) {
    $chapter = new Chapters(['id'=>$_GET['id']]);
    $getOneChapter = new AdminUpdateChapterController();
    $getOneChapter->getChapter($chapter);
} else {
        header ('Location: admin-connexion');
    }
}

elseif ($url === 'updateChapter') {
    $chapter = new Chapters(['id'=>$_POST['id']]);
    $updateChapter = new AdminUpdateChapterController();
    $updateChapter->updateChapter($_POST['id'], $_POST['title'], $_POST['subtitle'], $_POST['content']);
}

elseif ($url === 'admin-suppression-chapitre') {
    if(isset($_SESSION['pseudo'])) {
    $chapter = new Chapters(['id'=>$_GET['id']]);
    $getOneChapter = new AdminDeleteChapterController();
    $getOneChapter->getChapter($chapter);
} else {
        header ('Location: admin-connexion');
    }
}

elseif ($url === 'deleteChapter') {
    $chapter = new Chapters(['id'=>$_GET['id']]);
    $deleteChapter = new AdminDeleteChapterController();
    $deleteChapter->deleteChapter($chapter);
}

// ADMIN CONTACT MANAGEMENT


elseif ($url === 'admin-gestion-contacts') {
    if(isset($_SESSION['pseudo'])) {
        $contacts = new AdminContactsController();
        $contacts->adminContactsPage ();
    } else {
        header ('Location: admin-connexion');
    }
}

elseif ($url === 'admin-vue-contacts') {
    if(isset($_SESSION['pseudo'])) {
        $contacts = new AdminContactsController();
        $contacts->adminAllContactsPage ();
    } else {
        header ('Location: admin-connexion');
    }
}

elseif ($url === 'adminProcessedMail')
{
    $contact = new Contact(['id'=>$_GET['id']]);
    $adminProcessed = new AdminContactsController();
    $adminProcessed->adminProcessedMail($contact);
}

elseif ($url === 'admin-mail') {
    if (isset($_SESSION['pseudo'])) {
        if (isset($_GET['id']) && !empty($_GET['id']) && preg_match ("/\d+/", $_GET['id'])) {
            $contact = new Contact(['id'=> $_GET['id']]);
             $contactController = new AdminContactsController();
             $contactController->getMail ($contact);
        }
    } else {
        header ('Location: admin-connexion');
    }
}

// LEGAL NOTICE PAGE MANAGEMENT

elseif ($url === 'mentions-legales') {
    $legal = new LegalController();
    $legal->LegalNoticePage ();
}

// ERROR PAGE MANAGEMENT

else {
$error = new ErrorController();
$error->Error404 ();
}