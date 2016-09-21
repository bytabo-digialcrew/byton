var myApp = angular.module('app',[]);



myApp.controller('kontaktCtrl', ['$scope', '$http', function($scope, $http) {



    $scope.inputName = "";
    $scope.inputMail = "";
    $scope.inputText = "";


    var isset = false;
    var sent = false;




    $scope.setState = function() {
        isset = true;
        $scope.setBtnClass();
    }



    $scope.getNameClass = function() {
        if(!isset) {
            return "";
        }
        if($scope.inputName.length < 3) {
            return "error";
        }
        else {
            return "success";
        }
    }
    $scope.getMailClass = function() {
        if(!isset) {
            return "";
        }
        var re = /\S+@\S+\.\S+/;
        if(!re.test($scope.inputMail)) {
            return "error";
        }
        else {
            return "success";
        }
    }


    $scope.getTextClass = function() {
        if(!isset) {
            return "";
        }
        return "success";
    }




    $scope.setBtnClass = function() {

        if(!isset || sent) {
            return "disabled";
        }

        if(
            $scope.getNameClass() == "success" &&
            $scope.getMailClass() == "success" &&
            $scope.getTextClass() == "success"

        ) {
            return "";
        }
        else {
            return "disabled";
        }
    }


    $scope.send = function() {

        sent = true;



        var responsePromise = $http.post("/assets/ajax/reservation-mail.php", {
            name:$scope.inputName,
            mail:$scope.inputMail,
            text:$scope.inputText
        });


        var successText;

        responsePromise.success(function(data) {
            if(data) {
                successText = 'Vielen Dank fÃ¼r Ihr Interesse! <br>Ihre Anfrage wird schnellstmÃ¶glich bearbeitet. ';
            }
            else {
                successText = 'Etwas ist schief gelaufen... <br>Bitte versuche Sie es nocheinmal oder rufen Sie uns an!';
            }
        });
        responsePromise.error(function() {
            successText = 'Etwas ist schief gelaufen... <br>Bitte versuche Sie es nocheinmal oder rufen Sie uns an!';
        });
        responsePromise.then(function() {

            $('#insert p').html(successText);
            $('#insert').show();

        });
        //$("html, body").delay(800).animate({ scrollTop: $('#insert').offset().top-150 }, 1000);
    }



}]);



$('#send').click(function(e) {
    $('#insert').show();
    e.preventDefault(); // same thing as above
    $("body").delay(800).animate({ scrollTop: $('#insert').offset().top-150 }, 1000);

    return false; // prevent default click action from happening!
});