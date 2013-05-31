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
    public function ask($question, $default = null);

    public function askConfirmation($question, $default = true);

    public function askAndValidate($question, $validator, $attempts = false, $default = null);

    public function writeComment($message, $numberOfNewLines = 1);

    public function writeInfo($message, $numberOfNewLines = 1);

    public function writeError($message, $numberOfNewLines = 1);
}