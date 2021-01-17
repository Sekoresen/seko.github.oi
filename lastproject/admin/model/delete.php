<?php
require_once "database.php";
$data = json_decode(file_get_contents("php://input"));
$table_name = $data[0]->table_name;
$pk_value = $data[0]->pk_value;
switch($table_name) {
    case "categories":
        echo "categories";
        require_once "model.categories.php";
        $objCategories = new modelCategories();
        $objCategories ->setCategoryName($pk_value);
        $objCategories ->deleteCategoriesWithStr();
        
        break;

    case "trainer":
        echo "trainer";
        require_once "model.trainer.php";
        $objTrainer = new modelTrainer();
        $objTrainer->setTrainerId ($pk_value);
        $objTrainer->deleteTrainerWithSeter();  
        break;

    case "submenu":
        echo "submenu";
        require_once "model.submenu.php" ;  
        $objSubmenu = new modelSubmenu ();
        $objSubmenu->setProductId($pk_value);
        $objSubmenu->deleteSubmenuWithSeter();
        break;

    case "supplements":
        echo "supplements";
        require_once "model.supplements.php";
        $objSupplements = new modelSupplements();
        $objSupplements->setSupplementId($pk_value);
        $objSupplements->deleteSupplement();
        break;

    case "member":
        echo "member";
        require_once "model.member.php";
        $objMember = new modelMember();
        $objMember->setMemberId($pk_value);
        $objMember->deleteMemberWithSeter();
        break;

    case "orders":
        echo "orders";
        require_once "model.orders.php";
        $objOrders = new modelOrders();
        $objOrders->setOrderId($pk_value);
        $objOrders->deleteOrderWithSeter();
        break;

    case "programs_type":
        echo "programs_type";
        require_once "model.programstype.php";
        $objProgramsType = new modelProgramsType();
        $objProgramsType->setProgramType($pk_value);
        $objProgramsType->deleteProTypeWithStr();
        break;

    case "programs":
        echo "programs";
        require_once "model.programs.php";
        $objPrograms = new modelPrograms();
        $objPrograms->setProgramId($pk_value);
        $objPrograms->deleteProgramWithSeter();
        break;

    case "trainer_supplement":
        echo "trainer_supplement";
        require_once "model.trainersupplements.php";
        $objTresup = new modelTrainerSupplement();
        $objTresup->setTrainerSupplementId($pk_value);
        $objTresup->deleteTrainerSupplements();

        break;

        case "slider";
		echo "slider";
		require_once "modelSlider.php";
		$objSlider = new ModelSlider();
		$objSlider->setSliderId ($pk_value);
		$objSlider->deleteSliderWithSeter();
		break;

}