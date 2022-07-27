<?php


namespace Fromthink\Flysystem\Upyun;

use League\Flysystem\FilesystemAdapter;
use League\Flysystem\PathNormalizer;

class Filesystem extends \League\Flysystem\Filesystem
{
    protected $adapter;
    public function __construct(
        FilesystemAdapter $adapter,
        array $config = [],
        PathNormalizer $pathNormalizer = null
    ) {
        parent::__construct($adapter, $config, $pathNormalizer);
        $this->adapter = $adapter;
    }

    public function url($path)
    {
        $adapter = $this->adapter;

        if (method_exists($adapter, 'getUrl')) {
            return $adapter->getUrl($path);
        }
    }
}