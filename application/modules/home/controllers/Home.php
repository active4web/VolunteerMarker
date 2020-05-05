<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

class Home extends MX_Controller {
    function __construct() {

		parent::__construct();
        $this->load->library('session');
		$this->load->model('data','','true');
		@date_default_timezone_set('Asia/Riyadh');
		$this->lang->load('main_lang', get_lang() );
        if( isset($this->session->get_userdata('lang')['lang']) ){
        $lang = $this->session->get_userdata('lang')['lang'];
        }else{
        $lang = 'arabic';
        }
        $dir = ( $lang == 'arabic' )? 'left' : 'right' ;
		define( "LANGU" , $lang );
    }
    
	public function lang_site( $lang = null ){
        if( $lang == 'ar' ){
            $newdata = array(
            'lang'  => 'arabic'
            );
            $this->session->set_userdata($newdata);
        }else if( $lang == 'en' ){
            $newdata = array(
            'lang'  => 'english'
            );
            $this->session->set_userdata($newdata);
        }else if( $lang == 'fr' ){
            $newdata = array(
            'lang'  => 'french'
            );
            $this->session->set_userdata($newdata);
		}
		
		//echo  $this->session->get_userdata($newdata);
		//echo $_GET['link'];
 redirect(base_url());
    }
    
    function index() {

		global $lang;
		if( isset($this->session->get_userdata('lang')['lang']) ){
			$lang = $this->session->get_userdata('lang')['lang'];
			}else{
			$lang = 'arabic';
			}
			$data['lang'] =$lang;
$data['site_info'] =$this->db->get_where('site_info')->result(); 
$data_conent['home_page']=$this->db->get_where('home_page')->result();
$data_conent['site_info'] =$this->db->get_where('site_info')->result(); 
$data_conent['services'] =$this->db->order_by("id","desc")->get_where('category',array("view"=>'1'))->result(); 
$data_conent['institutions'] =$this->db->order_by("id","desc")->get_where('institutions',array("view"=>'1'))->result(); 
$data_conent['help'] =$this->db->order_by("id","desc")->get_where('help',array("view"=>'1'))->result(); 
$data_conent['country_foundation'] =$this->db->order_by("id","desc")->get_where('country',array("view"=>'1'))->result(); 
$data_conent['country_help'] =$this->db->order_by("id","desc")->get_where('country',array("view"=>'1'))->result(); 
$data_conent['country_volunteer'] =$this->db->order_by("id","desc")->get_where('country',array("view"=>'1'))->result(); 
$data_conent['info_news'] =$this->db->limit(3)->order_by("id","desc")->get_where('products')->result(); 
	$this->load->view('home/include/head',$data );
$this->load->view('home/include/header',$data );
	$this->load->view('home/home',$data_conent);
	$this->load->view('home/include/footer',$data);
		  
    }

function test() {	$this->load->view('test');}

public function news(){
    global $lang;
		if( isset($this->session->get_userdata('lang')['lang']) ){
			$lang = $this->session->get_userdata('lang')['lang'];
			}else{
			$lang = 'arabic';
			}
			$data['lang'] =$lang;
	$this->load->library('rssparser');
	$data_conent['rss'] = "";
	$feeds = $this->data->get_sql('rss_feeds');
	if(!empty($feeds)){
		foreach($feeds as $feed){
			$rss[] = $this->rssparser->set_feed_url($feed->rss_link)->set_cache_life(30)->getFeed($feed->rss_max);
			//print_r($feed);
			//echo $feed->rss_link;
		}
		$data_conent['rss'] = $rss;
	}
	$data['site_info'] =$this->db->get_where('site_info')->result(); 
	$data_conent['home_page']=$this->db->get_where('home_page')->result();
	$data_conent['site_info'] =$this->db->get_where('site_info')->result(); 
	$this->load->view('home/include/head',$data );
	$this->load->view('home/include/header',$data );
	$this->load->view('home/news',$data_conent );
	$this->load->view('home/include/footer',$data);
}


public function foundation(){
	$name=$this->input->post('name');
	$phone=$this->input->post('phone');
	$email=$this->input->post('email');
	$conutry_id=$this->input->post('conutry_id');
	$city_id=$this->input->post('city_id');
	$region_id=$this->input->post('region_id');
	$type_registration=$this->input->post('type_registration');
	$lat=$this->input->post('lat');
	$lag=$this->input->post('lag');


		$store['name'] = $name;
		$store['email'] = $email;
		$store['phone'] = $phone;
		$store['conutry_id'] =$conutry_id;
		$store['city_id'] = $city_id;
		$store['region_id'] = $region_id;
		$store['lat'] = $lat;
		$store['lag'] =$lag ;
		$store['creation_date'] =date('Y-m-d');
		$store['type_registration'] =$type_registration;
		$store['view'] ='1';
			$store['type'] ='0';

$this->load->helper('url');
$this->session->set_flashdata('msg', 'تم التسجيل بنجاح');
$this->session->mark_as_flash('msg');
redirect(base_url(), 'refresh');		

}




public function volunteer(){
	$name=$this->input->post('name');
		$nationalid=$this->input->post('nationalid');
	$phone=$this->input->post('phone');
	$email=$this->input->post('email');
	$conutry_id=$this->input->post('conutry_id');
	$city_id=$this->input->post('city_id');
	$region_id=$this->input->post('region_id');
	$type_registration=$this->input->post('type_registration');
	$date=$this->input->post('date');
	$hour=$this->input->post('hour');
$time=$this->input->post('time');

		$store['name'] = $name;
		$store['email'] = $email;
		$store['phone'] = $phone;
		$store['conutry_id'] =$conutry_id;
		$store['city_id'] = $city_id;
		$store['region_id'] = $region_id;
		$store['Nationalid'] = $nationalid;
		$store['services'] =$type_registration ;
		$store['creation_date'] =date('Y-m-d');
		$store['avaible_date'] =$date;
		$store['time_type'] =$hour." ".$time;
		$store['view'] ='1';
			$store['type'] ='1';

$this->load->helper('url');
$this->session->set_flashdata('msg', 'تم التسجيل بنجاح');
$this->session->mark_as_flash('msg');
redirect(base_url(), 'refresh');		

}




    
 
