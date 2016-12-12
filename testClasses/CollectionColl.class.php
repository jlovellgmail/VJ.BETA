<?php
ini_set('display_errors', 1);
error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);

class CollectionColl {

    protected $CollectionList;

    public function __construct() {
		$this->CollectionList = new  ArrayObject();
    }
	
	public static function allCollections()
	{
		$collections = new CollectionColl();
		
		$rootpath = $_SERVER['DOCUMENT_ROOT'];
		include $rootpath . '/incs/conn.php';

		$query = "{call F_GetCollections}";
		$dbo->doQuery($query);
		$collections->CollectionList = $dbo->loadObjectList();
		
		return $collections;
	}
	
	public static function collectionsByLineID($LID)
	{
		$collections = new CollectionColl();
		
		$rootpath = $_SERVER['DOCUMENT_ROOT'];
		include $rootpath . '/incs/conn.php';
		include_once($rootpath . '/testClasses/Collection.class.php');

		$sql = "{CALL F_GetLineCollections (@LID=:LID)}";
        $param = array(":LID" => $LID);
        $dbo->doQueryParam($sql, $param);
		$list = $dbo->loadObjectList();
		foreach($list as $row)
		{
			$collection = new Collection();
			$collection->initialize($row);
			$collections->CollectionList->append($collection);
		}
		
		return $collections;
	}
	
	public function getCollections()
	{
		return $this->CollectionList;
	}
}

?>