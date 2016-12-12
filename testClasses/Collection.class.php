<?php
/**
 * Collection class
 * 
 */
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include $rootpath . '/core/table.class.php';

class Collection extends table {

	/**
     * @var int $CID -> Collection ID
     */
    protected $CID ;
	
	/**
     * @var char $LID -> Line ID
     */
    protected $LID;
	
	/**
     * @var int $Name -> Collection Name
     */
    protected $Name;
	
	/**
     * @var int $Url -> Collection Landing page
     */
    protected $Url;
	
	/**
     * @var datetime $DateAdded
     */
    protected $DateAdded;
	
	/**
     * @var bool $DelFlag
     */
    protected $DelFlag;

	protected $table = "Collections";
    protected $IDName = "CID";
	/**
     * 
     */
    public function __construct() {
        
    }
}

?>