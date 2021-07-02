<?php namespace App\Controllers;

use App\Models\ConsultModel;
use App\Models\PictureModel;


class History extends BaseController
{
	public function index($id_patient)
	{	
		helper(["url"]);

		$modelconsult = new ConsultModel();

		$data['patient'] =$id_patient;
		$data['consult'] = $modelconsult->getConsult($id_patient);

		foreach ($data['consult'] as &$consult) 
		{
			$consult['date'] = date('d-m-Y', strtotime($consult['date']));
		}
		
		echo view('patient_history/history',$data);
	}
	public function getpicture()
	{
		helper('image');
		$pictures = new PictureModel();
		$id=$this->request->getPost('id_consult');
		$data = $pictures->getPicture($id);
		$count=0;
		//$output='';
		$output = '
			<button class="btn btn-info load_file" id="'.$id.'">Load File</button>
			<div class="alert alert-success mt-2 d-none" id="message"></div>
			<div class="row">
			';
		foreach ($data  as $picture)
		{	
			$file=explode('.', $picture['pic_name']);
			$output .='
					<div class="col-md-3 mt-4" class="img-fluid">
					<img class="img-responsive show_pic" 
						 picture-ext="'.$file['1'].'"
						 picture-name="'.$file['0'].'" 
						 id="'.$picture['id_picture'].'"
						 consult="'.$picture['id_consult'].'"
					  ';
			$img_types=array("jpeg","jpg","png");
			if (in_array($file['1'],$img_types))
			{
				$output .='
						 pdf-src=""
						 src="'.src($picture['pic_name'],$id).'">
					<h6>'.$picture['pic_name'].'</h6>
					</div>
					';
			}
			else
			{	
				$output .='
						 pdf-src="'.src($picture['pic_name'],$id).'"
						 src="/assets/img/pdf.jpg">
					<h6>'.$picture['pic_name'].'</h6>
					</div>
					';
			}
			$count++;
		}
			if($count==0)
			{
				$output ='
					<button class="btn btn-info load_file" id="'.$id.'">Load File</button>
					<h3 align="center">There are no files for this consult</h3> 
						';
			}
		$output .='</div>';
		echo $output;
	}
	public function savepicture()
	{
		helper('image');
		$pictures = new PictureModel();
		$validation = \Config\Services::validation();
		$rules = [
			'files'=> [
			'rules'=>'uploaded[files.0]|max_size[files, 1024]|ext_in[files,jpeg,jpg,png,pdf]',
			'label' => 'The File'
			]
				];

      	$input = $validation->setRules($rules);

      		if ($validation->withRequest($this->request)->run() == FALSE)
			{

         		$data['success'] = 0;
        		$data['error'] = $validation->getError('files');// Error response
			}
			else
			{		

				$id=$this->request->getPost('id_consult');
				$path='./uploads/'.$id;
				$patient = $this->request->getPost('id_patient');
				if($files=$this->request->getFiles())
					{
						$data['consult']=$id;
						$count=0;
						foreach ($files['files'] as $file)
						{
							$new_name='';
							if($file->isValid() && !$file->hasMoved())
							{
								$data['load_name']= $file->getName();
								$filename=explode('.', $file->getName());
								$new_name .= $filename[0].'_cons_'.strval($id).'_patient_'.strval($patient).'.' . $file->getExtension();
								if($this->checkpicture($id, $new_name))
								{
									
									$file->move($path, $new_name);
									$pictures->save([
									'id_consult' =>$id,
									'pic_name'=> $new_name
									]);
									$data['success']=1;
									$data['message']='Upload successfuly';
									$data['files'][$count]=$new_name;
									$count++;
								}
								else {
									$data['files'][$count]=$new_name;
									$data['success']=2;
									$data['message']="File " .$new_name. " already uploaded";
								}
							}
						}
				}
			}
		return $this->response->setJSON($data);
	}
	public function deletepicture()
	{
		helper('image');
		$pictures = new PictureModel();
		$picture_id=$this->request->getPost('id_file');
		$id_consult=$this->request->getPost('id_consult');
		$data= $pictures->find($picture_id);
		$filename=$data['pic_name'];
		$file_path=src($filename,$id_consult);
		if(file_exists(ltrim($file_path, '/')))
		{
			unlink(ltrim($file_path,'/'));
			$message = ['status' =>'Deleted Successfully',
						'file' =>src($filename,$id_consult)	
					];
		}
		else {
			$message = ['status' =>'File not found',
						'file' =>src($filename,$id_consult)	
			];
		}
		$pictures->delete($picture_id);
        return $this->response->setJSON($message);
	}
	public function checkpicture($id,$new_picture)
	{
		$pictures = new PictureModel();
		$files = $pictures->getPicture($id);
		$check=true;
		foreach($files as $file)
		{
			if($file['pic_name']==$new_picture)
			{
				$check=false; 
			}
		}
		return $check;
	}

}
