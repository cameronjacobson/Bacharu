'use strict';

var BacharuApp = angular.module('BacharuApp', [])
  .config(['$routeProvider','$locationProvider', function($routeProvider,$locationProvider) {
    $routeProvider
      .when('/',               { templateUrl: 'views/main.html',           controller: 'MainCtrl' })
      .when('/acmpolicy',      { templateUrl: 'views/acmpolicy.html',      controller: 'ACMPolicyCtrl' })
      .when('/console',        { templateUrl: 'views/console.html',        controller: 'ConsoleCtrl' })
      .when('/crashdump',      { templateUrl: 'views/crashdump.html',      controller: 'CrashDumpCtrl' })
      .when('/debug',          { templateUrl: 'views/debug.html',          controller: 'DebugCtrl' })
      .when('/dpci',           { templateUrl: 'views/dpci.html',           controller: 'DPCICtrl' })
      .when('/event',          { templateUrl: 'views/event.html',          controller: 'EventCtrl' })
      .when('/host',           { templateUrl: 'views/host.html',           controller: 'HostCtrl' })
      .when('/hostcpu',        { templateUrl: 'views/hostcpu.html',        controller: 'HostCpuCtrl' })
      .when('/hostmetrics',    { templateUrl: 'views/hostmetrics.html',    controller: 'HostMetricsCtrl' })
      .when('/network',        { templateUrl: 'views/network.html',        controller: 'NetworkCtrl' })
      .when('/pbd',            { templateUrl: 'views/pbd.html',            controller: 'PBDCtrl' })
      .when('/pif',            { templateUrl: 'views/pif.html',            controller: 'PIFCtrl' })
      .when('/pifmetrics',     { templateUrl: 'views/pifmetrics.html',     controller: 'PIFMetricsCtrl' })
      .when('/ppci',           { templateUrl: 'views/ppci.html',           controller: 'PPCICtrl' })
      .when('/sr',             { templateUrl: 'views/sr.html',             controller: 'SRCtrl' })
      .when('/task',           { templateUrl: 'views/task.html',           controller: 'TaskCtrl' })
      .when('/user',           { templateUrl: 'views/user.html',           controller: 'UserCtrl' })
      .when('/vbd',            { templateUrl: 'views/vbd.html',            controller: 'VBDCtrl' })
      .when('/vbdmetrics',     { templateUrl: 'views/vbdmetrics.html',     controller: 'VBDMetricsCtrl' })
      .when('/vdi',            { templateUrl: 'views/vdi.html',            controller: 'VDICtrl' })
      .when('/vif',            { templateUrl: 'views/vif.html',            controller: 'VIFCtrl' })
      .when('/vifmetrics',     { templateUrl: 'views/vifmetrics.html',     controller: 'VIFMetricsCtrl' })
      .when('/vm',             { templateUrl: 'views/vm.html',             controller: 'VMCtrl' })
      .when('/vmguestmetrics', { templateUrl: 'views/vmguestmetrics.html', controller: 'VMGuestMetricsCtrl' })
      .when('/vmmetrics',      { templateUrl: 'views/vmmetrics.html',      controller: 'VMMetricsCtrl' })
      .when('/vtpm',           { templateUrl: 'views/vtpm.html',           controller: 'VTPMCtrl' })
      .when('/xspolicy',       { templateUrl: 'views/xspolicy.html',       controller: 'XSPolicyCtrl' })
      .otherwise({
        redirectTo: '/'
      });
      $locationProvider.html5Mode(true).hashPrefix('!');
  }]);
