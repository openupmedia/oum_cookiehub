<?php

namespace Drupal\oum_cookiehub\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;

/**
 * Plugin implementation of the 'Cookiehub cookie declaration' formatter.
 *
 * @FieldFormatter(
 *   id = "oum_cookiehub_cookie_declaration_formatter",
 *   label = @Translation("Cookiehub cookie declaration"),
 *   field_types = {
 *     "oum_cookiehub_cookie_declaration"
 *   }
 * )
 */
class CookieDeclarationFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $element = [];

    foreach ($items as $delta => $item) {
      if ($item->value) {
        $element[$delta] = [
          '#type' => 'html_tag',
          '#tag' => 'div',
          '#attributes' => [
            'class' => ['cookiehub-declaration'],
          ],
          '#attached' => [
            'library' => ['oum_cookiehub/cookiehub'],
          ]
        ];
      }
    }
    return $element;
  }

}
