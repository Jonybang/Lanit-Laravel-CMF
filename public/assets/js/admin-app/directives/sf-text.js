angular
    .module('app')
    .directive('sfText', ['$timeout', 'AppPaths', function($timeout, AppPaths) {
        return {
            restrict: 'E',
            templateUrl: AppPaths.app + 'directives/sf-text.html',
            scope: {
                /* SubFieldValues resource */
                ngModel: '=',
                pageResource: '=?',
                templateResource: '=?'
            },
            link: function (scope, element) {

            }
        };
    }]);