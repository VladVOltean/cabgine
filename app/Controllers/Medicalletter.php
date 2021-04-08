<?php

namespace App\Controllers;


class Medicalletter extends BaseController
{
	public function index($idpatient, $idconsult)
	{
		helper('letter');

		$data=letter_data($idpatient, $idconsult);
		echo view('medicalletter', $data);


	}
	function htmlToPDF($idpatient, $idconsult)
	{
		helper('letter');

		$data=letter_data($idpatient, $idconsult);
        $dompdf = new \Dompdf\Dompdf(); 
        $dompdf->loadHtml(view('letter/pdf_letter',$data));
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream();
    }
}
