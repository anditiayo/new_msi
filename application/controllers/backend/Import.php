<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Import extends Backend
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Import_model', 'import');
    }


    public function index()
    {
        if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
        {
            redirect('auth/login/backend', 'refresh');
        }
        elseif ( ! $this->ion_auth->is_admin())
        {
            return show_error('You must be an administrator to view this page.');
        }
        else
        {
            $count_user  = $this->db->count_all($this->config->item('tables', 'ion_auth')['users']);
            $count_group = $this->db->count_all($this->config->item('tables', 'ion_auth')['groups']);

            if ($count_user >= 1)
            {
                $this->data['lang_user_plural'] = plural($this->lang->line('user'));
            }
            else
            {
                $this->data['lang_user_plural'] = $this->lang->line('user');
            }

            if ($count_group >= 1)
            {
                $this->data['lang_group_plural'] = plural($this->lang->line('group'));
            }
            else
            {
                $this->data['lang_group_plural'] = $this->lang->line('group');
            }

            $this->data['action'] =  site_url('backend/employee/proses');
            $this->data['judul'] =  set_value('judul');
            

            $this->data['employee']     = 'class="active"';
            $this->data['nbr_user']     = $count_user;
            $this->data['nbr_group']    = $count_group;
            $this->data['subtitle']     = $this->lang->line('employee_list');
            $this->data['page_content'] = 'backend/employee/upload';

            $this->render();
        }
    }


        public function save() {
        $this->load->library('excel');
        $option = $this->input->post('option');
        if ($this->input->post('importfile')) {
            $path = ROOT_UPLOAD_IMPORT_PATH;

            $config['upload_path'] = $path;
            $config['allowed_types'] = 'xlsx|xls|jpg|png';
            $config['remove_spaces'] = TRUE;
            $this->upload->initialize($config);
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('userfile')) {
                $error = array('error' => $this->upload->display_errors());
            } else {
                $data = array('upload_data' => $this->upload->data());
            }
            
            if (!empty($data['upload_data']['file_name'])) {
                $import_xls_file = $data['upload_data']['file_name'];
            } else {
                $import_xls_file = 0;
            }
            $inputFileName = $path . $import_xls_file;
            try {
                $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
            } catch (Exception $e) {
                die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
                        . '": ' . $e->getMessage());
            }
            $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
            
            $arrayCount = count($allDataInSheet);
            $flag = 0;

            if($option == 1){
                $createArray = array('NO','NIK','NAMA','JUMLAH','PINJAMAN');
                $makeArray = array('NO' => 'NO', 'NIK' => 'NIK', 'JUMLAH' => 'JUMLAH', 'PINJAMAN' => 'PINJAMAN');
            }elseif($option == 2){
                $createArray = array('NO','NIK','NAMA','KET','SIMPANAN');
                $makeArray = array('NO' => 'NO','NIK' => 'NIK','NAMA' => 'NAMA','KET' => 'KET','SIMPANAN' => 'SIMPANAN');
            }else{
                $createArray = array('First_Name', 'Last_Name', 'Email', 'DOB', 'Contact_NO');
                $makeArray = array('First_Name' => 'First_Name', 'Last_Name' => 'Last_Name', 'Email' => 'Email', 'DOB' => 'DOB', 'Contact_NO' => 'Contact_NO');
            }
            
            $SheetDataKey = array();
            foreach ($allDataInSheet as $dataInSheet) {
                foreach ($dataInSheet as $key => $value) {
                    if (in_array(trim($value), $createArray)) {
                        $value = preg_replace('/\s+/', '', $value);
                        $SheetDataKey[trim($value)] = $key;
                    } else {
                        
                    }
                }
            }
            $data = array_diff_key($makeArray, $SheetDataKey);
           
            if (empty($data)) {
                $flag = 1;
            }

           
            if ($flag == 1) {

                
                if($option == 1){

                    $this->import->updateData_koppinj();
                    for ($i = 7; $i <= $arrayCount; $i++) {
                        $addresses = array();
                        $NO = $SheetDataKey['NO'];
                        $NIK = $SheetDataKey['NIK'];
                        $JUMLAH = $SheetDataKey['JUMLAH'];
                        $PINJAMAN = $SheetDataKey['PINJAMAN'];
                        $NO = filter_var(trim($allDataInSheet[$i][$NO]), FILTER_SANITIZE_STRING);
                        $NIK = filter_var(trim($allDataInSheet[$i][$NIK]), FILTER_SANITIZE_STRING);
                        $JUMLAH = filter_var(trim($allDataInSheet[$i][$JUMLAH]), FILTER_SANITIZE_EMAIL);
                        $PINJAMAN = filter_var(trim($allDataInSheet[$i][$PINJAMAN]), FILTER_SANITIZE_STRING);
                        
                        $fetchData[] = array('id' => '', 'employee_id' => $NIK, 'jmlPinjaman' => $JUMLAH, 'cicilan' => $PINJAMAN, 'month' => '' , 'status' => '1');
                    }              
                    $data['koppinj'] = $fetchData;
                    $this->import->setBatchImport($fetchData);
                    $this->import->koppinj();

                }elseif($option == 2){
                    $this->import->updateData_kopsim();
                   for ($i = 2; $i <= $arrayCount; $i++) {
                        $addresses = array();
                        $NO = $SheetDataKey['NO'];
                        $NIK = $SheetDataKey['NIK'];
                        $NAMA = $SheetDataKey['NAMA'];
                        $KET = $SheetDataKey['KET'];
                        $SIMPANAN = $SheetDataKey['SIMPANAN'];
                        $NO = filter_var(trim($allDataInSheet[$i][$NO]), FILTER_SANITIZE_STRING);
                        $NIK = filter_var(trim($allDataInSheet[$i][$NIK]), FILTER_SANITIZE_STRING);
                        $NAMA = filter_var(trim($allDataInSheet[$i][$NAMA]), FILTER_SANITIZE_EMAIL);
                        $KET = filter_var(trim($allDataInSheet[$i][$KET]), FILTER_SANITIZE_STRING);
                        $SIMPANAN = filter_var(trim($allDataInSheet[$i][$SIMPANAN]), FILTER_SANITIZE_STRING);
                        
                        $fetchData[] = array('id' => '', 'employee_id' => $NIK, 'simpanan' => $SIMPANAN, 'month' => '', 'status' => '1');
                    }              
                    $data['kopsim'] = $fetchData;
                    $this->import->setBatchImport($fetchData);
                    $this->import->kopsim();
                }else{
                   for ($i = 2; $i <= $arrayCount; $i++) {
                        $addresses = array();
                        $firstName = $SheetDataKey['First_Name'];
                        $lastName = $SheetDataKey['Last_Name'];
                        $email = $SheetDataKey['Email'];
                        $dob = $SheetDataKey['DOB'];
                        $contactNo = $SheetDataKey['Contact_NO'];
                        $firstName = filter_var(trim($allDataInSheet[$i][$firstName]), FILTER_SANITIZE_STRING);
                        $lastName = filter_var(trim($allDataInSheet[$i][$lastName]), FILTER_SANITIZE_STRING);
                        $email = filter_var(trim($allDataInSheet[$i][$email]), FILTER_SANITIZE_EMAIL);
                        $dob = filter_var(trim($allDataInSheet[$i][$dob]), FILTER_SANITIZE_STRING);
                        $contactNo = filter_var(trim($allDataInSheet[$i][$contactNo]), FILTER_SANITIZE_STRING);
                        
                        $fetchData[] = array('first_name' => $firstName, 'last_name' => $lastName, 'email' => $email, 'dob' => $dob, 'contact_no' => $contactNo);
                    }              
                    $data['employeeInfo'] = $fetchData;
                    $this->import->setBatchImport($fetchData);
                    $this->import->importData();
                }
                


            } else {
                echo "Please import correct file";
            }


        }

        $count_user  = $this->db->count_all($this->config->item('tables', 'ion_auth')['users']);
        $count_group = $this->db->count_all($this->config->item('tables', 'ion_auth')['groups']);
        $this->data['nbr_user']     = $count_user;
        $this->data['nbr_group']    = $count_group;
        $this->data['subtitle']     = $this->lang->line('employee_list');
        $this->data['page_content'] = 'backend/employee/upload';

        $this->render();
        
    }
}
