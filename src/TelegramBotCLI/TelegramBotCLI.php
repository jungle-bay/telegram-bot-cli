<?php
/**
 * Created by PhpStorm.
 * Team: jungle
 * User: Roma Baranenko
 * Contacts: <jungle.romabb8@gmail.com>
 * Date: 06.12.17
 * Time: 12:27
 */

namespace TelegramBotCLI;


use Exception;
use League\CLImate\CLImate;
use TelegramBotCLI\Commands\GetUpdatesCmd;
use TelegramBotCLI\Commands\SetWebhookCmd;
use TelegramBotCLI\Commands\DeleteWebhookCmd;
use TelegramBotCLI\Commands\GetWebhookInfoCmd;

/**
 * Class TelegramBotCLI
 * @package TelegramBotCLI
 * @author Roma Baranenko <jungle.romabb8@gmail.com>
 */
class TelegramBotCLI {

    /**
     * @var array $commands
     */
    private $commands = array(
        'getUpdates'     => GetUpdatesCmd::class,
        'setWebhook'     => SetWebhookCmd::class,
        'deleteWebhook'  => DeleteWebhookCmd::class,
        'getWebhookInfo' => GetWebhookInfoCmd::class
    );

    /**
     * @var CLImate $climate
     */
    private $climate;


    /**
     * @param bool $printUse
     */
    private function printDefaultMessage($printUse = false) {

        $this->climate->info('Telegram Bot Command Line Interface');

        if (false === $printUse) {

            $this->climate->br()->info('Usage:');
            $this->climate->out('   command [arguments]');

        } else {

            $this->climate->br()->usage();
        }

        $this->climate->br()->info('Available commands:');

        $padding = $this->climate->padding(21, ' ');

        foreach ($this->commands as $key => $command) {

            if (false === method_exists($command, 'getDescription')) continue;

            $padding->label(" <yellow>{$key}</yellow>")->result($command::getDescription());
        }

        exit(1);
    }


    /**
     * @param array $args
     * @return string
     * @throws Exception
     */
    private function getCmd($args) {

        if (false === empty($cmd = $args[1])) return lcfirst($cmd);

        throw new Exception('Not command.');
    }


    /**
     * @param array $args
     */
    public function run(array $args) {

        try {

            $cmd = $this->getCmd($args);

            try {

                $this->climate->{$cmd}($this->climate);

            } catch (Exception $exception) {
                $this->printDefaultMessage(true);
            }

        } catch (Exception $exception) {
            $this->printDefaultMessage(false);
        }
    }

    /**
     * TelegramBotCLI constructor.
     */
    public function __construct() {

        $this->climate = new CLImate();

        $this->climate->extend($this->commands);
    }
}
