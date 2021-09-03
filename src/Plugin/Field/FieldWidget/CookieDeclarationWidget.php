<?php

namespace Drupal\oum_cookiehub\Plugin\Field\FieldWidget;

use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Field\FieldItemListInterface;

/**
 * Defines the 'oum_cookiehub_cookie_declaration_widget' field widget.
 *
 * @FieldWidget(
 *   id = "oum_cookiehub_cookie_declaration_widget",
 *   label = @Translation("Cookiehub cookie declaration"),
 *   field_types = {"oum_cookiehub_cookie_declaration"},
 * )
 */
class CookieDeclarationWidget extends WidgetBase {

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $element = [];
    $element['value'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Enable cookie declaration'),
      '#default_value' => isset($items[$delta]->value) ? $items[$delta]->value : 0,
    ];

    return $element;
  }

}
