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
            base_name : this.bases[0].base_name,
            base_sender : this.bases[0].base_sender,
            base_content : this.bases[0].base_content,
            base_periodicity : this.bases[0].base_periodicity,
            base_nameExternalKey : this.bases[0].base_nameExternalKey,
            base_nameBase : this.bases[0].base_nameBase,
            base_nameSubBase : this.bases[0].base_nameSubBase,
            base_nameOrigin : this.bases[0].base_nameOrigin,
            base_status : this.bases[0].base_status,
            base_country : this.bases[0].base_country,
            base_id_user : this.bases[0].base_id_user
        };

        this.API.all('bases').post(data).then(() => {
            this.ToastService.show('Base deu bom');
            this.$state.go('app.all_bases');
        }, () =>{
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
