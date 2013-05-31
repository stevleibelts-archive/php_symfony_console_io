<?php
/**
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
    private $helperSet;

    /**
     * @var OutputInterface
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-30
     */
    private $input;

    /**
     * @var OutputInterface
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-05-30
     */
    private $output;

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

    /**
     * {@inheritDoc}
     */
    public function ask($question, $default = null)
    {
        return $this
            ->helperSet
            ->get('dialog')
            ->ask($this->output, $question, $default);
    }

    /**
     * {@inheritDoc}
     */
    public function askConfirmation($question, $default = true)
    {
        return $this
            ->helperSet
            ->get('dialog')
            ->askConfirmation($this->output, $question, $default);
    }

    /**
     * {@inheritDoc}
     */
    public function askAndValidate($question, $validator, $attempts = false, $default = null)
    {
        return $this
            ->helperSet
            ->get('dialog')
            ->askAndValidate($this->output, $question, $validator, $attempts, $default);
    }
}
