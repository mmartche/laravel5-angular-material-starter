import {DetailsBasesComponent} from './app/components/details-bases/details-bases.component';
import {AllBasesComponent} from './app/components/all-bases/all-bases.component';
import {CreateBaseFormComponent} from './app/components/create-base-form/create-base-form.component';
import {UiModalComponent} from './app/components/ui-modal/ui-modal.component';
import {UiComponentsComponent} from './app/components/ui-components/ui-components.component';
import {AllPostsComponent} from './app/components/all-posts/all-posts.component';
import {CreatePostFormComponent} from './app/components/create_post_form/create_post_form.component';
import {AppHeaderComponent} from './app/components/app-header/app-header.component';
import {AppViewComponent} from './app/components/app-view/app-view.component';
import {AppShellComponent} from './app/components/app-shell/app-shell.component';
import {ResetPasswordComponent} from './app/components/reset-password/reset-password.component';
import {ForgotPasswordComponent} from './app/components/forgot-password/forgot-password.component';
import {LoginFormComponent} from './app/components/login-form/login-form.component';
import {RegisterFormComponent} from './app/components/register-form/register-form.component';

angular.module('app.components')
	.component('detailsBases', DetailsBasesComponent)
	.component('allBases', AllBasesComponent)
	.component('createBaseForm', CreateBaseFormComponent)
	.component('uiModal', UiModalComponent)
	.component('uiComponents', UiComponentsComponent)
	.component('allPosts', AllPostsComponent)
	.component('createPostForm', CreatePostFormComponent)
	.component('appHeader', AppHeaderComponent)
	.component('appView', AppViewComponent)
	.component('appShell', AppShellComponent)
	.component('resetPassword', ResetPasswordComponent)
	.component('forgotPassword', ForgotPasswordComponent)
	.component('loginForm', LoginFormComponent)
	.component('registerForm', RegisterFormComponent);

