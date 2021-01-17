app.config(function($routeProvider){
    $routeProvider
    .when("/addcategories", {
        templateUrl : "view/addcategories.html",
        controller : "myCtrl"
    })
    .when("/categories", {
        templateUrl : "view/categories.html",
        controller: "myCtrl"
    })
    .when("/addcategories/:id", {
        templateUrl : "view/addcategories.html",
        controller : "myCtrl"
    })
    .when("/addorders", {
        templateUrl : "view/addorders.html",
        controller: "myCtrl"
    })
    .when("/addorders/:id", {
        templateUrl : "view/addorders.html",
        controller: "myCtrl"
    })
    .when("/orders", {
        templateUrl : "view/orders.html",
        controller:"myCtrl"
    })
    .when("/programs", {
        templateUrl : "view/programs.html",
        controller:"myCtrl"
    })
    .when("/addprograms", {
        templateUrl : "view/addprograms.html",
        controller:"myCtrl"
    })
    .when("/addprograms/:id", {
        templateUrl : "view/addprograms.html",
        controller:"myCtrl"
    })
    .when("/programstype", {
        templateUrl: "view/programstype.html",
        controller:"myCtrl"
    })
    .when("/addprogramstype", {
        templateUrl: "view/addprogramstype.html",
        controller:"myCtrl"
    })
    .when("/submenu", {
        templateUrl:"view/submenu.html",
        controller:"myCtrl"
    })
    .when("/addsubmenu", {
        templateUrl:"view/addsubmenu.html",
        controller:"myCtrl"
    })
    .when("/addsubmenu/:id", {
        templateUrl:"view/addsubmenu.html",
        controller:"myCtrl"
    })
    .when("/supplements", {
        templateUrl:"view/supplements.html",
        controller:"myCtrl"
    })
    .when("/addsupplements", {
        templateUrl:"view/addsupplements.html",
        controller:"myCtrl"
    })
    .when("/addsupplements/:id", {
        templateUrl:"view/addsupplements.html",
        controller:"myCtrl"
    })
    .when("/addtrainer", {
        templateUrl:"view/addtrainer.html",
        controller:"myCtrl"
    })
    .when("/addtrainer/:id", {
        templateUrl:"view/addtrainer.html",
        controller:"myCtrl"
    })
    .when("/trainer", {
        templateUrl:"view/trainer.html",
        controller:"myCtrl"
    })
    .when("/addtrainersupplement", {
        templateUrl:"view/addtrainersupplement.html",
        controller:"myCtrl"
    })
    .when("/addtrainersupplement/:id", {
        templateUrl:"view/addtrainersupplement.html",
        controller:"myCtrl"
    })
    .when("/trainersupplement", {
        templateUrl:"view/trainersupplement.html",
        controller:"myCtrl"
    })
    .when("/details_member", {
        templateUrl:"view/details_member.html",
        controller:"myCtrl"
    })
    .when("/details_member/:id", {
        templateUrl:"view/details_member.html",
        controller:"myCtrl"
    })
    .when("/memberi", {
        templateUrl:"view/memberi.html",
        controller:"myCtrl"
    })
    .when("/slider", {
        templateUrl : "view/slider.html",
        controller : "myCtrl"
      })
    .when("/main", {
        templateUrl : "view/main.html",
        controller : "myCtrl"
      })
      .otherwise("/main", {
        templateUrl : "view/main.html",
        controller : "myCtrl"
      });
});