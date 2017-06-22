class UiModalController{
    constructor(){
        'ngInject';
        this.singleModel = 1;

        this.radioModel = 'Middle';

        this.checkModel = {
          left: false,
          middle: true,
          right: false
        };
        this.checkResults = [];
    }

  watchCollection() {
    this.checkResults = [];
    angular.forEach(this.checkModel, function (value, key) {
      if (value) {
        this.checkResults.push(key);
      }
    });
  }


}

export const UiModalComponent = {
    templateUrl: './views/app/components/ui-modal/ui-modal.component.html',
    controller: UiModalController,
    controllerAs: 'vm',
    bindings: {}
}



