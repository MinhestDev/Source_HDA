<?php
defined('BASEPATH') or exit('');

/**
 * Description of Home
 *
 * @author Amir <amirsanni@gmail.com>
 * @date 20th Rab. Awwal, 1437AH
 * @date 1st Jan, 2016
 */
class Employees extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();

    $this->genlib->checkLogin();

    $this->genlib->superOnly();
  }


  public function index()
  {
    $data['pageContent'] = $this->load->view('employees', '', TRUE);
    $data['pageTitle'] = "Nhân viên";

    $this->load->view('main', $data);
  }
}
