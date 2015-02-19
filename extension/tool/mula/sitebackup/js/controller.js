define(["angular", "cookie-monster", "razor/services/rars", ], function(angular, monster)
{		
    angular.module("extension.tool.mula.sitebackup.controller", ["razor.services.rars"])
    
    .controller("main", ['$scope','rars', function($scope, rars)
    {
		$scope.download = {};
		$scope.success = false;
		$scope.isProcessing = false;
        $scope.send = function()
        {        		
			var mode="full";
            rars.get("file/backup", mode, monster.get("token"))
                .success(function(data)
                {
					$scope.download.link = data.backup;
					$scope.success = true;
					$scope.isProcessing = true;
                })
                .error(function(data, header) 
                {
					alert('Error:' +data);
					$scope.success = false;
					$scope.isProcessing = false;
                }
            );
        };       
    }]);
    


});