<?php
/**
 * Created by PhpStorm.
 * Team: jungle
 * User: Roma Baranenko
 * Contacts: <jungle.romabb8@gmail.com>
 * Date: 06.12.17
 * Time: 12:46
 */

namespace TelegramBotCLI\Commands;


use TelegramBotAPI\TelegramBotAPI;
use TelegramBotAPI\Exception\TelegramBotAPIRuntimeException;

/**
 * Class DeleteWebhookCmd
 * @package TelegramBotCLI\Commands
 * @author Roma Baranenko <jungle.romabb8@gmail.com>
 */
class DeleteWebhookCmd extends Command {

    /**
     * @return array
     */
    protected function getArgs() {
        return array(
            'token' => array(
                'prefix'      => 't',
                'longPrefix'  => 'token',
                'description' => 'Your token for bot.',
                'required'    => true
            )
        );
    }


    /**
     * {@inheritdoc}
     */
    public function result() {

        $climate = $this->getClimate();

        try {

            $token = $climate->arguments->get('token');

            $tba = new TelegramBotAPI($token);

            $isDelete = $tba->deleteWebhook();

            $message = 'Webhook delete <bold>%s</bold>';

            $message = sprintf($message, $isDelete ? '<blue>successfully</blue>' : '<red>unsuccessfully</red>');

            $climate->yellow($message);

        } catch (TelegramBotAPIRuntimeException $exception) {
            $this->printException($exception);
        }
    }


    /**
     * @return string
     */
    public static function getDescription() {
        return 'Use this method to remove webhook integration if you decide to switch back to getUpdates.';
    }
}
