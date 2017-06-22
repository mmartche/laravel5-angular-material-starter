class CreateBaseFormController{
    constructor(API, ToastService){
        'ngInject';
      
        this.API = API;
        this.ToastService = ToastService;
    }
  
   submit(){
      var data = {
        name: this.name,
        topic: this.topic
      };
      
       this.API.all('bases').post(data).then(() => {
         this.ToastService.show('Base deu bom');
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