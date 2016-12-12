<?php
ini_set('display_errors', 1);
error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);

class LineColl {

    protected $LineList;

    public function __construct() {
		$this->LineList = new ArrayObject();
		
		$rootpath = $_SERVER['DOCUMENT_ROOT'];
		include $rootpath . '/incs/conn.php';
		include_once($rootpath . '/testClasses/Line.class.php');
		
		$query = "{call F_GetLines}";
		$dbo->doQuery($query);
		
		$list = $dbo->loadObjectList();
		foreach($list as $row)
		{
			$line = new Line();
			$line->initialize($row);
			$this->LineList->append($line);
		}
		
		//$this->LineList = $dbo->loadObjectList();
    }
	
	public function getLines()
	{
		return $this->LineList;
	}
}

?>