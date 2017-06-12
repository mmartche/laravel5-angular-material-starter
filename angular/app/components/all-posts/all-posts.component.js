class AllPostsController{
    constructor(API){
        'ngInject';

        this.API = API;
    }

    $onInit(){
        this.API.all('posts').get('').then((response) => {
            this.posts = response.data.posts;
        })
    }
}

export const AllPostsComponent = {
    templateUrl: './views/app/components/all-posts/all-posts.component.html',
    controller: AllPostsController,
    controllerAs: 'vm',
    bindings: {}
}
