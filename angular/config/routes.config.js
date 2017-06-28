export function RoutesConfig($stateProvider, $urlRouterProvider) {
	'ngInject';

	let getView = (viewName) => {
		return `./views/app/pages/${viewName}/${viewName}.page.html`;
	};

	$urlRouterProvider.otherwise('/');

	$stateProvider
		.state('app', {
			abstract: true,
            data: {},//{auth: true} would require JWT auth
			views: {
				header: {
					templateUrl: getView('header')
				},
				footer: {
					templateUrl: getView('footer')
				},
				main: {}
			}
		})
		.state('app.landing', {
            url: '/',
            views: {
                'main@': {
                    templateUrl: getView('landing')
                }
            }
        })
        .state('app.login', {
			url: '/login',
			views: {
				'main@': {
					templateUrl: getView('login')
				}
			}
		})
        .state('app.register', {
            url: '/register',
            views: {
                'main@': {
                    templateUrl: getView('register')
                }
            }
        })
        .state('app.forgot_password', {
            url: '/forgot-password',
            views: {
                'main@': {
                    templateUrl: getView('forgot-password')
                }
            }
        })
        .state('app.reset_password', {
            url: '/reset-password/:email/:token',
            views: {
                'main@': {
                    templateUrl: getView('reset-password')
                }
            }
        })
        .state('app.create_post', {
            url: '/create-post',
            views: {
                'main@': {
                    templateUrl: getView('create_post')
                }
            }
       })
        .state('app.posts', {
            url: '/posts',
            views: {
                'main@': {
                    templateUrl: getView('posts')
                }
            }
       })
        .state('app.create_base', {
            url: '/bases/novo',
            views: {
                'main@': {
                    templateUrl: getView('create_base')
                }
            }
       })
        .state('app.details_base', {
            url: '/bases/:base_id',
            views: {
                'main@': {
                    templateUrl: getView('details_base')
                }
            }
       })
        .state('app.all_bases', {
            url: '/bases',
            views: {
                'main@': {
                    templateUrl: getView('all_bases')
                }
            }
       });
}
