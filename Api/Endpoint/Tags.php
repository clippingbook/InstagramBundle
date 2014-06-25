<?php
/*
 * This file is part of the Eko\InstagramBundle Symfony bundle.
 *
 * (c) Vincent Composieux <vincent.composieux@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eko\InstagramBundle\Api\Endpoint;

use Eko\InstagramBundle\Api\Endpoint\Endpoint;

/**
 * Tags
 *
 * This class is used to interact with Tags endpoint of Instagram API
 *
 * @author Vincent Composieux <vincent.composieux@gmail.com>
 * @modifiedBy Carlos Romero <hola@carlosromero.eu>
 */
class Tags extends Endpoint
{
    /**
     * Returns basic information about a specific tag
     *
     * @api /v1/tags/{id}
     *
     * @return \stdClass
     */
    public function getTag()
    {
        $url = '/v1/tags/'. $this->application->getAccount()->getId();

        return $this->executeRequest('get', $url);
    }

    /**
     * Returns tag most recent medias
     *
     * @api /v1/tags/{id}/media/recent
     *
     * @param int   $identifier tag identifier
     * @param array $options    Optionals parameters options
     *
     * Additionally, you can add the following options:
     * - count:         Count of media to return
     * - max_timestamp: Return media before this UNIX timestamp
     * - min_timestamp: Return media after this UNIX timestamp
     * - min_id:        Return media later than this min_id
     * - max_id:        Return media earlier than this max_id
     *
     * @return \stdClass
     */
    public function getRecentMedias($identifier, array $options = array())
    {
        $identifier =  $identifier;
        $url = '/v1/tags/'. $identifier .'/media/recent';

        return $this->executeRequest('get', $url, $options);
    }


    /**
     * Returns a search for a tag by name
     *
     * @api /v1/tags/search
     *
     * @param string $query   Name to search
     * @param array  $options Optionals parameters options
     *
     * Additionally, you can add the following options:
     * - count: Number of tags to return
     *
     * @return \stdClass
     */
    public function getSearch($query, array $options = array())
    {
        $url = '/v1/tags/search';

        $options['q'] = $query;

        return $this->executeRequest('get', $url, $options);
    }
}
