class FormAddChannelController{
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
            base_content : this.bases[0].base_content,
            base_status : this.bases[0].base_status,
            base_id_user : this.bases[0].base_id_user
        };

        this.API.all('bases').post(data).then(() => {
            this.ToastService.show('Base deu bom');
            this.$state.go('app.all_bases');
        }, (error) =>{
            this.ToastService.show('Base deu ruim');
        });
    }
}

export const FormAddChannelComponent = {
    templateUrl: './views/app/components/form-add-channel/form-add-channel.component.html',
    controller: FormAddChannelController,
    controllerAs: 'vm',
    bindings: {}
}