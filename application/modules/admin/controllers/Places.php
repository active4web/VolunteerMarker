<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Places extends MX_Controller
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
		
		  $this->lang->load('admin', get_lang() );
    }
	
	

    public function index(){
		redirect(base_url().'admin/places/countries','refresh');
    }

    public function countries(){
	
    $tables = "country";
    $config = array();
    $config['base_url'] = base_url().'admin/places/countries'; 
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
  $this->load->view("admin/places/countries", $data); 
	
    }
        public function cities(){
	$tables = "city";
    $config = array();
    $config['base_url'] = base_url().'admin/places/cities'; 
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
    endif;		$this->load->view("admin/places/cities", $data); 
	
    }
    
     public function region(){
	$tables = "region";
    $config = array();
    $config['base_url'] = base_url().'admin/places/region'; 
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
    endif;		$this->load->view("admin/places/region", $data); 
	
    }
	
	public function add(){
        $this->load->view("admin/places/add"); 
    }

	public function details(){
		$id=$this->input->get('id');
		$data['services_type']=$this->db->get_where("country",array('id'=>$id))->result();
        $this->load->view("admin/places/details",$data); 
	}
	
    public function add_action(){
        $title=$this->input->post('title');
        	$title_en=$this->input->post('title_en');
		$data['title'] = $title;
			$data['title_en'] = $title_en;
	     $this->db->insert('country',$data);
$id = $this->db->insert_id();
if($id!=""){
    echo 1;
	}
else {
echo 0;
}

}
public function edit_action(){
	$update_date=date("Y-m-d h:i:s");
	$title=$this->input->post('title');
	$title_en=$this->input->post('title_en');
	$id=$this->input->post('id');
	$data_service['title'] = $title;
	$data_service['title_en'] = $title_en;
	$data['id_service'] =$id;
	 $this->db->update('country',$data_service,array('id'=>$id));
echo 1;

}

	

	
	
	public function city_delete(){
        $id_notifications = $this->input->get('id_notifications');
        $check=$this->input->post('check');

        if($id_notifications!=""){
        $ret_value=$this->data->delete_table_row('city',array('id'=>$id_notifications)); 
        }
     
        if(isset($check) && $check!=""){  
        $check=$this->input->post('check');
        $length=count($check);
        for($i=0;$i<$length;$i++){
        $ret_value=$this->data->delete_table_row('city',array('id'=>$check[$i]));    
        }
        }
		$this->session->set_flashdata('msg', 'تم الحذف بنجاح');
		$this->session->mark_as_flash('msg');
		redirect(base_url().'admin/places/cities','refresh');


    }


	public function delete(){
        $id_notifications = $this->input->get('id_notifications');
        $check=$this->input->post('check');

        if($id_notifications!=""){
        $ret_value=$this->data->delete_table_row('country',array('id'=>$id_notifications)); 
       $this->data->delete_table_row('city',array('country_id'=>$id_notifications)); 
        }
     
        if(isset($check) && $check!=""){  
        $check=$this->input->post('check');
        $length=count($check);
        for($i=0;$i<$length;$i++){
        $ret_value=$this->data->delete_table_row('country',array('id'=>$check[$i]));   
        $this->data->delete_table_row('city',array('country_id'=>$check[$i])); 
        }
        }
		$this->session->set_flashdata('msg', 'تم الحذف بنجاح');
		$this->session->mark_as_flash('msg');
		redirect(base_url().'admin/places','refresh');


    }
	
	


	function check_view_countries(){
        $id = $this->input->post("id");
        $ser = $this->db->get_where("country",array("id"=>$id,"view" => "1"))->num_rows();
        if ($ser == 1) {
            $this->db->update("country",array("view" => "0"),array("id"=>$id));
            echo "0";
        }
        if ($ser == 0) {
            $this->db->update("country",array("view" => "1"),array("id"=>$id));
            echo "1";
        } 
    }
    
  
  	function check_view_city(){
        $id = $this->input->post("id");
        $ser = $this->db->get_where("city",array("id"=>$id,"view" => "1"))->num_rows();
        if ($ser == 1) {
            $this->db->update("city",array("view" => "0"),array("id"=>$id));
            echo "0";
        }
        if ($ser == 0) {
            $this->db->update("city",array("view" => "1"),array("id"=>$id));
            echo "1";
        } 
    }
    
    
    	public function add_city(){
        $this->load->view("admin/places/add_city"); 
    }
    
    
    public function city_action(){
        $update_date=date("Y-m-d");
        $title=$this->input->post('title');
        $title_en=$this->input->post('title_en');
        
        $country_id=$this->input->post('country_id');
		$data['name'] = $title;
			$data['name_en'] = $title_en;
		$data['date'] = $update_date;
		$data['country_id'] = $country_id;
	     $this->db->insert('city',$data);
$id = $this->db->insert_id();
if($id!=""){
    echo 1;
	}
else {
echo 0;
}

}


