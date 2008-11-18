<?php
class sfNestedSetManagerComponents extends sfComponents
{
  public function getTree($model, $rootId = 0)
  {
    if( $rootId )
    {
      $root = Doctrine::getTable($model)->getTree()->findRoot($rootId);
    
      return Doctrine::getTable($model)->getTree()->fetchBranch($root->getId()); 
    } else {
      return Doctrine::getTable($model)->getTree()->fetchTree();
    }
  }

  public function executeManager()
  {
    $this->records = $this->getTree($this->model, $this->root);
  }
}
