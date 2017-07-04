class ForgotPasswordController {
    constructor(API, ToastService, $state) {
        'ngInject';

        this.API = API;
        this.$state = $state;
        this.ToastService = ToastService;
    }

    $onInit(){
        this.email = '';
    }

    submit() {
        this.API.all('auth/password/email').post({
            email: this.email
        }).then(() => {
            this.ToastService.show(`Por favor, verifique seu e-mail para instruções de como definir sua senha`);
            this.$state.go('app.landing');
        });
    }
}

export const ForgotPasswordComponent = {
    templateUrl: './views/app/components/forgot-password/forgot-password.component.html',
    controller: ForgotPasswordController,
    controllerAs: 'vm',
    bindings: {}
}
