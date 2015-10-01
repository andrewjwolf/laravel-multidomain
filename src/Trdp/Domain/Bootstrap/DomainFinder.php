<?php namespace Trdp\Domain\Bootstrap;

use Illuminate\Support\Facades\Config;
use \Request;

class DomainFinder
{
    private $domain;
    private $url;

    /**
     * @return mixed
     */
    public function bootstrap()
    {
        $this->url = parse_url(Request::url());
        $this->domain = $this->getDomain();
        return $this->domain['bootstrap'];
    }

    /**
     * @return array|null
     */
    public function getDomain()
    {
        if (isset($this->domain)) {
            return $this->domain;
        }
        foreach ($this->getDomains() as $domain) {
            if ($domain['serverName'] == $this->url['host']) {
                $this->domain = $domain;
                break;
            } elseif (isset($domain['aliases'])) {
                foreach ($domain['aliases'] as $alias) {
                    if ($alias == $this->url['host']) {
                        $this->domain = $domain;
                        break;
                    }
                }
            }
        }
        if (!isset($this->domain) && isset($this->getDomains()['default'])) {
            $this->domain = $this->getDomains()['default'];
        }

        return $this->domain;
    }


    /**
     * @return mixed
     */
    public function getDomains()
    {
        return Config::get('domains');
    }





}