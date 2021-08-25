<?php

namespace Drupal\indegenecustom\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Database\Database;
use Drupal\taxonomy\Entity\Term;
use Drupal\Core\Url;

/**
 * Class DisplayTableController.
 *
 * @package Drupal\indegenecustom\Controller
 */
class DisplayTableController extends ControllerBase
{


  public function getContent()
  {
    // First we'll tell the user what's going on. This content can be found
    // in the twig template file: templates/description.html.twig.
    // @todo: Set up links to create nodes and point to devel module.
    $build = [
      'description' => [
        '#theme' => 'indegenecustom_description',
        '#description' => 'foo',
        '#attributes' => [],
      ],
    ];
    return $build;
  }

  /**
   * Display.
   *
   * @return string
   *
   */
  public function display()
  {

    $link_header = [];

    $addnew = Url::fromUserInput('/admin/config/indegenecustom/form/indegenecustom');
    $importnew = Url::fromUserInput('/admin/config/indegenecustom/form/import');

    $rows1[0] =  [
      \Drupal::l('Add New', $addnew),
      \Drupal::l('Import Data in Csv', $importnew),

    ];

    $form['add_new'] = [
      '#type' => 'table',
      '#header' => $link_header,
      '#rows' => $rows1,
      '#empty' => t('No users found'),
    ];

    $header_table = array(
      'id' =>    t('SrNo'),
      'name' => t('Name'),
      'mobilenumber' => t('MobileNumber'),
      'email'=>t('Email'),
      'age' => t('Age'),
      'gender' => t('Gender'),
      'tags' => t('Technology'),
      'website' => t('Web site'),
      'opt' => t('operations'),
      'opt1' => t('operations'),
    );


    $query = \Drupal::database()->select('indegenecustom', 'm');
    $query->fields('m', ['id', 'name', 'mobilenumber', 'email', 'age', 'gender','tags', 'website' ] );
    $results = $query->execute()->fetchAll();
    $rows = array();
    foreach ($results as $data) {
      $delete = Url::fromUserInput('/admin/config/indegenecustom/form/delete/' . $data->id);
      $edit   = Url::fromUserInput('/admin/config/indegenecustom/form/indegenecustom?num=' . $data->id);

      $terms = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->load($data->tags);
      $tag_name = isset($terms->name->value) ? $terms->name->value : ''  ;


      $rows[] = array(
        'id' => $data->id,
        'name' => $data->name,
        'mobilenumber' => $data->mobilenumber,
        'email' => $data->email,
        'age' => $data->age,
        'gender' => $data->gender,
        'tags' => $tag_name,
        'website' => $data->website,
        \Drupal::l('Delete', $delete),
        \Drupal::l('Edit', $edit),
      );
    }
    $form['table'] = [
      '#type' => 'table',
      '#header' => $header_table,
      '#rows' => $rows,
      '#empty' => t('No users found'),
    ];


    return $form;
  }
}
