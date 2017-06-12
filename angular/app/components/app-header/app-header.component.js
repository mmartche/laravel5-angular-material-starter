class AppHeaderController{
    constructor($sce){
        'ngInject';

        this.$sce = $sce;
    }

    $onInit(){
        //defer iframe loading
        let url = 'https://ghbtns.com/github-btn.html?user=mmartche&type=follow&count=true&size=small';
        this.githubWidget = this.$sce.trustAsResourceUrl(url);
    }
}

export const AppHeaderComponent = {
    templateUrl: './views/app/components/app-header/app-header.component.html',
    controller: AppHeaderController,
    controllerAs: 'vm',
    bindings: {}
}
