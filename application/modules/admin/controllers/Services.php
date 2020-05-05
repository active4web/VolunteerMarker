<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('pagination');
        $this->load->model('data','','true');
        $this->load->model('paging','','true');
        $this->load->library('upload');
        $this->load->helper(array('form', 'url','text'));
		$this->load->library('lib_pagination');
		  $this->lang->load('admin', get_lang() );
    }
	
	

    public function index(){
		redirect(base_url().'admin/services/services','refresh');
    }

 public function services(){
if($this->session->userdata('id_admin')!=""){
 $tables = "category";
    $config = array();
    $config['base_url'] = base_url().'admin/services/services'; 
    $config['total_rows'] = $this->data->record_count($tables,array(),'','id','desc');
    $config['per_page'] =30;
    $config['full_tag_open'] = '<ul class="pagination">';
    $config['full_tag_close'] = '</ul>';   
    $config['last_link'] = '»»';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';
    $config['first_link'] = '««';
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
    $config['prev_link'] = '<';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['next_link'] = '>';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a>';
    $config['cur_tag_close'] = '</a></li>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
   // $config['suffix'] = '?' . http_build_query($_GET, '', "&");
    //$config['first_url'] = $config['base_url'].'?'.http_build_query($_GET);
    
    $this->pagination->initialize($config);
    if($this->uri->segment(4)){
    $page = ($this->uri->segment(4)) ;
    }
    else{
    $page =0;
    }
    
    $rs = $this->db->get($tables);
    if($rs->num_rows() == 0):
    $data["results"] = array();
    $data["links"] = array();
      //$main_data=$this->db->get_where($tables,array('view'=>'1'))->result();
$result_amount=0;
$data["result_amount"] = $result_amount;
    else:
    $data["results"] = $this->data->view_all_data($tables, array(), $config["per_page"], $page,'id','desc');
    $main_data=$this->db->get_where($tables)->result();
$result_amount=count($main_data);

    $str_links = $this->pagination->create_links();
    $data["links"] = explode('&nbsp;',$str_links);
     $data["result_amount"] = $result_amount;
    endif;
  $this->load->view("admin/services/services", $data); 
	
    }
		
		else {
			redirect(base_url().'admin/login','refresh');
		}
    }

	public function add(){
	    	if($this->session->userdata('id_admin')!=""){
        $this->load->view("admin/services/add"); 
	    	}
	    	else {
	 redirect(base_url().'admin/','refresh');   	    
	    	}
    }

	public function details(){
		$id=$this->input->get('id');
		$data['services_type']=$this->db->get_where("category",array('id'=>$id))->result();
        $this->load->view("admin/services/details",$data); 
	}
	
    public function add_action(){
		if($this->session->userdata('id_admin')!=""){
        $title=$this->input->post('title');
		 $title_en=$this->input->post('title_en');
		$data['name'] = $title;
		$data['name_en'] = $title_en;
		$data['creation_date'] = date("Y-m-d");
	     $this->db->insert('category',$data);
    echo 1;
	}
else {
echo 0;
}

}
public function edit_action(){
	$update_date=date("Y-m-d h:i:s");
	if($this->session->userdata('id_admin')!=""){
	$title=$this->input->post('title');
	$id=$this->input->post('id');
	$data_service['name'] = $title;
	  $title_en=$this->input->post('title_en');
		$data['name'] = $title;
		$data['name_en'] = $title_en;
	$data_service['update_date'] = $update_date;
	 $this->db->update('category',$data_service,array('id'=>$id));
echo 1;
}
else {
echo 0;	
}
}

	

	
	public function delete(){
	if($this->session->userdata('id_admin')!=""){
        $id_notifications = $this->input->get('id_notifications');
        $check=$this->input->post('check');

        if($id_notifications!=""){
        $ret_value=$this->data->delete_table_row('category',array('id'=>$id_notifications)); 
        }
     
        if(isset($check) && $check!=""){  
        $check=$this->input->post('check');
        $length=count($check);
        for($i=0;$i<$length;$i++){
        $ret_value=$this->data->delete_table_row('category',array('id'=>$check[$i]));    
        }
        }
		$this->session->set_flashdata('msg', 'تم الحذف بنجاح');
		$this->session->mark_as_flash('msg');
		redirect(base_url().'admin/services','refresh');
	}
	else {
		redirect(base_url().'admin/','refresh');	
	}

    }
	
	


	function check_view_service(){
        $id = $this->input->post("id");
        $ser = $this->db->get_where("category",array("id"=>$id,"view" => "1"))->num_rows();
        if ($ser == 1) {
            $this->db->update("category",array("view" => "0"),array("id"=>$id));
            echo "0";
        }
        if ($ser == 0) {
            $this->db->update("category",array("view" => "1"),array("id"=>$id));
            echo "1";
        } 
    }
    
    
 public function institutions(){
if($this->session->userdata('id_admin')!=""){
 $tables = "institutions";
    $config = array();
    $config['base_url'] = base_url().'admin/services/institutions'; 
    $config['total_rows'] = $this->data->record_count($tables,array(),'','id','desc');
    $config['per_page'] =30;
    $config['full_tag_open'] = '<ul class="pagination">';
    $config['full_tag_close'] = '</ul>';   
    $config['last_link'] = '»»';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';
    $config['first_link'] = '««';
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
    $config['prev_link'] = '<';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['next_link'] = '>';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a>';
    $config['cur_tag_close'] = '</a></li>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
   // $config['suffix'] = '?' . http_build_query($_GET, '', "&");
    //$config['first_url'] = $config['base_url'].'?'.http_build_query($_GET);
    
    $this->pagination->initialize($config);
    if($this->uri->segment(4)){
    $page = ($this->uri->segment(4)) ;
    }
    else{
    $page =0;
    }
    
    $rs = $this->db->get($tables);
    if($rs->num_rows() == 0):
    $data["results"] = array();
    $data["links"] = array();
      //$main_data=$this->db->get_where($tables,array('view'=>'1'))->result();
$result_amount=0;
$data["result_amount"] = $result_amount;
    else:
    $data["results"] = $this->data->view_all_data($tables, array(), $config["per_page"], $page,'id','desc');
    $main_data=$this->db->get_where($tables)->result();
$result_amount=count($main_data);

    $str_links = $this->pagination->create_links();
    $data["links"] = explode('&nbsp;',$str_links);
     $data["result_amount"] = $result_amount;
    endif;
  $this->load->view("admin/services/institutions", $data); 
	
    }
		
		else {
			redirect(base_url().'admin/login','refresh');
		}
    }

	function check_view_institutions(){
        $id = $this->input->post("id");
        $ser = $this->db->get_where("institutions",array("id"=>$id,"view" => "1"))->num_rows();
        if ($ser == 1) {
            $this->db->update("institutions",array("view" => "0"),array("id"=>$id));
            echo "0";
        }
        if ($ser == 0) {
            $this->db->update("institutions",array("view" => "1"),array("id"=>$id));
            echo "1";
        } 
    }       

	public function delete_institutions(){
	if($this->session->userdata('id_admin')!=""){
        $id_notifications = $this->input->get('id_notifications');
        $check=$this->input->post('check');

        if($id_notifications!=""){
        $ret_value=$this->data->delete_table_row('institutions',array('id'=>$id_notifications)); 
        }
     
        if(isset($check) && $check!=""){  
        $check=$this->input->post('check');
        $length=count($check);
        for($i=0;$i<$length;$i++){
        $ret_value=$this->data->delete_table_row('institutions',array('id'=>$check[$i]));    
        }
        }
		$this->session->set_flashdata('msg', 'تم الحذف بنجاح');
		$this->session->mark_as_flash('msg');
		redirect(base_url().'admin/services/institutions','refresh');
	}
	else {
		redirect(base_url().'admin/','refresh');	
	}

    } 


	public function add_institutions(){
	    	if($this->session->userdata('id_admin')!=""){
        $this->load->view("admin/services/add_institutions"); 
	    	}
	    	else {
	 redirect(base_url().'admin/','refresh');   	    
	    	}
    }
    
    public function add_institutions_action(){
		if($this->session->userdata('id_admin')!=""){
        $title=$this->input->post('title');
        $title_en=$this->input->post('title_en');
		$data['name'] = $title;
		$data['name_en'] = $title_en;
		$data['creation_date'] = date("Y-m-d");
	     $this->db->insert('institutions',$data);
    echo 1;
	}
else {
echo 0;
}

}



	public function details_institutions(){
		$id=$this->input->get('id');
		$data['services_type']=$this->db->get_where("institutions",array('id'=>$id))->result();
        $this->load->view("admin/services/details_institutions",$data); 
	}

