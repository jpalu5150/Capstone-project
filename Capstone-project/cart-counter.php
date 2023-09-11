<?php
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM itemstable WHERE code='" . $_GET["code"] . "'");
			$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"], 'image'=>$productByCode[0]["image"]));
			
			if(!empty($_SESSION["Products-bought"])) {
				if(in_array($productByCode[0]["code"],array_keys($_SESSION["Products-bought"]))) {
					foreach($_SESSION["Products-bought"] as $k => $v) {
							if($productByCode[0]["code"] == $k) {
								if(empty($_SESSION["Products-bought"][$k]["quantity"])) {
									$_SESSION["Products-bought"][$k]["quantity"] = 0;
								}
								$_SESSION["Products-bought"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["Products-bought"] = array_merge($_SESSION["Products-bought"],$itemArray);
				}
			} else {
				$_SESSION["Products-bought"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["Products-bought"])) {
			foreach($_SESSION["Products-bought"] as $k => $v) {
					if($_GET["code"] == $k)
						unset($_SESSION["Products-bought"][$k]);				
					if(empty($_SESSION["Products-bought"]))
						unset($_SESSION["Products-bought"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["Products-bought"]);
	break;	
}
}
?>



<?php
if(isset($_SESSION["Products-bought"])){
    $total_quantity = 0;
    $total_price = 0;

    foreach ($_SESSION["Products-bought"] as $item){
        $item_price = $item["quantity"]*$item["price"];
		
			
			
                $item["name"];
				 $item["quantity"]; 
                   "$ ".$item["price"]; 
                   "$ ". number_format($item_price,2); 
                    $item["code"]; 
				$total_quantity += $item["quantity"];
				$total_price += ($item["price"]*$item["quantity"]);
    }
}
else{
    $total_quantity = 0;
}

		
    

    ?>