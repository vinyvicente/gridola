<?php
/*!
 * Gridola - Super Simple Grid for Zend Framework 1.x
 * Copyright(c) 2011 Tom Shaw <tom@tomshaw.info>
 * MIT Licensed
 */
abstract class App_Grid_Abstract extends App_Grid_Gridola
{
    protected $_grid = array();
    
    protected $_select = null;
    
    protected $_formId = 'gridola';
    
    protected $_template = 'grid';
    
    protected $_templateExtension = '.phtml';
    
    protected $_exportTypes = array();
    
    protected $_Sort = null;
    
    protected $_Order = null;
    
    protected $_massActionField = null;
    
    protected $_actions = array();
    
    protected $_massactions = array();
    
    protected $_rowClickUrl = array();
    
    protected $_cycleColors = array();
    
    protected $_onMouseOverColor = null;
    
    protected $_tableClass = null;
    
    protected $_scrollingTypes = array('All','Elastic','Jumping','Sliding');
    
    protected $_scrollType = null;
    
    protected $_paginatorPartial = 'gridpagination';
    
    public function __construct()
    {
    	parent::__construct();
        $this->_prepareData();
    }
    
    protected function getGrid()
    {
        return $this->_grid;
    }
    
    protected function setSelect(Zend_Db_Table_Select $select)
    {
        $this->_select = $select;
    }
    
    protected function getSelect()
    {
        return $this->_select;
    }
    
    protected function setFormId($formId)
    {
        $this->_formId = $formId;
    }
    
    protected function getFormId()
    {
        return $this->_formId;
    }
    
    protected function setTemplate($template)
    {
        $this->_template = $template;
    }
    
    protected function getTemplate()
    {
        return $this->_template . $this->getTemplateExtension();
    }
    
    protected function getTableClass()
    {
    	return $this->_tableClass;
    }
    
    protected function getTemplateExtension()
    {
    	return $this->_templateExtension;
    }
    
    protected function setExportTypes($exportTypes = array())
    {
        $this->_exportTypes = $exportTypes;
    }
    
    protected function getExportTypes()
    {
        return $this->_exportTypes;
    }
    
    protected function setSort($sort)
    {
        $this->_sort = $sort;
    }
    
    protected function getSort()
    {
        return $this->_sort;
    }
    
    protected function setOrder($order)
    {
        $this->_order = $order;
    }
    
    protected function getOrder()
    {
        return $this->_order;
    }
    
    protected function setMassactionField($field)
    {
        $this->_massActionField = $field;
    }
    
    protected function getMassactionField()
    {
        return $this->_massActionField;
    }
    
    protected function getActions()
    {
        return $this->_actions;
    }
    
    protected function getMassActions()
    {
        return $this->_massactions;
    }
    
    protected function setRowClickUrl($url)
    {
    	$this->_rowClickUrl = $url;
    }
    
    protected function getRowClickUrl()
    {
    	return $this->_rowClickUrl;
    }
    
    protected function setCycleColors($cycleColors)
    {
    	$this->_cycleColors = $cycleColors;
    }
    
    protected function getCycleColors()
    {
    	return $this->_cycleColors;
    }
    
    protected function setOnMouseOverColor($onMouseOverColor)
    {
    	$this->_onMouseOverColor = $onMouseOverColor;
    }
    
    protected function getOnMouseOverColor()
    {
    	return $this->_onMouseOverColor;
    }
    
    protected function getScrollingTypes($index = null)
    {
        if($index) {
            if(isset($this->_scrollingTypes[$index])) {
                return $this->_scrollingTypes[$index]; 
            }
        }
        return $this->_scrollingTypes;
    }
    
    protected function setScrollType($scrollType)
    {
    	$this->_scrollType = $scrollType;
    }
    
    protected function getScrollType()
    {
    	return $this->_scrollType;
    }
    
    protected function setPaginatorPartial($partial)
    {
    	$this->_paginatorPartial = $partial;
    }
    
    protected function getPaginatorPartial()
    {
    	return $this->_paginatorPartial  . $this->getTemplateExtension();
    }
    
    protected function _prepareData()
    {
        if (is_null($this->getSelect())) {
            $this->_prepareData();
        }
        if (!sizeof($this->getGrid())) {
            $this->_prepareColumns();
        }
        if (!sizeof($this->getActions())) {
            $this->_prepareActions();
        }
        if (!sizeof($this->getMassActions())) {
            $this->_prepareMassActions();
        }
        if (!sizeof($this->getRowClickUrl())) {
            $this->_prepareRowClickUrl();
        }
        if (!sizeof($this->getCycleColors())) {
            $this->_prepareCycleColors();
        }
        if (is_null($this->getOnMouseOverColor())) {
            $this->_prepareOnMouseOverColor();
        }
        return parent::_prepareData();
    }
    
    protected function addColumn($key, $data = array())
    {
        $this->_grid[$key] = $data;
    }
    
    protected function addAction($key, $data = array())
    {
        $this->_actions[$key] = $data;
    }
    
    protected function addMassAction($key, $data = array())
    {
        $this->_massactions[$key] = $data;
    }
    
    abstract protected function _prepareColumns();
    
    abstract protected function _prepareActions();
    
    abstract protected function _prepareMassActions();
    
    abstract protected function _prepareRowClickUrl();
    
    abstract protected function _prepareCycleColors();
    
    abstract protected function _prepareOnMouseOverColor();   
}