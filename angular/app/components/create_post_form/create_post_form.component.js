class CreatePostFormController{
    constructor(API, ToastService){
        'ngInject';
      
        this.API = API;
        this.ToastService = ToastService;

        this.name = '';
        this.url = '';
        this.content = '';
    }
  
   submit(){
      var data = {
        name: this.name,
        url: this.url,
        content: this.content,
      };
      
       this.API.all('posts').post(data).then((response) => {
            this.ToastService.show('Post added successfully');
            this.name = '';
            this.url = '';
            this.content = '';
       });
    }
}

export const CreatePostFormComponent = {
    templateUrl: './views/app/components/create_post_form/create_post_form.component.html',
    controller: CreatePostFormController,
    controllerAs: 'vm',
    bindings: {}
}