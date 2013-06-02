<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-01 
 */

namespace Net\Bazzline\Symfony\Console\IO;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Helper\HelperSet;

/**
 * Class ConsoleIOFactory
 *
 * @package Net\Bazzline\Symfony\Console\IO
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-01
 */
class ConsoleIOFactory
{
    /**
     * @var \Symfony\Component\Console\Helper\HelperSet
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-01
     */
    public $helperSet;

    /**
     * @var \Symfony\Component\Console\Input\InputInterface
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-01
     */
    public $input;

    /**
     * @var \Symfony\Component\Console\Output\OutputInterface
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-01
     */
    public $output;

    /**
     * Creates factory
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @param HelperSet $helperSet
     * @return ConsoleIOFactory
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-01
     */
    public static function buildDefault(InputInterface $input, OutputInterface $output, HelperSet $helperSet)
    {
        $factory = new self();

        $factory->setHelperSet($helperSet);
        $factory->setInput($input);
        $factory->setOutput($output);

        return $factory;
    }

    /**
     * @param \Symfony\Component\Console\Helper\HelperSet $helperSet
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-02
     */
    public function setHelperSet($helperSet)
    {
        $this->helperSet = $helperSet;
    }

    /**
     * @return \Symfony\Component\Console\Helper\HelperSet
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-02
     */
    public function getHelperSet()
    {
        return $this->helperSet;
    }

    /**
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-02
     */
    public function setInput($input)
    {
        $this->input = $input;
    }

    /**
     * @return \Symfony\Component\Console\Input\InputInterface
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-02
     */
    public function getInput()
    {
        return $this->input;
    }

    /**
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-02
     */
    public function setOutput($output)
    {
        $this->output = $output;
    }

    /**
     * @return \Symfony\Component\Console\Output\OutputInterface
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-02
     */
    public function getOutput()
    {
        return $this->output;
    }

    /**
     * @return ConsoleIO
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-02
     */
    public function get()
    {
        return new ConsoleIO($this->input, $this->output, $this->helperSet);
    }
}