<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Backup_db extends My_Controller {

  public function __construct(){

    parent::__construct();

    auth_check(); // check login auth

    $this->rbac->check_module_access();
    $this->load->model('admin/backup_db_model', 'backup_db_model');
  }

  public function index()
  {
    $data['title'] = 'Database Management';

    $this->load->view('admin/includes/_header', $data);
    $this->load->view('admin/db_backup/backup');
    $this->load->view('admin/includes/_footer');
  }

  public function db_backup()
  {
    $target_dir = DB_BACKUP_PATH;
    if (!is_dir($target_dir)) {
    @mkdir("$target_dir", 0755, true);
    }

    $this->load->dbutil();

    $db_format = array(

      'ignore' => array($this->ignore_directories),

      'format'=> 'sql',

      'filename'=> 'my_db_backup.sql',

      'add_insert' => TRUE,

      'newline' => "\n"

    );

    $backup = & $this->dbutil->backup($db_format);

    $dbname = 'backup-on-'.date('Y-m-d').'.sql';

    $save = $target_dir.$dbname;

    write_file($save, $backup);

    $data = array(
      'name' => $dbname,
      'created_at' => date('Y-m-d')
    );
    $rtn_str = $this->backup_db_model->save_data($data);
    echo json_encode($rtn_str);
  }
  public function get_db_list()
  {
    $draw = $_POST['draw'];
    $start = $_POST['start'];
    $rowperpage = $_POST['length']; // Rows display per page
    $columnIndex = $_POST['order'][0]['column']; // Column index
    $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
    $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
    // $search_key = $_POST['search']['value'];

    $search_key = $this->input->post('filter');

    $totalRecords = $this->backup_db_model->get_backup_db_all_count();
    $totalRecordwithFilter = $this->backup_db_model->get_backup_db_all_count_with_filter($search_key, $start, $rowperpage);
    $backup_db_list = $this->backup_db_model->get_backup_db_list($search_key, $start, $rowperpage);

    $data = array();
    $inx = 0;
    foreach ($backup_db_list as $value) {
        $inx++;
        $data[] = array(
          "no"=>$inx,
          "name"=>$value['name'],
          "download"=>'<a href="'.base_url().DB_BACKUP_PATH.$value['name'].'" download>'.$value['name'].'</a>',
          "created_at"=>$value['created_at'],
          "action"=>'<a id="'.$value['id'].'" class="mr-1 btn-sm btn btn-danger delete-row"><i class="fa fa-times"></i></a>'
       );
    }

    $result = array(
      "draw" => intval($draw),
      "iTotalRecords" => $totalRecords,
      "iTotalDisplayRecords" => $totalRecordwithFilter,
      "aaData" => $data
    );

    echo json_encode($result);
  }
  public function delete_db()
  {
    $id = $this->input->post('id');
    $result = $this->backup_db_model->delete_db($id);

    echo json_encode($result);
  }

}
?>