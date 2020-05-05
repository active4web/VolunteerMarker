<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MX_Controller
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
    }

    public function index(){
		redirect(base_url().'admin/customers/show','refresh');
    }
	
	public function gen_random_string()
    {
        $chars ="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";//length:36
        $final_rand='';
        for($i=0;$i<4; $i++) {
            $final_rand .= $chars[ rand(0,strlen($chars)-1)];
        }
        return $final_rand;
    }
	
	
    public  function search_username(){
        $phone=$this->input->post('phone');
        $len=strlen($phone);
        $a=array();
        $sql=$this->db->get_where('customers',array('view'=>'1','phone!='=>""))->result();
        if(count($sql)>0){
        foreach($sql as $sql){
        $user_phone=$sql->phone;
        if(substr($user_phone,0,$len)==$phone){
        array_push($a,$user_phone);
        }
        }
    }
echo json_encode($a);    
    }


    public function customer_search(){
        $phone=$this->input->get('phone');
		$where = "phone=$phone";
        $pg_config['sql'] = $this->data->get_sql('customers',$where,'id','DESC');
        $pg_config['per_page'] = 40;
        $data = $this->lib_pagination->create_pagination($pg_config);
        $this->load->view("admin/users/customer_search", $data); 
    }	
    public function customers(){
	$tables = "customers";
    $config = array();
    $config['base_url'] = base_url().'admin/users/customers'; 
    $config['total_rows'] = $this->data->record_count($tables,array('type'=>'0'),'','id','desc');
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
    $data["results"] = $this->data->view_all_data($tables, array('type'=>'0'), $config["per_page"], $page,'id','desc');
    $main_data=$this->db->get_where($tables,array('type'=>'0'))->result();
$result_amount=count($main_data);

    $str_links = $this->pagination->create_links();
    $data["links"] = explode('&nbsp;',$str_links);
     $data["result_amount"] = $result_amount;
    endif;
        $this->load->view("admin/users/customers", $data); 
    }
    
    
    
        public function trainers(){
			$tables = "customers";
    $config = array();
    $config['base_url'] = base_url().'admin/users/customers'; 
    $config['total_rows'] = $this->data->record_count($tables,array('type'=>'1'),'','id','desc');
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
    $data["results"] = $this->data->view_all_data($tables, array('type'=>'1'), $config["per_page"], $page,'id','desc');
    $main_data=$this->db->get_where($tables,array('type'=>'1'))->result();
$result_amount=count($main_data);

    $str_links = $this->pagination->create_links();
    $data["links"] = explode('&nbsp;',$str_links);
     $data["result_amount"] = $result_amount;
    endif;
        $this->load->view("admin/users/trainers", $data); 
    }
   
           public function bags_provider(){

			$tables = "customers";
    $config = array();
    $config['base_url'] = base_url().'admin/users/customers'; 
    $config['total_rows'] = $this->data->record_count($tables,array('type'=>'2'),'','id','desc');
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
    $data["results"] = $this->data->view_all_data($tables, array('type'=>'2'), $config["per_page"], $page,'id','desc');
    $main_data=$this->db->get_where($tables,array('type'=>'2'))->result();
$result_amount=count($main_data);

    $str_links = $this->pagination->create_links();
    $data["links"] = explode('&nbsp;',$str_links);
     $data["result_amount"] = $result_amount;
    endif;
        $this->load->view("admin/users/bags_provider", $data); 
    }
    

	
	public function edit(){
		$id=$this->input->get('id');
        $data['data'] = $this->data->get_table_data('customers',array('id'=>$id));
         $data['country'] = $this->data->get_table_data('country',array('view'=>'1'));
         $data['category'] = $this->data->get_table_data('category',array('view'=>'1'));
        $this->load->view("admin/users/edit",$data); 
	}
	
	public function get_state(){
    header ('Content-Type: text/html; charset=UTF-8'); 
$country_id=$this->input->post('country_id');
$data_p=$this->db->get_where('city',array('view'=>'1','country_id'=>$country_id))->result();
if(count($data_p)>0){
    echo "<option value=''>حدد المدينة</option>";
    foreach($data_p as $data_p){
 echo "<option value='$data_p->id'>$data_p->name</option>";
    }
}
else {
  echo "<option value=''>لا يوجد حاليا اى بيانات</option>";   
}
}    
	
	public function edit_action(){
		$id=$this->input->post('id');
		
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		$email=$this->input->post('email');
		$phone=$this->input->post('phone');
		$age=$this->input->post('age');
		$country_id=$this->input->post('country_id');
		$city_id=$this->input->post('city_id');
		$cat_id=$this->input->post('cat_id');
		
	
			
			$updates = ['user_name'=>$username,'email'=>$email,'phone'=>$phone,'age'=>$age];
			$this->Main_model->update('customers',['id'=>$id],$updates);
			
			if($password && $password!=""){
				$update_pass = ['password'=>md5($password)];
				$this->Main_model->update('customers',['id'=>$id],$update_pass);
			}
			
	
			if($cat_id && $cat_id!=""){
				$update_pass_cat = ['cat_id'=>$cat_id];
				$this->Main_model->update('customers',['id'=>$id],$update_pass_cat);
			}
			
				if($city_id && $city_id!=""){
				$update_pass_city = ['city_id'=>$city_id];
				$this->Main_model->update('customers',['id'=>$id],$update_pass_city);
			}
			
			if($_FILES['img']['name']!=""){
            $img_name=$this->gen_random_string(); 
            $imagename = $img_name;
            $config['upload_path'] = 'uploads/customers/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             =100000;
            $config['max_width']            =100000;
            $config['max_height']           =100000;
            $config['file_name'] = $imagename; 
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('img')){
                echo $this->upload->display_errors();
                print_r($config);
                die;
            }
            else {
            $url= $_FILES['img']['name'];
            $ext = explode(".",$url);
            $file_extension = end($ext);
            $data = array('img'=>$imagename.".".$file_extension);
            $this->data->edit_table_id('customers',array('id'=>$id),$data);
            }
        }
		$this->session->set_flashdata('msg', 'تم التعديل بنجاح');
		redirect(base_url().'admin/users/edit?id='.$id,'');
	}
	
	public function check_status(){    
    $id = $this->input->post("id");
    $ser = $this->db->get_where("customers",array("id"=>$id,"status" => "1"))->num_rows();
    if ($ser == 1) {
      $this->db->update("customers",array("status" => "0"),array("id"=>$id));
      echo "0";
    }
    if ($ser == 0) {
      $this->db->update("customers",array("status" => "1"),array("id"=>$id));
      echo "1";
    }    

	}
	
	public function json($status,$msg=[]){
		$data['status'] = $status;
		$data['msg'] = $msg;
		echo json_encode($data);
	}
	
	public function check_phone(){
    $phone = $this->input->post("phone");
    $res = $this->db->get_where("customers",array("phone" =>$phone))->num_rows();
		if ($res == 1) {
			return $this->json(true,1);
		}else{
			return $this->json(false,0);
		}
	}
	
	public function check_email(){
    $email = $this->input->post("email");
    $res = $this->db->get_where("customers",array("email" =>$email))->num_rows();
		if ($res == 1) {
			return $this->json(true,1);
		}else{
			return $this->json(false,0);
		}
	}
	


    function active(){
        $id = $this->input->post("id");
        $ser = $this->db->get_where("customers",array("id"=>$id,"view" => "1"))->num_rows();
        if ($ser == 1) {
            $this->db->update("customers",array("view" => "0"),array("id"=>$id));
            echo "0";
        }
        if ($ser == 0) {
            $this->db->update("customers",array("view" => "1"),array("id"=>$id));
            echo "1";
        } 
    }

    function active_mail(){
        $id = $this->input->post("id");
        $ser = $this->db->get_where("customers",array("id_customers"=>$id,"active_mail" => "1"))->num_rows();
        if ($ser == 1) {
            $this->db->update("customers",array("active_mail" => "0"),array("id_customers"=>$id));
            echo "0";
        }
        if ($ser == 0) {
            $this->db->update("customers",array("active_mail" => "1"),array("id_customers"=>$id));
            echo "1";
        } 
    }

    function active_phone(){
        $id = $this->input->post("id");
        $ser = $this->db->get_where("customers",array("id_customers"=>$id,"active_phone" => "1"))->num_rows();
        if ($ser == 1) {
            $this->db->update("customers",array("active_phone" => "0"),array("id_customers"=>$id));
            echo "0";
        }
        if ($ser == 0) {
            $this->db->update("customers",array("active_phone" => "1"),array("id_customers"=>$id));
            echo "1";
        } 
    }

    function active_img(){
        $id = $this->input->post("id");
        $ser = $this->db->get_where("customers",array("id_customers"=>$id,"active_img" => "1"))->num_rows();
        if ($ser == 1) {
            $this->db->update("customers",array("active_img" => "0"),array("id_customers"=>$id));
            echo "0";
        }
        if ($ser == 0) {
            $this->db->update("customers",array("active_img" => "1"),array("id_customers"=>$id));
            echo "1";
        } 
    }


    public function delete(){
        $id_customers = $this->input->get('id_customers');
        $check=$this->input->post('check');

        if($id_customers!=""){
            $status=	get_table_filed('customers',array('id'=>$id_customers),"type");
            $this->data->delete_table_row('customers',array('id'=>$id_customers)); 
        }
     
        if(isset($check) && $check!=""){
            $status=$this->input->post('type');
        $check=$this->input->post('check');
        $length=count($check);
        for($i=0;$i<$length;$i++){
        $ret_value=$this->data->delete_table_row('customers',array('id_customers'=>$check[$i]));    
        }
        }
        $this->session->set_flashdata('msg', 'تم الحذف بنجاح');
 if($status==0){redirect(base_url().'admin/users/customers/','refresh');}
 if($status==1){redirect(base_url().'admin/users/trainers/','refresh');}
 if($status==2){redirect(base_url().'admin/users/bags_provider/','refresh');}

    }

}