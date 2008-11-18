<div class="nested_set_manager" id="<?php echo $model; ?>_nested_set_manager">
  <h1><?php echo sfInflector::humanize(sfInflector::underscore($model)); ?> Nested Set Manager</h1>
  
  <div class="nested_set_manager_holder" id="<?php echo $model; ?>_nested_set_manager_holder">
    <?php echo get_partial('sfNestedSetManager/nested_set_list', array('model' => $model, 'field' => $field, 'root' => $root, 'records' => $records)); ?>
  </div>

</div>