 public function help_request(){
	$name=$this->input->post('name');
		$help=$this->input->post('help');
	$phone=$this->input->post('phone');
	$email=$this->input->post('email');
	$conutry_id=$this->input->post('conutry_id');
	$city_id=$this->input->post('city_id');
	$region_id=$this->input->post('region_id');
	$institutions=$this->input->post('institutions');


		$store['name'] = $name;
		$store['email'] = $email;
		$store['phone'] = $phone;
		$store['conutry_id'] =$conutry_id;
		$store['city_id'] = $city_id;
		$store['region_id'] = $region_id;
		$store['institutions'] = $institutions;
		$store['creation_date'] =date('Y-m-d');
		$store['help'] =$help;
		$store['view'] ='1';
			$store['type'] ='2';

$this->load->helper('url');
$this->session->set_flashdata('msg', 'تم التسجيل بنجاح');
$this->session->mark_as_flash('msg');
redirect(base_url(), 'refresh');		

}


public function get_state_volunteer(){
header ('Content-Type: text/html; charset=UTF-8'); 
$country_id=$this->input->post('country_id');
$data_p=$this->db->get_where('city',array('view'=>'1','country_id'=>$country_id))->result();
if(count($data_p)>0){
echo "<option value=''>حدد المحافظة</option>";
foreach($data_p as $data_p){
echo "<option value='$data_p->id'>$data_p->name</option>";
}
}
else {
echo "<option value=''>لا يوجد حاليا اى بيانات</option>";   
}
}

    
public function get_region_volunteer(){
header ('Content-Type: text/html; charset=UTF-8'); 
$country_id=$this->input->post('country_id');
$data_p=$this->db->get_where('region',array('view'=>'1','city_id'=>$country_id))->result();
if(count($data_p)>0){
echo "<option value=''>حدد الأقليم</option>";
foreach($data_p as $data_p){
echo "<option value='$data_p->id'>$data_p->name</option>";
}
}
else {
echo "<option value=''>لا يوجد حاليا اى بيانات</option>";   
}
}
    
    
}


