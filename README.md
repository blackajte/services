# Common Bundle for all Services needed

Bundle comprenant tous les Services basiques dont nous pourrions avoir besoin


## Install

```
    "repositories": [
        {
            "type": "git",
            "url": "blackajte@bitbucket.org:blackajte/services.git"
        }
    ],
    ............
        "blackajte/services": "^1.*"
```

Create blackajte_services.yaml in src/config/packages
with services informations needed
ex : 
```
blackajte_services:
    default:
        pagination: 25
      
    status:
        DEFAULT:
            STATUS_NEW: 0
            STATUS_OFFLINE: 2
            STATUS_ONLINE: 5
            STATUS_DELETE: 9
            STATUS_USERDELETE: 10
        ACCOUNT:
            STATUS_NEW: 0
            STATUS_OFFLINE: 2
            STATUS_ONLINE: 5
            STATUS_NOTCONTROLED: 6
            STATUS_TWOMONTHNOTCONNECTED: 7
            STATUS_THREEMONTHNOTCONNECTED: 8
            STATUS_DELETE: 9
            STATUS_USERDELETE: 10
            STATUS_EMAILERROR: 11
```
and we have service StatusService for use this configuration

in construct or in controller path, use this default status
    DefaultStatusServiceInterface $statusService
    
    $statusAvailable = $statusService->getAvailableStatus();

or use this account status
    AccountStatusServiceInterface $statusService

    $statusAvailable = $statusService->getAvailableStatus();
    

## Test Unitaires et fonctionnel
	Lancer 

	./phpunit

## TODO
