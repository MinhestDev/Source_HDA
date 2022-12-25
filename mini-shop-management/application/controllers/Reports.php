<?php
defined('BASEPATH') or exit('');

/**
 * Description of Reports
 *
 * @author Amir <amirsanni@gmail.com>
 * @date 20th Rab. Awwal, 1437AH
 * @date 1st Jan, 2016
 */
class Reports extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();

    $this->genlib->checkLogin();

    $this->genlib->superOnly();
  }


  /*
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    */

  public function index()
  {
    $data['pageContent'] = $this->load->view('reports', '', TRUE);
    $data['pageTitle'] = "Báo cáo";

    $this->load->view('main', $data);
  }
}
