<div class="container" ng-controller="kontaktCtrl">

    <div id="insert" style="display: none">
        <div class="alert alert-success"><p></p></div>
        <hr class="invisible" />
    </div>


    <div class="row">
        <div class="col-md-6">
            <input type="text" class="form-control ng-pristine ng-untouched ng-valid" ng-change="setState()" ng-class="getNameClass()" placeholder="Ihr Name" ng-model="inputName"><br>
        </div>
        <div class="col-md-6">
            <input type="text" class="form-control ng-pristine ng-untouched ng-valid" ng-change="setState()" ng-class="getMailClass()" placeholder="Ihre Mailadresse" ng-model="inputMail"><br>
        </div>


    </div>
    <div class="row">
        <div class="col-md-12 text-right">
            <textarea class="form-control ng-pristine ng-untouched ng-valid" rows="9" ng-change="setState()" ng-class="getTextClass()" placeholder="Wünsche, Anregungen, Besonderes" ng-model="inputText"></textarea>
            <br>
            <p><small>* Der Abschicken-Button erscheint erst, wenn alle Felder korrekt ausgefüllt wurden. </small></p>
            <div href="#insert" class="btn btn-primary float-right disabled" ng-class="setBtnClass()" ng-click="send()" id="send">Abschicken</div>

        </div>
    </div>
</div>