public function city_details(){
		$id=$this->input->get('id');
		$data['services_type']=$this->db->get_where("city",array('id'=>$id))->result();
        $this->load->view("admin/places/city_details",$data); 
	}

public function edit_city_action(){
	$update_date=date("Y-m-d h:i:s");
	$title=$this->input->post('title');
	$title_en=$this->input->post('title_en');
	$id=$this->input->post('id');
	$data_service['name'] = $title;
	$data_service['name_en'] = $title_en;
	
	$country_id=$this->input->post('country_id');
	if($country_id!=""){
	$data_service['country_id'] = $country_id;    
	}
	 $this->db->update('city',$data_service,array('id'=>$id));
echo 1;

}
    
    	public function add_region(){
        $this->load->view("admin/places/add_region"); 
    }
    
    
    public function region_action(){
        $update_date=date("Y-m-d");
        $title=$this->input->post('title');
         $title_en=$this->input->post('title_en');
        $country_id=$this->input->post('city_id');
		$data['name'] = $title;
		$data['name_en'] = $title_en;
		$data['date'] = $update_date;
		$data['city_id'] = $country_id;
	     $this->db->insert('region',$data);
$id = $this->db->insert_id();
if($id!=""){
  $this->session->set_flashdata('msg', 'تم الاضافة بنجاح');
		$this->session->mark_as_flash('msg');
		redirect(base_url().'admin/places/region','refresh');
	}
else {
$this->session->set_flashdata('msg', 'فشل عملية الاضافة');
		$this->session->mark_as_flash('msg');
		redirect(base_url().'admin/places/add_region','refresh');
}

}


    	function check_view_region(){
        $id = $this->input->post("id");
        $ser = $this->db->get_where("region",array("id"=>$id,"view" => "1"))->num_rows();
        if ($ser == 1) {
            $this->db->update("region",array("view" => "0"),array("id"=>$id));
            echo "0";
        }
        if ($ser == 0) {
            $this->db->update("region",array("view" => "1"),array("id"=>$id));
            echo "1";
        } 
    }  
    

    
    	public function region_delete(){
        $id_notifications = $this->input->get('id_notifications');
        $check=$this->input->post('check');

        if($id_notifications!=""){
        $ret_value=$this->data->delete_table_row('region',array('id'=>$id_notifications)); 
        }
     
        if(isset($check) && $check!=""){  
        $check=$this->input->post('check');
        $length=count($check);
        for($i=0;$i<$length;$i++){
        $ret_value=$this->data->delete_table_row('region',array('id'=>$check[$i]));   
        }
        }
		$this->session->set_flashdata('msg', 'تم الحذف بنجاح');
		$this->session->mark_as_flash('msg');
		redirect(base_url().'admin/places/region','refresh');


    }
    
    	public function region_details(){
		$id=$this->input->get('id');
		$data['services_type']=$this->db->get_where("region",array('id'=>$id))->result();
        $this->load->view("admin/places/region_details",$data); 
	}
    
public function edit_region(){
	$update_date=date("Y-m-d h:i:s");
	$title=$this->input->post('title');
	$title_en=$this->input->post('title_en');
	$id=$this->input->post('id');
	$data_service['name'] = $title;
	$data_service['name_en'] = $title_en;
	
	$country_id=$this->input->post('city_id');
	if($country_id!=""){
	$data_service['city_id'] = $country_id;    
	}
	 $this->db->update('region',$data_service,array('id'=>$id));
	$this->session->set_flashdata('msg', 'تم التعديل بنجاح');
		$this->session->mark_as_flash('msg');
		redirect(base_url().'admin/places/region','refresh');


}
    
    
}




