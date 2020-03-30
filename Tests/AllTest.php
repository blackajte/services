<?php
/*
 * This file is part of the Arsenyk\Component\Tests\ package.
 *
 * (c) Arsenyk
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Blackajte\ServicesBundle\Tests;

use PHPUnit\Framework\TestCase as PHPUnit_Framework_TestCase;
use Exception;
use Blackajte\ServicesBundle\Service\RequestService;
use Blackajte\ServicesBundle\Service\DefaultStatusService;
use Blackajte\ServicesBundle\Service\AccountStatusService;
use Blackajte\ServicesBundle\Service\LoggerService;
use Symfony\Component\HttpFoundation\Request;
use Psr\Log\NullLogger;

class AllTest extends PHPUnit_Framework_TestCase
{
    public function testDefaultRequestService()
    {
        $model = new RequestService();
        $data = array(
            'user_type' => null,
            'search' => null,
            'date' => '',
            'sort' => 'id',
            'sortType' => 'desc',
            'from' => 0,
            'size' => 50,
            'q' => null
        );
        $request = new Request();
        
        $this->assertEquals($data, $model->getRequestData($request));
    }

    public function testRequestInitService()
    {
        $y = rand(0, 100);
        $model = new RequestService($y);
        $data = array(
            'user_type' => null,
            'search' => null,
            'date' => '',
            'sort' => 'id',
            'sortType' => 'desc',
            'from' => 0,
            'size' => $y,
            'q' => null
        );
        $request = new Request();
        
        $this->assertEquals($data, $model->getRequestData($request));
    }

    public function testRequestFormaterService()
    {
        $model = new RequestService();
        $request = new Request();
        $userType = "User Type";
        $search = "Search data";
        $date = "2020-02-24";
        $sort = "tititata";
        $sortType = "DESC";
        $from = 10;
        $size = 100;
        $query = "search request";
        $request->request->set('user_type', $userType);
        $request->request->set('search', $search);
        $request->request->set('date', $date);
        $request->request->set('sort', $sort);
        $request->request->set('sortType', $sortType);
        $request->request->set('from', $from);
        $request->request->set('size', $size);
        $request->request->set('q', $query);

        $data = array(
            'user_type' => $userType,
            'search' => $search,
            'date' => $date,
            'sort' => $sort,
            'sortType' => $sortType,
            'from' => $from,
            'size' => $size,
            'q' => $query
        );
        
        $this->assertEquals($data, $model->getRequestData($request));
    }

    public function testRequestJsonData()
    {
        $model = new RequestService();
        $request = new Request();
        $userType = "User Type";
        $search = "Search data";
        $date = "2020-02-24";
        $sort = "tititata";
        $sortType = "DESC";
        $from = 10;
        $size = 100;
        $query = "search request";
        $request->request->set('user_type', $userType);

        $newUserType = "New User Type";
        $data = array(
            'user_type' => $newUserType,
            'search' => $search,
            'date' => $date,
            'sort' => $sort,
            'sortType' => $sortType,
            'from' => $from,
            'size' => $size,
            'q' => $query
        );
        $request->request->set('data', json_encode($data));
        $this->assertEquals($data, $model->getRequestData($request));
    }

    public function testDefaultStatusService()
    {
        $model = new DefaultStatusService();
        $data = array(
            'STATUS_NEW' => DefaultStatusService::STATUS_NEW,
            'STATUS_OFFLINE' => DefaultStatusService::STATUS_OFFLINE,
            'STATUS_ONLINE' => DefaultStatusService::STATUS_ONLINE,
            'STATUS_DELETE' => DefaultStatusService::STATUS_DELETE
        );
        
        $this->assertEquals($data, $model->getAvailableStatus());
    }

    public function testDefaultStatusInitService()
    {
        $data = array(
            'STATUS_NEW' => 10,
            'STATUS_OFFLINE' => 20,
            'STATUS_ONLINE' => 30,
            'STATUS_ACTIVE' => 40,
            'STATUS_REMOVED' => 50,
            'STATUS_DELETE' => 90
        );
        $model = new DefaultStatusService($data);
        
        $this->assertEquals($data, $model->getAvailableStatus());
    }

    public function testAccountStatusService()
    {
        $model = new AccountStatusService();
        $data = array(
            'STATUS_NEW' => AccountStatusService::STATUS_NEW,
            'STATUS_OFFLINE' => AccountStatusService::STATUS_OFFLINE,
            'STATUS_ONLINE' => AccountStatusService::STATUS_ONLINE,
            'STATUS_DELETE' => AccountStatusService::STATUS_DELETE
        );
        
        $this->assertEquals($data, $model->getAvailableStatus());
    }

    public function testAccountStatusInitService()
    {
        $data = array(
            'STATUS_NEW' => 10,
            'STATUS_OFFLINE' => 20,
            'STATUS_ONLINE' => 30,
            'STATUS_ACTIVE' => 40,
            'STATUS_REMOVED' => 50,
            'STATUS_DELETE' => 90
        );
        $model = new AccountStatusService($data);
        
        $this->assertEquals($data, $model->getAvailableStatus());
    }

    public function testLoggerService()
    {
        $logger = new NullLogger();
        $loggerService = new LoggerService($logger, 'test');

        $this->assertEquals($logger, $loggerService->getLogger());

        $message = "test message";
        $type = 'error';
        $context = [];
        $this->assertEquals(
            $loggerService,
            $loggerService->log($message, $type, $context)
        );
    }
    
    public function testTypeMedia()
    {
        $media = $this->getMedia();
        $this->assertNull($media->getType());

        $randstring = substr(md5(rand()), 0, 7);

        $media->setType($randstring);
        $this->assertEquals($randstring, $media->getType());
    }
    /**
     * @return Media
     */
    protected function getMedia()
    {
        return $this->getMockForAbstractClass('Blackajte\ServicesBundle\Medias\Entity\Media');
    }
}
