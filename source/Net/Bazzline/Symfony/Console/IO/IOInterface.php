<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-05-31
 */

namespace Net\Bazzline\Symfony\Console\IO;

/**
 * Class IOInterface
 *
 * @package Net\Bazzline\Symfony\Console\IO
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-05-31
 */
interface IOInterface
{
    /**
     * Ask a question to the user and return the answer
     *
     * @param string $question - the question to ask
     * @param null $default - default answer if no is given
     * @return string - the answer
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-01
     */
    public function ask($question, $default = null);

    /**
     * Ask a question to the user, validate and return the answer
     *
     * @param string $question - the question to ask
     * @param callback $validator - PHP calback function
     * @param bool $attempts - maximum number of times to ask
     * @param null $default - default answer if no is given
     * @return string - the answer
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-01
     */
    public function askAndValidate($question, $validator, $attempts = false, $default = null);

    /**
     * Confirm a action from the user
     *
     * @param string $question - the question to ask
     * @param bool $default - default answer if no is given
     * @return string - the answer
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-01
     */
    public function askConfirmation($question, $default = true);

    /**
     * Ask a question to the user and accept multiple answers
     *
     * @param string $question - the question
     * @return array - the answers
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-01
     */
    public function askWithMultipleAnswers($question);

    /**
     * Ask a question to the user with giving suggestions
     *
     * @param string $question - the question to ask
     * @param array $suggestions - multiple suggestions
     * @param null $default - default answer if no is given
     * @return string - the answer
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-01
     */
    public function askWithSuggestions($question, array $suggestions, $default = null);

    /**
     * Ask the user to choice between options
     *
     * @param string $question - the question to ask
     * @param array $options - the answer options
     * @param bool $allowEmptyChoice - is empty choice allowed
     * @param null $default - default answer if no is given
     * @return string
     * @author stev leibelt <artodeto@arcor.de>
     * @throws InputException
     * @since 2013-06-01
     */
    public function askChoice($question, array $options, $allowEmptyChoice = true, $default = null);

    /**
     * Retrieves an argument by the name
     *
     * @param string $name - the name of the argument
     * @return mixed - the return value
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-01
     */
    public function getArgument($name);

    /**
     * Sets a argument with a given value
     *
     * @param string $name - the name of the argument
     * @param mixed $value - the value
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-01
     */
    public function setArgument($name, $value);

    /**
     * Write a message
     *
     * @param string $message - the message to write
     * @param int $numberOfNewLines - number of new lines to write
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-01
     */
    public function write($message, $numberOfNewLines = 1);

    /**
     * Write a comment message
     *
     * @param string $message - the message to write
     * @param int $numberOfNewLines - number of new lines to write
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-01
     */
    public function writeComment($message, $numberOfNewLines = 1);

    /**
     * Write an error message
     *
     * @param string $message - the message to write
     * @param int $numberOfNewLines - number of new lines to write
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-01
     */
    public function writeError($message, $numberOfNewLines = 1);

    /**
     * Write a info message
     *
     * @param string $message - the message to write
     * @param int $numberOfNewLines - number of new lines to write
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-01
     */
    public function writeInfo($message, $numberOfNewLines = 1);

    /**
     * Write a new line
     *
     * @param int $numberOfNewLines - number of new lines to write
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-01
     */
    public function writeNewLine($numberOfNewLines = 1);

    /**
     * Write a question
     *
     * @param string $question the question to write
     * @param int $numberOfNewLines - number of new lines to write
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-01
     */
    public function writeQuestion($question, $numberOfNewLines = 1);
}