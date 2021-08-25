<?php
namespace Drupal\indegenecustom\Controller;
use Drupal\Core\Controller\ControllerBase;

class CustomController extends ControllerBase
{
    public function content(){
        return [
            '#type'=>'markup',
            '#markup'=>$this->t('CustomIndegene Module COntroller Content'),
        ];
    }

    public function display() {
        return [
          '#type' => 'markup',
          '#markup' => $this->t('This page contain all inforamtion of custom module.')
        ];
      }
}