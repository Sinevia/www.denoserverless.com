<?php

/**
 * This is project's console commands configuration for Robo task runner.
 *
 * @see http://robo.li/
 */
class RoboFile extends \Robo\Tasks
{
    private $host = 'localhost';
    private $port = '32680';

    /**
     * Build
     */
    function build()
    {
        $this->taskExec('libreoffice')
            ->option('headless')
            ->option('invisible')
            ->option('convert-to', 'csv')
            ->option('outdir', __DIR__ . '/data')
            ->arg(__DIR__ . '/data/resources.ods')
            ->run();
        $this->taskExec('vendor/bin/jigsaw')->arg('build')->run();
    }

    /**
     * Deploy
     */
    function deploy()
    {
        $this->_cleanDir([__DIR__ . '/docs']);
        $this->_copyDir(__DIR__ . '/build_local', __DIR__ . '/docs');

        $this->taskExec('git add .; git commit -m "Updates"; git push origin master;')->run();
    }

    /**
     * Serve
     */
    function serve()
    {
        $url = $this->host . ':' . $this->port;

        if (self::isWindows()) {
            $isSuccessful = $this->taskExec('start')
                ->arg('firefox')
                ->arg($url)
                ->run();
        }
        if (self::isWindows() == false) {
            $isSuccessful = $this->taskExec('firefox')
                ->arg($url)
                ->run();
        }
        $this->taskExec('vendor/bin/jigsaw')
            ->arg('serve')
            ->option('port', $this->port)
            ->run();
    }

    /**
     * Watch
     */
    function watch()
    {
        $this->taskWatch()
            ->monitor(
                'composer.json',
                function () {
                    $this->taskComposerUpdate()->run();
                }
            )->monitor(
                'source',
                function () {
                    $this->build();
                },
                \Lurker\Event\FilesystemEvent::ALL
            )->monitor(
                'data/resources.ods',
                function () {
                    $this->build();
                },
                \Lurker\Event\FilesystemEvent::ALL
            )->run();
    }

    /**
     * Is it Windows OS?
     */
    private static function isWindows()
    {
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            return true;
        }
        return false;
    }
}
