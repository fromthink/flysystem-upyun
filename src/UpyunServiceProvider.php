<?php

namespace Fromthink\Flysystem\Upyun;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;

class UpyunServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
//        $factory = $this->app->make('filesystem');
//        /* @var FilesystemManager $factory */
//        $factory->extend('upyun', function ($app, $config) {
//            $adapter = new UpyunAdapter(
//                $config['bucket'], $config['operator'],
//                $config['password'],$config['domain'],$config['protocol']
//            );
//
//            $filesystem = new Filesystem($adapter);
//
////            $filesystem->addPlugin(new ImagePreviewUrl());
//
//            return $filesystem;
//        });



        Storage::extend('upyun', function ($app, $config) {
            $adapter = new UpyunAdapter(
                $config['bucket'], $config['operator'],
                $config['password'],$config['domain'],$config['protocol']
            );

            $filesystem = new Filesystem($adapter);

//            $filesystem->addPlugin(new ImagePreviewUrl());

            return $filesystem;
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
