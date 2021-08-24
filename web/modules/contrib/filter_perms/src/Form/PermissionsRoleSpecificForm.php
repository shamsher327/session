<?php

namespace Drupal\filter_perms\Form;

use Drupal\Core\Form\FormStateInterface;
use Drupal\user\RoleInterface;

/**
 * Provides the user permissions administration form for a specific role.
 */
class PermissionsRoleSpecificForm extends PermissionsForm {

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state, RoleInterface $user_role = NULL) {
    $this->saveFilterSettings((array) $user_role->id(), (array) self::ALL_OPTIONS);
    return $this->redirect('user.admin_permissions');
  }

}
