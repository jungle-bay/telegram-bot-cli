<?php
/**
 * Created by PhpStorm.
 * Team: jungle
 * User: Roma Baranenko
 * Contacts: <jungle.romabb8@gmail.com>
 * Date: 06.12.17
 * Time: 14:37
 */

namespace TelegramBotCLI\Commands;


use Exception;
use League\CLImate\CLImate;
use League\CLImate\TerminalObject\Basic\BasicTerminalObject;

/**
 * Class Command
 * @package TelegramBotCLI\Commands
 * @author Roma Baranenko <jungle.romabb8@gmail.com>
 * @method getDescription - Implement for about command return string. (static)
 */
abstract class Command extends BasicTerminalObject {

    /**
     * @var CLImate $climate
     */
    private $climate;


    /**
     * @return array
     */
    abstract protected function getArgs();


    /**
     * @return CLImate
     */
    public function getClimate() {
        return $this->climate;
    }

    /**
     * @param Exception $exception
     */
    public function printException(Exception $exception) {
        $this->climate->error($exception->getMessage());
    }

    /**
     * Command constructor.
     * @param CLImate $climate
     */
    public function __construct(CLImate $climate) {

        $this->climate = $climate;

        try {

            $climate->arguments->add($this->getArgs());

            $climate->arguments->parse();

        } catch (Exception $exception) {
            $this->printException($exception);
        }
    }
}
