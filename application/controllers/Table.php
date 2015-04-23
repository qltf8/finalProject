<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Table extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->database();
		$this->load->library(array('table','pagination'));
		$this->load->model('table_model');
		$this->load->helper('url');
		$config['per_page']=4;
		$config['total_rows']=$this->table_model->getStatusRow();
		$config['base_url']=base_url('index.php/table/index');
		$config['full_tag_open'] = '<div id="links">';
		$config['full_tag_close'] = '</div>';
		$config['cur_tag_open'] = '<span id="current">';
		$config['cur_tag_close'] = '</span>';
		$config['num_tag_open'] = '&nbsp&nbsp';
		$config['num_tag_close'] = '&nbsp&nbsp';

		$this->pagination->initialize($config);
		$data['links']=$this->pagination->create_links();
		$offset=intval($this->uri->segment(3));
		$url=base_url('images/user.gif');
		$tmpl = array (
                    'table_open'          => '<table id="keywords">',

                    'heading_row_start'   => '<tr><th>image</th>',
                    'heading_row_end'     => '<th>Details</th></tr>',
                    'heading_cell_start'  => '<th><span>',
                    'heading_cell_end'    => '</span></th>',

                    'row_start'           => "<tr><td><image src='$url'></td>",
                    'row_end'             => '<td><button class="detail" type="button">detail</button></td></tr>',
                    'cell_start'          => '<td>',
                    'cell_end'            => '</td>',

                    'row_alt_start'       => "<tr><td><image src='$url'></td>",
                    'row_alt_end'         => '<td><button class="detail" type="button">detail</button></td></tr>',
                    'cell_alt_start'      => '<td>',
                    'cell_alt_end'        => '</td>',

                    'table_close'         => '</table>'
              );

		$this->table->set_template($tmpl);
		$data['table']=$this->table->generate($this->table_model->getStatus($offset,$config['per_page']));
		$this->load->view('table',$data);
	}

	public function test(){
		$this->load->library('table');
		$this->load->model("table_model");
		$id=$this->uri->segment('3');
		$info=$this->table_model->getInfor($id);
		$i=0;
		
		foreach($info['res'][0] as $key=>$value){
			$data[$i][0]=$key;
			$data[$i++][1]=$value;
		}
		$tmpl = array (
                    'table_open'          => '<table class="rwd-table">',

                    'heading_row_start'   => '<tr>',
                    'heading_row_end'     => '</tr>',
                    'heading_cell_start'  => '<td>',
                    'heading_cell_end'    => '</td>',

                    'row_start'           => "<tr>",
                    'row_end'             => '</tr>',
                    'cell_start'          => '<td>',
                    'cell_end'            => '</td>',

                    'row_alt_start'       => "<tr>",
                    'row_alt_end'         => '</tr>',
                    'cell_alt_start'      => '<td>',
                    'cell_alt_end'        => '</td>',

                    'table_close'         => '</table>'
              );

		$this->table->set_template($tmpl);
		$app=$this->table->generate($data);
		$app="<div id='app'>".$app."</div>";
		
		$curTeach="<ul>";
		unset($value);
		foreach($info['curTeach'] as $value){
			$curTeach=$curTeach."<li>".$value['courseName']."</li>";
		}
		$curTeach=$curTeach."</ul>";
		$curTeach="<div id='curTeach'><p>Course(s) This Applicant Are Currently Teaching:</p>".$curTeach."</div>";
		
		$preTeach="<ul>";
		foreach($info['preTeach'] as $value){
			$preTeach=$preTeach."<li>".$value['courseName']."</li>";
		}
		$preTeach=$preTeach."</ul>";
		$preTeach="<div id='preTeach'><p>Course(s) This Applicant Have Previously Taught:</p>".$preTeach."</div>";
		
		$likeTeach="<select name='likeTeach'>";
		foreach($info['likeTeach'] as $value){
			$likeTeach=$likeTeach."<option value=".$value['courseName']."> course's name:".$value['courseName']." score:".$value['score']."</option>"; 
		}
		$likeTeach=$likeTeach."</select>";
		$likeTeach="<form><input type='hidden' value=$id >".$likeTeach."<br><button onclick='agree()' type='button'>agree</button>&nbsp&nbsp<button onclick='disagree()' type='button'>disagree</button></form>";
		$likeTeach="<div id='likeTeach'><p>Course(s) This Applicant Would Like to Teach and please choose one:</p>".$likeTeach."</div>";
		
		$allInform=$app.$curTeach.$preTeach.$likeTeach."<div id='divClose'><button type='button' id='close'>close</button></div>";
		
		echo $allInform;
		
	}
}
