<?php

namespace App\Traits\Pdf;

use PDF;

trait ConfigPdf
{
    private function config(string $title = 'Comprovante de inscrição'): void
    {
        PDF::SetCreator('Sistema de Gestão de Editais');
        PDF::SetAuthor('Gestor cultural');
        PDF::SetTitle($title);
        PDF::SetSubject('Cultura');
        PDF::SetKeywords('Cultura, artistas');

        $marginLeft = 10;
        $marginRight = 10;
        $marginTop = 20;

        PDF::SetMargins($marginLeft, $marginTop, $marginRight);
        PDF::SetHeaderMargin(0);
    }
}
