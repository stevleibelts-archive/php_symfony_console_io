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
            ->ask($this->output, $this->encloseAsQuestion($question, $default), $default);
    }

    /**
     * {@inheritDoc}
     */
    public function askConfirmation($question, $default = true)
    {
        return $this
            ->helperSet
            ->get('dialog')
            ->askConfirmation($this->output, $this->encloseAsQuestion($question, $default), $default);
    }

    /**
     * {@inheritDoc}
     */
    public function askAndValidate($question, $validator, $attempts = false, $default = null)
    {
        return $this
            ->helperSet
            ->get('dialog')
            ->askAndValidate($this->output, $this->encloseAsQuestion($question, $default), $validator, $attempts, $default);
    }

    /**
     * {@inheritDoc}
     */
    public function askWithMultipleAnswers($question)
    {
        $this->writeQuestion($question . ':');

        $values = array();

        while (true) {
            $answer = $this
                ->helperSet
                ->get('dialog')
                ->ask($this->output, '> ');
            if (is_null($answer)) {
                break;
            }
            $values[] = $answer;
        }

        return $values;
    }

    /**
     * {@inheritDoc}
     */
    public function askWithSuggestions($question, array $suggestions, $default = null)
    {
        return $this
            ->helperSet
            ->get('dialog')
            ->ask($this->output, $this->encloseAsQuestion($question, $default), $default, $suggestions);
    }

    /**
     * {@inheritDoc}
     * @todo add translation
     */
    public function askChoice($question, array $options, $allowEmptyChoice = true, $default = null)
    {
        $this->write($this->encloseAsQuestion($question, $default));

        $optionValues = array_values($options);

        foreach ($optionValues as $key => $optionQuestion) {
            $this->write('[' . ($key+1) . ']' . $optionQuestion);               //+1 because normal people prefers 1 over 0 as first option
        }

        $validator = function ($choosenValue) use ($optionValues, $allowEmptyChoice, $default) {
            $isValidValue = isset($optionValues[$choosenValue-1]);
            $isAllowedEmpty = is_null($choosenValue) && $allowEmptyChoice;

            if ($isValidValue) {
                return $choosenValue;
            } elseif ($isAllowedEmpty) {
                return $default;
            }

            throw new InputException('Invalid value (' . $choosenValue . ') provided.');
        };

        $message = 'Choose' . ($allowEmptyChoice ? ' (Hit enter for no choice)' : '');

        $answer = $this->askAndValidate($message, $validator, false, $default);

        if (!is_null($answer)) {
            $optionRealValues = array_keys($options);
            $answer = $optionRealValues[$answer-1];
        }

        return $answer;
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

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function hasArgument($name)
    {
        return $this->input->hasArgument($name);
    }

    /**
     * {@inheritDoc}
     */
    public function getOption($name)
    {
        return $this->input->getOption($name);
    }

    /**
     * {@inheritDoc}
     */
    public function setOption($name, $value)
    {
        $this->input->setOption($name, $value);

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function hasOption($name)
    {
        return $this->input->hasOption($name);
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
        $this->write($this->encloseAsComment($message), $numberOfNewLines);
    }

    /**
     * {@inheritDoc}
     */
    public function writeError($message, $numberOfNewLines = 1)
    {
        $this->write($this->encloseAsError($message), $numberOfNewLines);
    }

    /**
     * {@inheritDoc}
     */
    public function writeInfo($message, $numberOfNewLines = 1)
    {
        $this->write($this->encloseAsInfo($message), $numberOfNewLines);
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
        $this->write($this->encloseAsQuestion($question), $numberOfNewLines);
    }

    /**
     * Encloses provided string with question tags
     *
     * @param string $string - the string tagged as question
     * @param null|string $default - optional default choice
     * @return string
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-01
     */
    protected function encloseAsQuestion($string, $default = null)
    {
        $choiceInfo = is_null($default) ? '' : ' [' . $default . ']';

        return '<question' . $string . '</question>' . $choiceInfo . ': ';
    }

    /**
     * Encloses provided string with comment tags
     *
     * @param string $string - the string tagged as comment
     * @return string
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-01
     */
    protected function encloseAsComment($string)
    {
        return '<comment>' . $string . '</comment>';
    }

    /**
     * Encloses provided string with error tags
     *
     * @param string $string - the string tagged as error
     * @return string
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-01
     */
    protected function encloseAsError($string)
    {
        return '<error>' . $string . '</error>';
    }

    /**
     * Encloses provided string with info tags
     *
     * @param string $string - the string tagged as info
     * @return string
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-01
     */
    protected function encloseAsInfo($string)
    {
        return '<info>' . $string . '</info>';
    }
}