public function edit_institutions_action(){
	$update_date=date("Y-m-d h:i:s");
	if($this->session->userdata('id_admin')!=""){
	$title=$this->input->post('title');
  	$title_en=$this->input->post('title_en');
	$id=$this->input->post('id');
	$data_service['name'] = $title;
  $data_service['name_en'] = $title_en;
  
	$data_service['update_date'] = $update_date;
	 $this->db->update('institutions',$data_service,array('id'=>$id));
echo 1;
}
else {
echo 0;	
}
}



public function help(){
if($this->session->userdata('id_admin')!=""){
 $tables = "help";
    $config = array();
    $config['base_url'] = base_url().'admin/services/help'; 
    $config['total_rows'] = $this->data->record_count($tables,array(),'','id','desc');
    $config['per_page'] =30;
    $config['full_tag_open'] = '<ul class="pagination">';
    $config['full_tag_close'] = '</ul>';   
    $config['last_link'] = '»»';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';
    $config['first_link'] = '««';
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
    $config['prev_link'] = '<';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['next_link'] = '>';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a>';
    $config['cur_tag_close'] = '</a></li>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
   // $config['suffix'] = '?' . http_build_query($_GET, '', "&");
    //$config['first_url'] = $config['base_url'].'?'.http_build_query($_GET);
    
    $this->pagination->initialize($config);
    if($this->uri->segment(4)){
    $page = ($this->uri->segment(4)) ;
    }
    else{
    $page =0;
    }
    
    $rs = $this->db->get($tables);
    if($rs->num_rows() == 0):
    $data["results"] = array();
    $data["links"] = array();
      //$main_data=$this->db->get_where($tables,array('view'=>'1'))->result();
$result_amount=0;
$data["result_amount"] = $result_amount;
    else:
    $data["results"] = $this->data->view_all_data($tables, array(), $config["per_page"], $page,'id','desc');
    $main_data=$this->db->get_where($tables)->result();
$result_amount=count($main_data);

    $str_links = $this->pagination->create_links();
    $data["links"] = explode('&nbsp;',$str_links);
     $data["result_amount"] = $result_amount;
    endif;
  $this->load->view("admin/services/help", $data); 
	
    }
		
		else {
			redirect(base_url().'admin/login','refresh');
		}
    }
    
	public function add_help(){
	    	if($this->session->userdata('id_admin')!=""){
        $this->load->view("admin/services/add_help"); 
	    	}
	    	else {
	 redirect(base_url().'admin/','refresh');   	    
	    	}
    }

	public function details_help(){
		$id=$this->input->get('id');
		$data['services_type']=$this->db->get_where("help",array('id'=>$id))->result();
        $this->load->view("admin/services/details_help",$data); 
	}
	
    public function add_help_action(){
		if($this->session->userdata('id_admin')!=""){
        $title=$this->input->post('title');
        $title_en=$this->input->post('title_en');
		$data['name'] = $title;
		$data['creation_date'] = date("Y-m-d");
	     $this->db->insert('help',$data);
    echo 1;
	}
else {
echo 0;
}

}
public function edit_help_action(){
	$update_date=date("Y-m-d h:i:s");
	if($this->session->userdata('id_admin')!=""){
	$title=$this->input->post('title');
  	$title_en=$this->input->post('title_en');
	$id=$this->input->post('id');
	$data_service['name'] = $title;
  $data_service['name_en'] = $title_en;
  
	$data_service['update_date'] = $update_date;
	 $this->db->update('help',$data_service,array('id'=>$id));
echo 1;
}
else {
echo 0;	
}
}

	

	
	public function delete_help(){
	if($this->session->userdata('id_admin')!=""){
        $id_notifications = $this->input->get('id_notifications');
        $check=$this->input->post('check');

        if($id_notifications!=""){
        $ret_value=$this->data->delete_table_row('help',array('id'=>$id_notifications)); 
        }
     
        if(isset($check) && $check!=""){  
        $check=$this->input->post('check');
        $length=count($check);
        for($i=0;$i<$length;$i++){
        $ret_value=$this->data->delete_table_row('help',array('id'=>$check[$i]));    
        }
        }
		$this->session->set_flashdata('msg', 'تم الحذف بنجاح');
		$this->session->mark_as_flash('msg');
		redirect(base_url().'admin/services/help','refresh');
	}
	else {
		redirect(base_url().'admin/','refresh');	
	}

    }
	
	


	function check_view_help(){
        $id = $this->input->post("id");
        $ser = $this->db->get_where("help",array("id"=>$id,"view" => "1"))->num_rows();
        if ($ser == 1) {
            $this->db->update("help",array("view" => "0"),array("id"=>$id));
            echo "0";
        }
        if ($ser == 0) {
            $this->db->update("help",array("view" => "1"),array("id"=>$id));
            echo "1";
        } 
    }

}
