require(["angular", "../../extension/tool/mula/sitebackup/js/controller"], function(angular)
{
    angular.module("extension.tool.mula.sitebackup", ["extension.tool.mula.sitebackup.controller"]);
    angular.bootstrap(document.querySelectorAll(".extension-tool-mula-sitebackup"), ["extension.tool.mula.sitebackup"]);
});