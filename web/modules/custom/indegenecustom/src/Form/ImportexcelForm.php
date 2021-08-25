<?php

namespace Drupal\indegenecustom\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Database\Database;
use Symfony\Component\HttpFoundation\RedirectResponse;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use Drupal\Core\Url;

class ImportexcelForm extends FormBase
{
    public function getFormId()
    {
        return 'indegenecustom_form_import';
    }

    public function buildForm(array $form, FormStateInterface $form_state)
    {

        $form = array(
            '#attributes' => array('enctype' => 'multipart/form-data'),
        );

        $link_header = [];


        $format_link = Url::fromUserInput('/modules/custom/indegenecustom/format/save_format.csv');

        $rows1[0] =  [
            \Drupal::l('Get The format', $format_link),
        ];

        $form['add_new'] = [
            '#type' => 'table',
            '#header' => $link_header,
            '#rows' => $rows1,
            '#empty' => t('No users found'),
        ];

        $form['file_upload_details'] = array(
            '#markup' => t('<b>The File</b>'),
        );



        $validators = array(
            'file_validate_extensions' => array('csv'),
        );
        $form['excel_file'] = array(
            '#type' => 'managed_file',
            '#name' => 'excel_file',
            '#title' => t('File *'),
            '#size' => 20,
            '#description' => t('Excel format only'),
            '#upload_validators' => $validators,
            '#upload_location' => 'public://content/excel_files/',
        );

        $form['actions']['#type'] = 'actions';
        $form['actions']['submit'] = array(
            '#type' => 'submit',
            '#value' => $this->t('Save'),
            '#button_type' => 'primary',
        );

        return $form;
    }

    public function validateForm(array &$form, FormStateInterface $form_state)
    {
        if ($form_state->getValue('excel_file') == NULL) {
            $form_state->setErrorByName('excel_file', $this->t('upload proper File'));
        }
    }

    public function submitForm(array &$form, FormStateInterface $form_state)
    {
        $file = \Drupal::entityTypeManager()->getStorage('file')
            ->load($form_state->getValue('excel_file')[0]);
        $full_path = $file->get('uri')->value;
        $file_name = basename($full_path);

        $inputFileName = \Drupal::service('file_system')->realpath('public://content/excel_files/' . $file_name);

        $spreadsheet = IOFactory::load($inputFileName);

        $sheetData = $spreadsheet->getActiveSheet();

        $rows = array();
        foreach ($sheetData->getRowIterator() as $row) {
            //echo "<pre>";print_r($row);exit;
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(FALSE);
            $cells = [];
            foreach ($cellIterator as $cell) {
                $cells[] = $cell->getValue();
            }
            $rows[] = $cells;
        }

        // kint($rows);
        // die;
        if(count($rows) > 1){

            foreach ($rows as $row) {

                if(strtolower($row[0]) == 'name'){
                    continue;
                }
                $field  = array(
                    'name'   =>  $row[0],
                    'mobilenumber' => $row[1],
                    'email' =>  $row[2],
                    'age' =>$row[3],
                    'gender' =>$row[4],
                    'website' => $row[5],
                    'tags' => $row[6],
                );
                // kint($field);die;
                $query = \Drupal::database();
                $query->insert('indegenecustom')
                    ->fields($field)
                    ->execute();
            }

            \Drupal::messenger()->addMessage('imported successfully');
            // $form_state->setRedirect('indegenecustom.display_table_controller_display');
        }else{
            drupal_set_message(t('Nothing Found in csv.'), 'error');

        }
        $form_state->setRedirect('indegenecustom.display_table_controller_display');


    }
}
