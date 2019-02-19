<?php
namespace Taniapets\DarkSky\Requests;


Class AbstractRequest
{
    protected $lat;
    protected $long;
    protected $options = ['query' => []];

    protected $path = 'forecast';

    public function attachKey($apiKey)
    {
        $this->path .= '/' . $apiKey;
        return $this;
    }

    public function attachPrefs($prefs)
    {
        $this->queryAttach($prefs);
        return $this;
    }

    public function attachExclude(array $exclude)
    {
        if (count($exclude)) {
            $this->queryAttach(['exclude' => implode(',', $exclude)]);
        }
        return $this;
    }

    public function getOptions()
    {
        return $this->options;
    }

    protected function queryAttach($queryParams)
    {
        $this->options['query'] = array_merge($this->options['query'], $queryParams);
    }
}
