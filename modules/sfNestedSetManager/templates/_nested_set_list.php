<?php use_helper('Javascript'); ?>
<?php $update = $model.'_nested_set_manager_holder'; ?>

<?php if( isset($records) && is_object($records) && $records->count() > 0 ): ?>
  <ul class="nested_set_list">
  <?php $prevLevel = null; ?>
  <?php foreach($records AS $record): ?>
    <li>
      <div class="main_element">
        <div style="margin-left: <?php echo $record->getNode()->getLevel() * 10; ?>px;" id="<?php echo $record->getId(); ?>_field" class="field">
          <?php echo get_partial('sfNestedSetManager/edit_field', array('record' => $record, 'field' => $field, 'model' => $model, 'root' => $root)); ?>
        </div>
      </div>

      <div class="links">
        <?php echo link_to_remote('add child', array('url' => 'sfNestedSetManager/add_child?root='.$root.'&field='.$field.'&model='.$model.'&parent_id='.$record->getId(), 'update' => $update)); ?>

        / <?php echo link_to_remote('delete', array('url' => 'sfNestedSetManager/delete?root='.$root.'&field='.$field.'&model='.$model.'&id='.$record->getId(), 'update' => $update, 'confirm' => 'Are you sure you wish to delete this record?')); ?>

        <?php if( $prevLevel >= $record->getNode()->getLevel() ): ?>
          / <?php echo link_to_remote('move up', array('url' => 'sfNestedSetManager/move?direction=up&root='.$root.'&field='.$field.'&model='.$model.'&id='.$record->getId(), 'update' => $update)); ?>
        <?php endif; ?>

        <?php if( $record->getNode()->hasNextSibling() ): ?>
          / <?php echo link_to_remote('move down', array('url' => 'sfNestedSetManager/move?direction=down&root='.$root.'&field='.$field.'&model='.$model.'&id='.$record->getId(), 'update' => $update)); ?>
        <?php endif; ?>

        <?php if( $record->getNode()->getLevel() > 0 ): ?>
          / <?php echo link_to_remote('move', array('url' => 'sfNestedSetManager/move_to?root='.$root.'&field='.$field.'&model='.$model.'&id='.$record->getId(), 'update' => $record->getId().'_field')); ?>
        <?php endif; ?>
      </div>
    </li>
  <?php $prevLevel = $record->getNode()->getLevel(); ?>
  <?php endforeach; ?>
  </ul>
<?php else: ?>
  <?php echo link_to_remote('add root', array('url' => 'sfNestedSetManager/add_root?field='.$field.'&model='.$model, 'update' => $update)); ?>
<?php endif; ?>