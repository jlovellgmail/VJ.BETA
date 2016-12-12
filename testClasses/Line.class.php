<?php

$rootpath = $_SERVER['DOCUMENT_ROOT'];
include $rootpath . '/core/table.class.php';

class Line extends table {

    protected $LID;
    protected $Name;
    protected $DateCreated;
    protected $Tagline;
    protected $ImgUrl;
    protected $CssClass;
    protected $table = "Lines";
    protected $IDName = "LID";
	protected $_Collections;

    public function __construct() {
        $_Collections = new ArrayObject();
    }
	
	public function getLineCollections()
	{
		return $this->_Collections;
	}
	
	public function initialize($properties) {
		parent::initialize($properties);
		
		$rootpath = $_SERVER['DOCUMENT_ROOT'];
		include_once($rootpath . '/testClasses/CollectionColl.class.php');
		
		$collections = CollectionColl::collectionsByLineID($this->LID);
		$this->_Collections = $collections->getCollections();
	}
}

?>