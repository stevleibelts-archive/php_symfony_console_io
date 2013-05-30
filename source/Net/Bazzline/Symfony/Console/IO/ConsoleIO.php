<?php
/**
 * A bad copycat of https://github.com/composer/composer/blob/master/src/Composer/IO/ConsoleIO.php
 *
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-05-30
 */

namespace Net\Bazzline\Symfony\Console\IO;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Helper\HelperSet;

/**
 * Class ConsoleIO
 *
 * @package Net\Bazzline\Symfony\Console\IO
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-05-30
 */
class ConsoleIO implements IOInterface
{
    /**
     * @var HelperSet
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-30
     */
    $helperSet;

    /**
     * @var OutputInterface
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-30
     */
    $input;

    /**
     * @var OutputInterface
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-30
     */
    $output;

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @param HelperSet $helperSet
     *
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-30
     */
    public function __construct(InputInterface $input, OutputInterface $output, HelperSet $helperSet)
    {
        $this->helperSet = $helperSet;
        $this->input = $input;
        $this->output = $output;
    }
}
