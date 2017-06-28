class CreateBaseFormController{
    constructor(API, ToastService, $state){
        'ngInject';
      
        this.API = API;
        this.ToastService = ToastService;
        this.$state = $state;
    }
  
   submit(){
      var data = {
        base_name : this.base_name,
        base_sender : this.base_sender,
        base_content : this.base_content,
        base_periodicity : this.base_periodicity,
        base_nameExternalKey : this.base_nameExternalKey,
        base_nameBase : this.base_nameBase,
        base_nameSubBase : this.base_nameSubBase,
        base_nameOrigin : this.base_nameOrigin,
        base_status : this.base_status,
        base_country : this.base_country,
        base_id_user : this.base_id_user
      };
      
       this.API.all('bases').post(data).then(() => {
          this.ToastService.show('Base deu bom');
          this.$state.go('app.all_bases');
       }, (error) =>{
        this.ToastService.show('Base deu ruim');
       });
    }
}

export const CreateBaseFormComponent = {
    templateUrl: './views/app/components/create-base-form/create-base-form.component.html',
    controller: CreateBaseFormController,
    controllerAs: 'vm',
    bindings: {}
}