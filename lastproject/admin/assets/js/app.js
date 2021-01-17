var app = angular.module('myApp',["ngRoute"]);
app.controller('myCtrl', function($scope, $http, $routeParams) {
    $scope.getId=0;
    $scope.successEditAlert=false;
    $scope.successAlert=false;
    $scope.dangerAlert=false; 
    $scope.infoAlert = false;
    $scope.checkUrl = $routeParams.id;

    // INSERT <<<<>>>> EDIT <<<<>>>> DELETE <<<<<
    function postJson(dataObject) {
        $http (
            {
                method: "post",  //od kade
                url: 'model/insert.php',  //kade odi
                data: dataObject,  //jsonot koj ke go vnesime
                headers: { 'Content-Type' :
                'application/x-www-form-urlencoded' }
            }
        );
        }
        function postEditJson(dataObject) {
            $http (
                {
                    method: "post",  //od kade
                    url: 'model/edit.php',  //kade odi
                    data: dataObject,  //jsonot koj ke go vnesime
                    headers: { 'Content-Type' :
                    'application/x-www-form-urlencoded' }
                }
            );
            }
        function postJsonDelete(dataObject) {
            $http (
                {
                    method: "post",  //od kade
                    url: 'model/delete.php',  //kade odi
                    data: dataObject,  //jsonot koj ke go vnesime
                    headers: { 'Content-Type' :
                    'application/x-www-form-urlencoded' }
                }
            );
            window.location.reload();
            }

// ***********************
//           JSON
// ***********************

$scope.member=[];

$http.get("model/select.php?table_name=member")
.then(function(response){
    $scope.member=response.data.records;
});

$scope.categories=[];

$http.get("model/select.php?table_name=categories")
.then(function(response){
    $scope.categories=response.data.records;
});

$scope.submenu=[];

$http.get("model/select.php?table_name=submenu")
.then(function(response){
    $scope.submenu=response.data.records;
});

$scope.programs_type=[];

$http.get("model/select.php?table_name=programs_type")
.then(function(response){
    $scope.programs_type=response.data.records;
});

$scope.programs=[];

$http.get("model/select.php?table_name=programs")
.then(function(response){
    $scope.programs=response.data.records;
});

$scope.trainer=[];

$http.get("model/select.php?table_name=trainer")
.then(function(response){
    $scope.trainer=response.data.records;
});

$scope.supplements=[];

$http.get("model/select.php?table_name=supplements")
.then(function(response){
    $scope.supplements=response.data.records;
});

$scope.orders=[];

$http.get("model/select.php?table_name=orders")
.then(function(response){
    $scope.orders=response.data.records;
});

$scope.trainer_supplement=[];

$http.get("model/select.php?table_name=trainer_supplement")
.then(function(response){
    $scope.trainer_supplement=response.data.records;
});

$scope.slider=[];
$http.get("model/select.php?table_name=slider")
.then(function(response)
{$scope.slider=response.data.records;
});


// =============FUNCTION DELETE====================

$scope.function_deleteRow = function(table_name,pk_value) {
    var deleteJson = [{"table_name":table_name, "pk_value":pk_value}]
    postJsonDelete (deleteJson);
}

$scope.function_deleteRowSubmenu = function (pk_value) {
    console.log("deleteRowSubmenu");
    var find = 0;
    angular.forEach($scope.supplements, function(value,keys) {
        if ($scope.supplements[keys].product_id == pk_value) {
            find = 1;
            $scope.infoAlert = true;
        }
    });
}

// ******************* FUNCTION ******************

$scope.function_addcategory = function(category_name) {
    var categoriesJson=[{"category_name":category_name, "table_name":"categories"}]
    console.log(categoriesJson);
    postJson(categoriesJson);
    $scope.successAlert=true;
    $scope.dangerAlert=false;
}

$scope.function_addSubmenu = function(product_type, category_name, pk_value, action) {
    var find = 0;
    angular.forEach($scope.submenu, function(value,keys){
        if ($scope.submenu[keys].product_type == product_type) {
            find=1;
            $scope.infoAlert=true;
            console.log($scope.submenu[keys].product_type)
        }
    });

    if (find==0) {
        var submenuJson = [{"product_type":product_type, "category_name": category_name, "table_name":"submenu", "action":"insert"}]
        console.log(submenuJson);
        postJson(submenuJson);
        $scope.dangerAlert=false;
        $scope.successAlert=true; 
        $scope.infoAlert = false;
        $scope.successEditAlert=false;
    } else {
        var submenuJson = [{"product_type":product_type, "category_name": category_name, "pk_value":pk_value,"table_name":"submenu", "action":"update"}]
        console.log(submenuJson);
        postEditJson(submenuJson);
        $scope.successEditAlert=true;
    }
  
}

$scope.function_addProgramType = function(program_type){
    var programsTypeJson = [{"program_type":program_type, "table_name":"programs_type"}]
    console.log(programsTypeJson);
    postJson(programsTypeJson);
    $scope.successAlert=true;
}

$scope.function_addProgram = function(program_name, program_type, pk_value, action) {
    var tresupJson = [{"program_name":program_name, "program_type":program_type, "pk_value":pk_value, "table_name":"programs", "action":action}]
    console.log(tresupJson);
    if (action=='insert') {
        postJson(tresupJson);
        $scope.dangerAlert=false;
        $scope.successAlert=true; 
        $scope.successEditAlert=false;
    } else {
        postEditJson(tresupJson);
        $scope.successEditAlert=true;
    }
    
}

$scope.function_addSupplements = function(supplement_name, supplement_size, supplement_taste, supplement_price, supplement_img, product_id, pk_value, action) {
    var supplementJson = [{"supplement_name":supplement_name, "supplement_size":supplement_size, "supplement_taste":supplement_taste, "supplement_price": supplement_price, "supplement_img":supplement_img, "product_id":product_id, "pk_value":pk_value, "table_name":"supplements", "action":action}]
    console.log(supplementJson);
    if (action == 'insert') {
        postJson(supplementJson);
        $scope.dangerAlert=false;
        $scope.successAlert=true; 
        $scope.successEditAlert=false;
    } else {
        postEditJson (supplementJson);
        $scope.successEditAlert=true;
    }
    
}
$scope.function_addTrainer = function(trainer_name, trainer_surname, trainer_experience, trainer_program, trainer_img, pk_value, action) {
    var trainerJson = [{"trainer_name": trainer_name, "trainer_surname": trainer_surname, "trainer_experience": trainer_experience, "trainer_program": trainer_program,"pk_value":pk_value, "trainer_img":trainer_img, "table_name": "trainer","action":action}]
    console.log(trainerJson);
    if (action == 'insert') {
        postJson(trainerJson);
        $scope.dangerAlert=false;
        $scope.successAlert=true;
        $scope.successEditAlert=false;
    } else {
        postEditJson(trainerJson);
        $scope.successEditAlert=true;
    }
   
} 
// $scope.function_addTrainer = function(trainer_name, trainer_surname, trainer_experience, trainer_program, trainer_img, pk_value, action){
//     var find = 0;
//     angular.forEach($scope.trainer, function(value,keys){
//         if ($scope.trainer[keys].trainer_name == trainer_name &&
//             $scope.trainer[keys].trainer_surname == trainer_surname) {
//                 find = 1;
//                 $scope.infoAlert=true;
//                 console.log($scope.trainer[keys].trainer_name+" "+$scope.trainer[keys].trainer_surname);
//             }
//     });

//     if (find==0) {
//     var trainerJson = [{"trainer_name": trainer_name, "trainer_surname": trainer_surname, "trainer_experience": trainer_experience, "trainer_program": trainer_program, "trainer_img":trainer_img, "table_name": "trainer","action":action}]
//         console.log(trainerJson);
//         postJson(trainerJson);
//         $scope.dangerAlert=false;
//         $scope.successAlert=true;
//         $scope.infoAlert=false;
// } else {
//     var trainerJson = [{"trainer_name": trainer_name, "trainer_surname": trainer_surname, "trainer_experience": trainer_experience, "trainer_program": trainer_program, "trainer_img":trainer_img, "pk_value":pk_value, "table_name": "trainer","action":action}]
//     console.log(trainerJson);
//     postEditJson(trainerJson);
// }
// $scope.successAlert=true;
// $scope.infoAlert=false;
// }
$scope.function_addOrder = function(product_id, member_id, payment_status, pk_value, action) {
    var orderJson = [{"product_id": product_id, "member_id": member_id, "payment_status": payment_status, "pk_value": pk_value,"table_name":"orders", "action":action}]
    console.log(orderJson);
    if (action == 'insert') {
        postJson(orderJson);
        $scope.successAlert=true;
    } else {
        console.log(orderJson);
        postEditJson(orderJson);
    }
    $scope.dangerAlert=false;
    $scope.successAlert=true;
}

$scope.function_error=function(){
    $scope.successAlert=false;
    $scope.dangerAlert=true;
    $scope.infoAlert=false;
    console.log("error");
}
$scope.function_getId = function (pk_value) {
    $scope.getId=pk_value;
    $scope.infoAlert = false;
    console.log("GET ID" + pk_value)
}

$scope.function_details_member = function(member_name,member_surname,member_email,member_phonenumber,member_hometown, pk_value, action) {
   var memberiJson = [{"member_name":member_name, "member_surname":member_surname, "member_email":member_email, "member_phonenumber":member_phonenumber,"member_hometown":member_hometown, "pk_value":pk_value, "table_name":"member", "action":action}]
    console.log(memberiJson);
    if (action=='insert') {
       postJson(memberiJson);
       $scope.dangerAlert=false;
       $scope.successAlert=true;
       $scope.successEditAlert=false;
    } else {
       postEditJson(memberiJson);
       $scope.successEditAlert=true;
    }
    
   
}

$scope.function_addTrenerSup = function(trainer_id,supplement_id, pk_value, action) {
    var tresupJson = [{"trainer_id":trainer_id, "supplement_id":supplement_id, "pk_value":pk_value, "table_name":"trainer_supplement", "action":action }]
    console.log(tresupJson);
    if (action=='insert') {
        postJson(tresupJson);
        $scope.dangerAlert=false;
        $scope.successAlert=true;
        $scope.successEditAlert=false;
    } else {
        postEditJson(tresupJson);
        $scope.successEditAlert=true;
    }
  
}


$scope.function_details_slider = function(slider_img) {
    var sliderJson = [{"slider_img":slider_img, "table_name":"slider"}]
    console.log(sliderJson);
    
        postJson(sliderJson);
        $scope.dangerAlert=false;
        $scope.successAlert=true;
        }



});