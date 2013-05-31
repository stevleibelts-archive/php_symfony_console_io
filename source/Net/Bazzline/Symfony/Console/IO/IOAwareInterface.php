<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-05-31
 */

namespace Net\Bazzline\Symfony\Console\IO;

/**
 * Class IOAwareInterface
 *
 * @package Net\Bazzline\Symfony\Console\IO
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-05-31
 */
interface IOAwareInterface
{
    /**
     * @return IOInterface
     * @throws RuntimeException
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-31
     */
    public function getIO();

    /**
     * @param IOInterface $io
     *
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-31
     */
    public function setIO(IOInterface $io);
}