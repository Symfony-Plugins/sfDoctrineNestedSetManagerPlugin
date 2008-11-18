<?php
function get_nested_set_manager($model, $field, $root = 0)
{
  sfContext::getInstance()->getResponse()->addStylesheet('/sfDoctrineNestedSetManagerPlugin/css/manager.css');
  
  return get_component('sfNestedSetManager', 'manager', array('model' => $model, 'field' => $field, 'root' => $root));
}
