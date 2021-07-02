<?php

namespace App\Controllers;


class Medicalletter extends BaseController
{
	public function index($idpatient, $idconsult)
	{
		helper('letter');

			if ($this->request->getMethod() == 'post')
			{

				$data=letter_data($idpatient, $idconsult);
				echo view('letter/view_letter', $data);

			}
			else
			{
				if($idconsult != "undefined")
				{
				$data=letter_data($idpatient, $idconsult);
				echo view('letter/medicalletter', $data);
				}
				else 
				{
				$session = session();
				$session->setFlashdata('letter', 'No previous consults. Save a new consult to preview the Medical-letter');
				return $this->response->redirect('/medicalrecord/'.$idpatient);
				}
			}

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
