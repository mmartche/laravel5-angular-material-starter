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
        this.API.all('channels').get('').then((response) => {
            this.channels = response.data.channels;
        });
        this.API.all('basePerChannel').get('coleta',{base_id}).then((response) => {
            this.myChannels = response.data.basePerChannel;
            // this.channels.channel_id = response.data.channels.id;
        });
    }
    submit(){
        var channel_id_use = this.channel_id;
        function findChannel(channel_use) {
            return channel_use.id === Number(channel_id_use);
        }
        var channel_find = this.channels.find(findChannel);
        this.channel_name = channel_find.channel_name;
        var data = {
            base_id : this.$state.params.base_id,
            channel_id : this.channel_id,
            channel_name: this.channel_name,
        };
        this.API.all('basePerChannel').post(data).then(() => {
            this.ToastService.show('Canal deu bom');
            this.myChannels.unshift(data);
            // this.$state.go('app.all_bases');
        }, (error) =>{
            this.ToastService.show('Canal deu ruim');
        });
    }
}

export const FormAddChannelComponent = {
    templateUrl: './views/app/components/form-add-channel/form-add-channel.component.html',
    controller: FormAddChannelController,
    controllerAs: 'vm',
    bindings: {}
}