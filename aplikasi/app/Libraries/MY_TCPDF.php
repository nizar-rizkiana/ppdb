<?php

namespace App\Libraries;

use TCPDF;

class MY_TCPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        $image_file = ROOTPATH.'../assets/img/banten.png';
        $image_file2 = ROOTPATH.'../assets/img/logo.jfif';
        /**
         * width : 50
         */
        $this->setX(25);
        $this->Image($image_file, '', '', 20);
        $this->setX(165);
        $this->Image($image_file2, '', '', 20);
        // Set font
        $this->SetFont('helvetica', 'B', 12);
        $this->setX(70);
        // $this->Cell(0, 2, 'PEMERINTAH PROVINSI BANTEN', 0, 1, '', 0, '', 0);
        $this->Cell(0, 2, 'PEMERINTAH PROVINSI BANTEN', 0, 1, '', 0, '', 0);
        // Title
        $this->SetX(65);
        $this->Cell(0, 2, 'DINAS PENDIDIKAN DAN KEBUDAYAAN', 0, 1, '', 0, '', 0);
        $this->SetX(77);
        $this->Cell(0, 2, 'UNIT PELAKSANA TEKNIS', 0, 1, '', 0, '', 0);
        $this->SetFont('helvetica', 'B', 13);
        $this->SetX(70);
        $this->Cell(0, 2, 'SMK NEGERI 4 PANDEGLANG', 0, 1, '', 0, '', 0);
        $this->SetFont('helvetica', '', 9);
        $this->SetX(25);
        $this->Cell(0, 3, 'Alamat: jl. Raya Saketi - Malingping Km. 07 Bojong - Pandeglang 42274, Web: https://smkn4pandeglang.sch.id', 0, 3, '', 0, '', 0);
        
        // QRCODE,H : QR-CODE Best error correction
        // $this->write2DBarcode('https://sobatcdoing.com', 'QRCODE,H', 0, 3, 20, 20, ['position' => 'R'], 'N');

        $style = array('width' => 0.50, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0));
        $this->Line(15, 33, 195, 33, $style);

    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}