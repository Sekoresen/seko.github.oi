<?php
require_once "database.php";
$table_name=$_GET["table_name"];
$data=array();
switch($table_name) {
    case "member":
        //echo "members"
        require_once "model.member.php";
        $objMember = new modelMember();
        $results=$objMember->selectMember();
        foreach($results as $row) {
            $data["records"] []=array("member_id" =>$row["member_id"],
                                      "member_name" =>$row["member_name"],
                                      "member_surname"=>$row["member_surname"],
                                      "member_email"=>$row["member_email"],
                                      "member_phonenumber"=>$row["member_phonenumber"],
                                      "member_hometown"=>$row["member_hometown"]);
        };
        // var_dump($results);
        break;
        case "categories":
            require_once "model.categories.php";
            $objCategories = new modelCategories();
            $results=$objCategories->selectCategories();
            foreach($results as $row) {
                $data["records"] []=array("category_name"=>$row["category_name"]);
            };
            // var_dump($results);
            break;

        case "submenu":
            require_once "model.submenu.php";
            $objSubmenu = new modelSubmenu();
            $results=$objSubmenu->selectSubmenu();
            foreach($results as $row) {
                $data["records"] []=array(  "product_id"=>$row["product_id"],
                                            "product_type"=>$row["product_type"], 
                                           "category_name"=>$row["category_name"]);
            };
            // var_dump($results);
            break;

         case "programs_type":
            require_once "model.programstype.php";
            $objProgramsType = new modelProgramsType();
            $results=$objProgramsType->selectProgramsType();  
            foreach($results as $row) {
                $data["records"] []=array("program_type"=>$row["program_type"]);
            };
            // var_dump($results);
            break;

         case "programs":
            require_once "model.programs.php";
            $objPrograms = new modelPrograms();
            $results = $objPrograms->selectProgram();
            foreach($results as $row) {
                $data["records"] []=array(  "program_id"=>$row["program_id"],
                                           "program_name"=>$row["program_name"],
                                          "program_type"=>$row["program_type"]);
            };
            // var_dump($results);
            break;

        case "trainer":
            require_once "model.trainer.php";
            $objTrainer = new modelTrainer();
            $results = $objTrainer->selectTrainer();
            foreach($results as $row) {
                $data["records"] []=array(  "trainer_name"=>$row["trainer_name"],
                                            "trainer_surname"=>$row["trainer_surname"],
                                            "trainer_experience"=>$row["trainer_experience"],
                                            "trainer_program"=>$row["trainer_program"],
                                            "trainer_img"=>$row["trainer_img"],
                                            "trainer_id"=>$row["trainer_id"]);
            };

                // var_dump($results);
                break;

        case "supplements":
            require_once "model.supplements.php";
            $objSupplements = new modelSupplements();
            $results = $objSupplements->selectSupplement();
            foreach($results as $row) {
                $data["records"] []=array(  "supplement_id"=>$row["supplement_id"],
                                            "supplement_name"=>$row["supplement_name"],
                                            "supplement_size"=>$row["supplement_size"],
                                            "supplement_taste"=>$row["supplement_taste"],
                                            "supplement_price"=>$row["supplement_price"],
                                            "supplement_img"=>$row["supplement_img"],
                                            "product_id"=>$row["product_id"],
                                            "product_type"=>$row["product_type"],
                                            "category_name"=>$row["category_name"]);
            };

            // var_dump($results);
            break;

            case "orders":
                require_once "model.orders.php";
                $objOrders = new modelOrders();
                $results = $objOrders->selectOrder();
                foreach($results as $row) {
                    $data["records"] []=array( "order_id"=>$row["order_id"],
                                                "product_id"=>$row["product_id"],
                                                "product_type"=>$row["product_type"],
                                                "category_name"=>$row["category_name"],
                                                "member_id"=>$row["member_id"],
                                                "member_name" =>$row["member_name"],
                                                "member_surname"=>$row["member_surname"],
                                                "member_email"=>$row["member_email"],
                                                "member_phonenumber"=>$row["member_phonenumber"],
                                                "member_hometown"=>$row["member_hometown"],
                                                "payment_status"=>$row["payment_status"]);
                };

                break;

            case "trainer_supplement":
                require_once "model.trainersupplements.php";
                $objTresup = new modelTrainerSupplement();
                $results = $objTresup->selectTrainerSupplement();
                foreach($results as $row) {
                    $data["records"] []=array( "trainer_supplement_id"=>$row["trainer_supplement_id"],
                                                "trainer_id"=>$row["trainer_id"],
                                                "trainer_name"=>$row["trainer_name"],
                                                "trainer_surname"=>$row["trainer_surname"],
                                                "trainer_experience"=>$row["trainer_experience"],
                                                "trainer_program"=>$row["trainer_program"],
                                                 "trainer_img"=>$row["trainer_img"],
                                                 "supplement_id"=>$row["supplement_id"],
                                                 "supplement_name"=>$row["supplement_name"],
                                                 "supplement_size"=>$row["supplement_size"],
                                                 "supplement_taste"=>$row["supplement_taste"],
                                                 "supplement_price"=>$row["supplement_price"],
                                                 "supplement_img"=>$row["supplement_img"],
                                                 "product_id"=>$row["product_id"]);
                };
                break;

                case "slider";
                //echo
                require_once "modelSlider.php";
                $objSlider = new ModelSlider();
                $results = $objSlider->selectSlider();
                foreach($results as $row) {
                    $data["records"] []=array("slider_id"=>$row["slider_id"],
                                            "slider_img"=>$row["slider_img"]);
                                            
                                        };
                                        break;


}



echo json_encode($data);

?>