<?php
/**
 * Created by PhpStorm.
 * User: twhiston
 * Date: 12/10/16
 * Time: 13:21
 */

namespace Drupal\elastic_search\Plugin\FieldMapper;

use Drupal\Core\StringTranslation\StringTranslationTrait;
use Drupal\elastic_search\Annotation\FieldMapper;
use Drupal\elastic_search\Plugin\FieldMapper\FormHelper\BoostField;
use Drupal\elastic_search\Plugin\FieldMapper\FormHelper\DocValueField;
use Drupal\elastic_search\Plugin\FieldMapper\FormHelper\IndexField;
use Drupal\elastic_search\Plugin\FieldMapper\FormHelper\NullValueField;
use Drupal\elastic_search\Plugin\FieldMapper\FormHelper\StoreField;
use Drupal\elastic_search\Plugin\FieldMapperBase;

/**
 * Class Boolean
 *
 * @FieldMapper(
 *   id = "boolean",
 *   label = @Translation("Boolean")
 * )
 */
class Boolean extends FieldMapperBase {

  use StringTranslationTrait;

  use BoostField;
  use DocValueField;
  use IndexField;
  use NullValueField;
  use StoreField;

  /**
   * @inheritdoc
   */
  public function getSupportedTypes() {
    return ['boolean'];
  }

  /**
   * @inheritdoc
   */
  public function getFormFields(array $defaults, int $depth = 0): array {
    return array_merge($this->getBoostField($defaults[$this->getBoostFieldId()]
                                            ?? $this->getBoostFieldDefault()),
                       $this->getDocValueField($defaults[$this->getDocValueFieldId()]
                                               ??
                                               $this->getDocValueFieldDefault()),
                       $this->getIndexField($defaults[$this->getIndexFieldId()]
                                            ?? $this->getIndexFieldDefault()),
                       $this->getNullValueField($defaults[$this->getNullValueFieldId()]
                                                ??
                                                $this->getNullValueFieldDefault()),
                       $this->getStoreField($defaults[$this->getStoreFieldId()]
                                            ?? $this->getStoreFieldDefault()));
  }

}