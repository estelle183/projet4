<?php

namespace App\Controller\LegalController;


class LegalController
{
    /**
     * Render the legal notice page
     */
    public function LegalNoticePage() {
        require ('src/View/legalNotice.php');
    }
}