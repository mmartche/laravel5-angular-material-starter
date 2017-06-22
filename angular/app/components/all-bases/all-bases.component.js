class AllBasesController{
    constructor(API){
        'ngInject';

        this.API = API;
        //
    }

    $onInit(){
        this.API.all('bases').get('').then((response) => {
            this.bases = response.data.bases;
        })
    }
}

export const AllBasesComponent = {
    templateUrl: './views/app/components/all-bases/all-bases.component.html',
    controller: AllBasesController,
    controllerAs: 'vm',
    bindings: {}
}
