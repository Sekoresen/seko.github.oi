<?php
$data=json_decode(file_get_contents("php://input"));
var_dump($data);
require_once "database.php";
$table_name=$data[0]->table_name;
$pk_value=$data[0]->pk_value;
switch ($table_name) {
    case "member":
        require_once "model.member.php";
        $member_name = $data[0]->member_name;
        $member_surname = $data[0]->member_surname;
        $member_email = $data [0]->member_email;
        $member_phonenumber= $data[0]->member_phonenumber;
        $member_hometown = $data[0]->member_hometown;

        $objMember = new modelMember();
        $objMember->setMemberName($member_name);
        $objMember->setMemberSurname($member_surname);
        $objMember->setMemberEmail($member_email);
        $objMember->setMemberPhonenumber($member_phonenumber);
        $objMember->setMemberHometown($member_hometown);
        $objMember->setMemberId($pk_value);
        $objMember->editMember();
        break;

    // case "categories":
    //     require_once "model.categories.php";
    //     $category_name = $data[0]->category_name; 
    //     $objCategories = new modelCategories();
    //     $objCategories -> setCategoryName($pk_value);   
    //     $objCategories -> editCategories();

    //     break;

    case "trainer":
        require_once "model.trainer.php";
        $trainer_name = $data[0]->trainer_name;
        $trainer_surname = $data[0]->trainer_surname;
        $trainer_experience = $data[0]->trainer_experience;
        $trainer_program = $data[0]->trainer_program;
        $trainer_img = $data[0]->trainer_img;
        $objTrainer = new modelTrainer();
        $objTrainer->setTrainerName($trainer_name);
        $objTrainer->setTrainerSurname($trainer_surname);
        $objTrainer->setTrainerExperience($trainer_experience);
        $objTrainer->setTrainerProgram($trainer_program);
        $objTrainer->setTrainerImg($trainer_img);
        $objTrainer->setTrainerId($pk_value);
        $objTrainer->editTrainer();

        break;

    case "submenu":
        require_once "model.submenu.php";
        $product_type = $data[0]->product_type;
        $category_name =$data[0]->category_name;
        $objSubmenu = new modelSubmenu ();
        $objSubmenu->setProductType ($product_type);
        $objSubmenu->setCategoryName($category_name);
        $objSubmenu->setProductId ($pk_value);
        $objSubmenu->editSubmenu();
        break;

    case "supplements":
        require_once "model.supplements.php";
        $supplement_name = $data[0]->supplement_name;
        $supplement_size = $data[0]->supplement_size;
        $supplement_taste = $data[0]->supplement_taste;
        $supplement_price = $data[0]->supplement_price;
        $supplement_img = $data[0]->supplement_img;
        $product_id = $data[0]->product_id;
        $objSupplements = new modelSupplements();
        $objSupplements->setSupplementName($supplement_name);
        $objSupplements->setSupplementSize($supplement_size);
        $objSupplements->setSupplementTaste($supplement_taste);
        $objSupplements->setSupplementPrice($supplement_price);
        $objSupplements->setSupplementImg($supplement_img);
        $objSupplements->setProductId($product_id);
        $objSupplements->setSupplementId($pk_value);
        $objSupplements->editSupplement();
        break;
    
    case "orders":
        require_once "model.orders.php";
        $product_id = $data[0]->product_id;
        $member_id = $data[0]->member_id;
        $payment_status = $data[0]->payment_status;
        $objOrders = new modelOrders();
        $objOrders->setProductId($product_id);
        $objOrders->setMemberId($member_id);
        $objOrders->setPaymentStatus($payment_status);
        $objOrders->setOrderId($pk_value);
        $objOrders->editOrder();
        break;
        
    case "programs":
        require_once "model.programs.php";
        $program_name = $data[0]->program_name;
        $program_type = $data[0]->program_type;
        $objPrograms = new modelPrograms();
        $objPrograms->setProgramName($program_name);
        $objPrograms->setProgramType($program_type);
        $objPrograms->setProgramId($pk_value);
        $objPrograms->editProgram();
        break;
    case "trainer_supplement":
        require_once "model.trainersupplements.php";
        $trainer_id = $data[0]->trainer_id;
        $supplement_id = $data[0]->supplement_id;
        $objTresup = new modelTrainerSupplement();
        $objTresup->setTrainerId($trainer_id);
        $objTresup->setSupplementId($supplement_id);
        $objTresup->setTrainerSupplementId($pk_value);
        $objTresup->editTrainerSupplement();

        break;
        
    }
?>