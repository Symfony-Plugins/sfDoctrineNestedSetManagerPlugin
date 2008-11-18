<?php
use_helper('Form', 'Javascript');

$options = array();
foreach($records AS $record)
{
  if( $record->getId() != $sf_request->getParameter('id') )
  {
    $options[$record->getId()] = str_repeat('&nbsp;', $record->getNode()->getLevel() * 2).' '.$record->get($sf_request->getParameter('field'));
  }
}

echo select_tag('to_id', options_for_select($options, null, 'include_blank=true'), 'onchange="if( confirm(\'Are you sure you wish to move this record?\') ) { '.remote_function(array('url' => 'sfNestedSetManager/do_move_to', 'with' => "'root=".$sf_request->getParameter('root')."&field=".$sf_request->getParameter('field')."&model=".$sf_request->getParameter('model')."&id=".$sf_request->getParameter('id')."&to_id=' + value", 'update' => $sf_request->getParameter('model').'_nested_set_manager_holder')).' }"'); ?>
