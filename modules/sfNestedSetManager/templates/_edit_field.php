<?php use_helper('Form')?>

<?php echo input_tag($record->getId(), $record->get($field), 'onchange="'.remote_function(array('url' => 'sfNestedSetManager/edit_field', 'with' => "'field=".$field."&model=".$model."&id=".$record->getId()."&root=".$root."&value=' + escape(value)")).'"'); ?>
