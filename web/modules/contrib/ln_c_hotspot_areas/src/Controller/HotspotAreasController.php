<?php

namespace Drupal\ln_c_hotspot_areas\Controller;

use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Entity\EntityStorageException;
use Drupal\ln_c_hotspot_areas\Entity\HotspotArea;
use Drupal\ln_c_hotspot_areas\HotspotAreaInterface;
use Symfony\Component\HttpFoundation\Request;
use Drupal\Component\Utility\Xss;

class HotspotAreasController extends ControllerBase {

  /**
   * Deletes hotspot with $hid.
   *
   * @param $hid
   *   Hotspot id.
   *
   * @return \Drupal\Core\Ajax\AjaxResponse
   */
  public function deleteAction($hid) {
    if (!$this->accessCallback()) {
      $code = 403;
      $data = $this->t('You did a lot actions with hotspots and can not delete this hotspot right now. Wait some seconds before you can do it again.');
    }
    else {
      try {
        /** @var HotspotAreaInterface $hotspot */
        $hotspot = HotspotArea::load($hid);
        $target = $hotspot->getTarget();
        $hotspot->delete();
        $this->disableCache($target);
        $code = 200;
        $data = $this->t('Hotspot was successfully deleted');
      }
      catch (EntityStorageException $e) {
        $code = 500;
        $data = $e->getMessage();
      }
    }

    return new AjaxResponse($data, $code);
  }

  /**
   * Creates hotspot with values from request data.
   *
   * @param \Symfony\Component\HttpFoundation\Request $request
   * @return \Drupal\Core\Ajax\AjaxResponse
   */
  public function createAction(Request $request) {
    if (!$this->accessCallback()) {
      $code = 403;
      $parameters['error'] = $this->t('You did a lot actions with hotspots and can not create hotspot right now. Wait some seconds before you can do it again.');
    }
    else {
      $parameters = $request->request->all();
//      $parameters['title'] = preg_replace('/(javascript)+(\s)*:+/', '', Xss::filter($parameters['title']));
//      $parameters['description'] = preg_replace('/(javascript)+(\s)*:+/', '', Xss::filterAdmin($parameters['description']));
//      $parameters['link'] = preg_replace('/(javascript)+(\s)*:+/', '', Xss::filter($parameters['link']));
      $parameters['uid'] = $this->currentUser()->id();
      try {
        $hotspot = HotspotArea::create($parameters);
        $hotspot->setDescriptionFormat($parameters['description_format']);
        $hotspot->save();
        $this->disableCache($hotspot->getTarget());
        $code = 200;
        $parameters['hid'] = $hotspot->id();
        $parameters['description'] = check_markup($parameters['description'], $parameters['description_format']);
      }
      catch (EntityStorageException $e) {
        $code = 500;
        $parameters['error'] = $e->getMessage();
      }
    }

    return new AjaxResponse($parameters, $code);
  }

  /**
   * Update hotspot with $hid.
   *
   * @param $hid
   *   Hotspot id.
   * @param \Symfony\Component\HttpFoundation\Request $request
   *
   * @return \Drupal\Core\Ajax\AjaxResponse
   */
  public function updateAction($hid, Request $request) {
    if (!$this->accessCallback()) {
      $code = 403;
      $parameters['error'] = $this->t('You did a lot actions with hotspots and can not update this hotspot right now. Wait some seconds before you can do it again.');
    }
    else {
      /** @var HotspotAreaInterface $hotspot */
      $hotspot = HotspotArea::load($hid);
      if (is_null($hotspot)) {
        $code = 404;
        $parameters['error'] = $this->t('Can not find hotspot with hid ') + $hid;
      }
      else {
        $parameters = $request->request->all();
//        $parameters['title'] = preg_replace('/(javascript)+(\s)*:+/', "", Xss::filter($parameters['title']));
//        $parameters['description'] = preg_replace('/(javascript)+(\s)*:+/', "", Xss::filterAdmin($parameters['description']));
//        $parameters['link'] = preg_replace('/(javascript)+(\s)*:+/', "", Xss::filter($parameters['link']));
        $hotspot->setTitle($parameters['title']);
        $hotspot->setDescription($parameters['description']);
        $hotspot->setDescriptionFormat($parameters['description_format']);
        $hotspot->setLink($parameters['link']);
        $hotspot->setCoordinates([
          'x' => $parameters['x'],
          'y' => $parameters['y'],
          'x2' => $parameters['x2'],
          'y2' => $parameters['y2'],
        ]);

        try {
          $hotspot->save();
          $this->disableCache($hotspot->getTarget());
          $code = 200;
          $parameters['hid'] = $hotspot->id();
          $parameters['description'] = check_markup($parameters['description'], $parameters['description_format']);
        }
        catch (EntityStorageException $e) {
          $code = 500;
          $parameters['error'] = $e->getMessage();
        }
      }
    }

    return new AjaxResponse($parameters, $code);
  }

  /**
   * Check if user allowed to do actions with hotspots right now.
   *
   * @return bool
   */
  protected function accessCallback() {
    $flood = \Drupal::flood();
    $name = 'ln_c_hotspot_areas.action';
    $ip = \Drupal::request()->getClientIp();
    // Anonymous can work with hotspots every 20 seconds.
    if ($this->currentUser()->isAnonymous()) {
      $count = 1;
      $window = 20;
      if ($flood->isAllowed($name, $count, $window, $ip)) {
        $flood->register($name, $window, $ip);
        return TRUE;
      }
      else {
        return FALSE;
      }
    }
    // Authenticated user can work with hotspots every 10 second.
    else {
      $count = 5;
      $window = 10;
      if ($flood->isAllowed($name, $count, $window, $ip)) {
        $flood->register($name, $window, $ip);
        return TRUE;
      }
      else {
        return FALSE;
      }
    }
  }

  /**
   * Invalidated cache items with current hotspot tag.
   *
   * If user edit hotspots in one place it will displayed in other.
   *
   * @param $target
   *   Hotspot target.
   */
  protected function disableCache($target) {
    $tag = 'hotspot_areas:' .$target['field_name'] . ':' . $target['fid'] . ':' . $target['image_style'];
    \Drupal::service('cache_tags.invalidator')->invalidateTags([$tag]);
  }

}
