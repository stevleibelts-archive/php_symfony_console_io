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

    /**
     * {@inheritDoc}
     */
    public function askWithMultipleAnswers($question)
    {
        // TODO: Implement askWithMultipleAnswers() method.
    }

    /**
     * {@inheritDoc}
     */
    public function askWithSuggestions($question, array $suggestions, $default = null)
    {
        // TODO: Implement askWithSuggestions() method.
    }

    /**
     * {@inheritDoc}
     */
    public function askChoice($question, array $options, $allowEmptyChoice = true, $default = null)
    {
        // TODO: Implement askChoice() method.
    }

    /**
     * {@inheritDoc}
     */
    public function getArgument($name)
    {
        return $this->input->getArgument($name);
    }

    /**
     * {@inheritDoc}
     */
    public function setArgument($name, $value)
    {
        $this->input->setArgument($name, $value);
    }

    /**
     * {@inheritDoc}
     */
    public function write($message, $numberOfNewLines = 1)
    {
        $this->output->write($message);
        $this->writeNewLine();
    }

    /**
     * {@inheritDoc}
     */
    public function writeComment($message, $numberOfNewLines = 1)
    {
        $this->write('<comment>' . (string) $message . '</comment>', $numberOfNewLines);
    }

    /**
     * {@inheritDoc}
     */
    public function writeError($message, $numberOfNewLines = 1)
    {
        $this->write('<error>' . (string) $message . '</error>', $numberOfNewLines);
    }

    /**
     * {@inheritDoc}
     */
    public function writeInfo($message, $numberOfNewLines = 1)
    {
        $this->write('<info>' . (string) $message . '</info>', $numberOfNewLines);
    }

    /**
     * {@inheritDoc}
     */
    public function writeNewLine($numberOfNewLines = 1)
    {
        for ($iterator = 0; $iterator < $numberOfNewLines; $iterator++) {
            $this->write('');
        }
    }

    /**
     * {@inheritDoc}
     */
    public function writeQuestion($question, $numberOfNewLines = 1)
    {
        $this->write('<question>' . (string) $question . '</question>', $numberOfNewLines);
    }
}