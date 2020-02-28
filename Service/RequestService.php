<?php
/**
 * This file is part of the Blackajte\ServicesBundle\Service\ package.
 *
 * (c) Arsenyk
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Blackajte\ServicesBundle\Service;

use Symfony\Component\HttpFoundation\Request;
use Blackajte\ServicesBundle\Service\Interfaces\RequestServiceInterface;

/**
 * RequestService
 *
 * @author Arsenyk <Arsenyk@owczarz.fr>
 */
class RequestService implements RequestServiceInterface
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * @var array
     */
    protected $data;

    /**
     * @var integer
     */
    protected $pagination;

    /**
     * @param int $pagination
     */
    public function __construct(int $pagination = 50)
    {
        $this->data = array();
        $this->pagination = $pagination;
    }

    /**
     * @return self
     */
    protected function prepareRequest()
    {
        $this->data['user_type'] = $this->request->get('user_type', null);
        $this->data['search'] = $this->request->get('search', null);
        $this->data['date'] = $this->request->get('date', '');
        $this->data['sort'] = $this->request->get('sort', 'id');
        $this->data['sortType'] = $this->request->get('sortType', "desc");
        $this->data['from'] = $this->request->get('from', 0);
        $this->data['size'] = $this->request->get('size', $this->pagination);
        $this->data['q'] = $this->request->get('q', null);
        if ($this->request->request->get('data')) {
            $tmpData = json_decode($this->request->request->get('data'), true);
            $this->data = array_merge($this->data, $tmpData);
        }
        return $this;
    }

    /**
     * @param Request $request
     * @return array
     */
    public function getRequestData(Request $request) :? array
    {
        $this->request = $request;
        $this->prepareRequest();
        return $this->data;
    }
}
