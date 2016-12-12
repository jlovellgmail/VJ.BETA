<?php
/**
 * Gallery class
 * 
 */

class Gallery {

	/**
     * @var int $GID -> Gallery ID
     */
    protected $GID ;
	
	/**
     * @var string $ImgName -> Image Name
     */
    protected $ImgName;
	
	/**
     * @var string $ImageURL -> Image path
     */
    protected $ImageURL;
	
	/**
     * @var int $ItemID -> ID of the item associated with this image
     */
    protected $ItemID;
	
	/**
     * @var datetime $DateCreated
     */
    protected $DateCreated;
	
	/**
     * @var int $OrderNo
     */
    protected $OrderNo;
	
	/**
     * @var bool $DelFlag
     */
    protected $DelFlag;

	/**
     * 
     */
    public function __construct() {
        
    }
}

?>