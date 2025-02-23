<?php

namespace App\Traits\Pdf;

use App\Models\Setting;
use PDF;

trait HeaderPdf
{
    private function header(string $tenantName = 'E-cultural', string $companyName = 'E-cultural', string $title = 'E-cultural'): void
    {
        PDF::setHeaderCallback(function ($pdf) use ($tenantName, $companyName, $title) {
            $pdf->SetXY(10, 5);
            $pdf->SetFont('helvetica', '', '10mm');

        /**
         * @param boolean $reseth if true reset the last cell height (default true).
         * @param int $stretch font stretch mode: <ul><li>0 = disabled</li><li>1 = horizontal scaling only if text is larger than cell width</li><li>2 = forced horizontal scaling to fit cell width</li><li>3 = character spacing only if text is larger than cell width</li><li>4 = forced character spacing to fit cell width</li></ul> General font stretching and scaling values will be preserved when possible.
         * @param boolean $ishtml INTERNAL USE ONLY -- set to true if $txt is HTML content (default = false). Never set this parameter to true, use instead writeHTMLCell() or writeHTML() methods.
         * @param boolean $autopadding if true, uses internal padding and automatically adjust it to account for line width.
         * @param float $maxh maximum height. It should be >= $h and less then remaining space to the bottom of the page, or 0 for disable this feature. This feature works only when $ishtml=false.
         * @param string $valign Vertical alignment of text (requires $maxh = $h > 0). Possible values are:<ul><li>T: TOP</li><li>M: middle</li><li>B: bottom</li></ul>. This feature works only when $ishtml=false and the cell must fit in a single page.
         * @param boolean $fitcell if true attempt to fit all the text within the cell by reducing the font size (do not work in HTML mode). $maxh must be greater than 0 and equal to $h.
         * @return int Return the number of cells or 1 for html mode.
         * @public
         * @since 1.3
         * @see SetFont(), SetDrawColor(), SetFillColor(), SetTextColor(), SetLineWidth(), Cell(), Write(), SetAutoPageBreak() */

        $multiCellWidth = 150; // largura da celula. se 0, a celula se extende para a margem a direita
        $multiCellHeight = 20; // Altura da celula. padrão 0.
        $text = " {$tenantName} \n {$companyName} \n {$title} \n ";
        $withBorder = 0; // 0: sem borda (default) 1: com borda, 'L': left 'T': top, 'R': right, 'B': bottom, array('LTRB' => array('width' => 2, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)))
        $positionCurrent = 1; // Indica onde a posição atual deve ir após a chamada. 0: to the right (or left for RTL languages)</li><li>1: to the beginning of the next line</li><li>2: below</li></ul> Putting 1 is equivalent to putting 0 and calling Ln() just after. Default value: 0.
        $alignText = ''; // C = CENTER, L = LEFT, R = RIGHT, J = JUSTIFY
        $fill = false; // $fill Indicates if the cell background must be painted (true) or transparent (false).
        $ln = ''; // Indicates where the current position should go after the call. Possible values are:<ul><li>0: to the right</li><li>1: to the beginning of the next line [DEFAULT]</li><li>2: below</li></ul>
        
        $x = null; // * @param float|null $x x position in user units
        $y = null; // * @param float|null $y y position in user units

        $reseth = true; // * $reseth if true reset the last cell height (default true).
        $stretch = 0; // * $stretch font stretch mode: <ul><li>0 = disabled</li><li>1 = horizontal scaling only if text is larger than cell width</li><li>2 = forced horizontal scaling to fit cell width</li><li>3 = character spacing only if text is larger than cell width</li><li>4 = forced character spacing to fit cell width</li></ul> General font stretching and scaling values will be preserved when possible.

        $isHtml = true; // * $ishtml INTERNAL USE ONLY -- set to true if $txt is HTML content (default = false). Never set this parameter to true, use instead writeHTMLCell() or writeHTML() methods.
        $autopadding = true; // *$autopadding if true, uses internal padding and automatically adjust it to account for line width.
        
        $maxh = 0; //  $maxh maximum height. It should be >= $h and less then remaining space to the bottom of the page, or 0 for disable this feature. This feature works only when $ishtml=false.
        $valign = 'T'; // $valign Vertical alignment of text (requires $maxh = $h > 0). Possible values are:<ul><li>T: TOP</li><li>M: middle</li><li>B: bottom</li></ul>. This feature works only when $ishtml=false and the cell must fit in a single page.
        $fitcell = false; // *$fitcell if true attempt to fit all the text within the cell by reducing the font size (do not work in HTML mode). $maxh must be greater than 0 and equal to $h.

        $pdf->MultiCell($multiCellWidth, $multiCellHeight, $text, $withBorder, $positionCurrent, $alignText, $fill, $ln, $x, $y, $reseth, $stretch, $isHtml, $autopadding, $maxh, $valign);

        $pdf->SetXY(10, 22);

            /**
             * Draws a line between two points.
             * @param float $x1 Abscissa of first point.
             * @param float $y1 Ordinate of first point.
             * @param float $x2 Abscissa of second point.
             * @param float $y2 Ordinate of second point.
             * @param array $style Line style. Array like for SetLineStyle(). Default value: default line style (empty array).
             * @public
             * @since 1.0
             * @see SetLineWidth(), SetDrawColor(), SetLineStyle()
             */
            $x1 = 10;
            $y1 = 21;
            $x2 = 199;
            $y2 = 21;
            $style = array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(214, 219, 228));
            $pdf->Line($x1, $y1, $x2, $y2, $style);
        });
    }
 
}
