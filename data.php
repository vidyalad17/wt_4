<?php

class RestaurantData{
	private $menuList;

	function  __construct(array $menuList)
	{
		if(sizeof($menuList)>0)
		{
		$this->menuList=$menuList;
		}
		else
		{
			throw new Exception("Empty Array");
		}
	}
	public function get_items()
	{

		$itemNameList=[];
		foreach($this->menuList as $menuitem)
		{
			$itemNameList[]=array(
				"name"=>$menuitem["name"]
			);
		}
		return json_encode($itemNameList);
	}
	public function getmenu($menu)
	{
		$response=["Invalid Request"];

		if($menu)
		{

			foreach($this->menuList as $menuitem){

				if(strcmp($menu,$menuitem["name"])==0)
				{

					$response=$menuitem;
					break;
				}
			}
		}
		return json_encode($response);
	}

}
?>
