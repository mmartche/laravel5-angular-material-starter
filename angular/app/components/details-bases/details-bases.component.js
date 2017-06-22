class DetailsBasesController{
    constructor(API, ToastService, $state){
        'ngInject';

        this.API = API;
        this.ToastService = ToastService;
        this.$state = $state;
        // this.base_id_date = base_id;
        //
    }

    $onInit(){

        let base_id = this.$state.params.base_id;
        this.API.all('bases').get('coleta',{base_id}).then((response) => {
            this.bases = response.data.bases;
        })
        this.base = base_id;
    }
    submit(){
        this.$state.go('app.landing');
    }
}

export const DetailsBasesComponent = {
    templateUrl: './views/app/components/details-bases/details-bases.component.html',
    controller: DetailsBasesController,
    controllerAs: 'vm',
    bindings: {}
}
