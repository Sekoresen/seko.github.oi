<?php

$data = json_decode(file_get_contents("php://input"));
var_dump($data);
require_once "database.php";  //parentclass

$table_name=$data[0]->table_name;
switch ($table_name) {
    case "member":
    echo "member";
    require_once "model.member.php";

    $objMember = new modelMember () ;
    //insert so seteri
    $member_name=$data[0]->member_name;
    $member_surname=$data[0]->member_surname;
    $member_email=$data[0]->member_email;
    $member_phonenumber=$data[0]->member_phonenumber;
    $member_hometown=$data[0]->member_hometown;
    $objMember->setMemberName ($member_name);
    $objMember->setMemberSurname ($member_surname);
    $objMember->setMemberEmail ($member_email);
    $objMember->setMemberPhonenumber ($member_phonenumber);
    $objMember->setMemberHometown ($member_hometown);
    $objMember->insertMemberWithSeter();
    break;

    case "categories":
    echo "categories";
    require_once "model.categories.php";
    $objCategories = new modelCategories();
    $category_name=$data[0]->category_name;
    $objCategories->setCategoryName($category_name);
    $objCategories->insertCategoriesWithSeter();
    
    break;

    case "submenu":
        echo "submenu";
        require_once "model.submenu.php";
        $objSubmenu = new modelSubmenu();
        $product_type=$data[0]->product_type;
        $category_name=$data[0]->category_name;
        $objSubmenu->setProductType($product_type);
        $objSubmenu->setCategoryName($category_name);
        $objSubmenu->insertSubmenuWithSeter();

    break;

    case "programs_type":
        echo "programs_type";
        require_once "model.programstype.php";
        $objProgramsType = new modelProgramsType();
        $program_type=$data[0]->program_type;
        $objProgramsType->setProgramType($program_type);
        $objProgramsType->insertProgramsTypeWithSeter();

    break;

    case "programs":
        echo "programs";
        require_once "model.programs.php";
        $objPrograms = new modelPrograms();
        $program_name = $data[0]->program_name;
        $program_type = $data[0]->program_type;
        $objPrograms->setProgramName($program_name);
        $objPrograms->setProgramType($program_type);
        $objPrograms->insertProgramWithSeter();

    break;   
    
    case "supplements":
        echo "supplements";
        require_once "model.supplements.php";
        $objSupplements = new modelSupplements();
        $supplement_name = $data[0]->supplement_name;
        $supplement_size = $data[0]->supplement_size;
        $supplement_taste = $data[0]->supplement_taste;
        $supplement_price = $data[0]->supplement_price;
        $supplement_img = $data[0]->supplement_img;
        $product_id = $data[0]->product_id;
        $objSupplements->setSupplementName($supplement_name);
        $objSupplements->setSupplementSize($supplement_size);
        $objSupplements->setSupplementTaste($supplement_taste);
        $objSupplements->setSupplementPrice($supplement_price);
        $objSupplements->setSupplementImg($supplement_img);
        $objSupplements->setProductId($product_id);
        $objSupplements->insertSupplementsWithSeter();

    break;

    case "trainer":
        echo "trainer";
        require_once "model.trainer.php";
        $objTrainer = new modelTrainer();
        $trainer_name  = $data[0]->trainer_name;
        $trainer_surname = $data[0]->trainer_surname;
        $trainer_experience = $data[0]->trainer_experience;
        $trainer_program= $data[0]->trainer_program;
        $trainer_img= $data[0]->trainer_img;
        $objTrainer->setTrainerName($trainer_name);
        $objTrainer->setTrainerSurname($trainer_surname);
        $objTrainer->setTrainerExperience($trainer_experience);
        $objTrainer->setTrainerProgram($trainer_program);
        $objTrainer->setTrainerImg($trainer_img);
        $objTrainer->insertTrainerWithSeter();

        break;

    case "orders":
        echo "orders";
        require_once "model.orders.php";
        $objOrders = new modelOrders();
        $product_id = $data[0]->product_id;
        $member_id = $data[0]->member_id;
        $payment_status = $data[0]->payment_status;
        $objOrders->setProductId($product_id);
        $objOrders->setMemberId($member_id);
        $objOrders->setPaymentStatus($payment_status);
        $objOrders->insertOrderWithSeter();
        
        break;
    
        case "trainer_supplement":
            echo "trainer_supplement";
            require_once "model.trainersupplements.php";
            $objTresup = new modelTrainerSupplement();
            $trainer_id = $data[0]->trainer_id;
            $supplement_id = $data[0]->supplement_id;
            $objTresup->setTrainerId($trainer_id);
            $objTresup->setSupplementId($supplement_id);
            $objTresup->insertTrainerSupplements();

            break;

            case "slider";
            echo "slider";
            require_once "modelSlider.php";
            $objSlider = new ModelSlider();
            $slider_img=$data[0]->slider_img;
            $objSlider->setSliderImg($slider_img);
            $objSlider->insertSliderWithSeter();

            break;
}


?>