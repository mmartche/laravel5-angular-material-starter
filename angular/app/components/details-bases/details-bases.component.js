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
            this.bases.base_id = response.data.bases.id;
        })
    }
    submit(){
        var data = {
            base_id: this.bases[0].id,
            id: this.bases[0].id,
            name: this.bases[0].name,
            topic: this.bases[0].topic
        };

        this.API.all('bases').post(data).then(() => {
            this.ToastService.show('Base deu bom');
            this.$state.go('app.create_base');
        }, (error) =>{
            this.ToastService.show('Base deu ruim');
        });
    }
}

export const DetailsBasesComponent = {
    templateUrl: './views/app/components/details-bases/details-bases.component.html',
    controller: DetailsBasesController,
    controllerAs: 'vm',
    bindings: {}
}
