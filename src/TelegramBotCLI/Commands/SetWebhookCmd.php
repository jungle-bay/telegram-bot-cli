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
use TelegramBotAPI\Types\InputFile;
use TelegramBotAPI\Exception\TelegramBotAPIRuntimeException;

/**
 * Class SetWebhookCmd
 * @package TelegramBotCLI\Commands
 * @author Roma Baranenko <jungle.romabb8@gmail.com>
 */
class SetWebhookCmd extends Command {

    /**
     * @return array
     */
    protected function getArgs() {
        return array(
            'token'           => array(
                'prefix'      => 't',
                'longPrefix'  => 'token',
                'description' => 'Your token for bot.',
                'required'    => true
            ),
            'url'             => array(
                'prefix'      => 'u',
                'longPrefix'  => 'url',
                'description' => 'Your url for bot.',
                'required'    => true
            ),
            'certificate'     => array(
                'prefix'      => 'c',
                'longPrefix'  => 'certificate',
                'description' => 'Path to file.'
            ),
            'max-connections' => array(
                'prefix'       => 'mc',
                'longPrefix'   => 'max-connections',
                'description'  => 'Max connections 1-100.',
                'defaultValue' => 40
            ),
            'allowed-updates' => array(
                'prefix'      => 'au',
                'longPrefix'  => 'allowed-updates',
                'description' => 'Allowed Updates, this string array separator \',\'.'
            )
        );
    }


    /**
     * {@inheritdoc}
     */
    public function result() {

        $climate = $this->getClimate();

        $parameters = array(
            'url' => $climate->arguments->get('url')
        );

        if (true === $climate->arguments->defined('certificate')) {

            $certificate = $climate->arguments->get('certificate');

            $inputFile = new InputFile($certificate, mime_content_type($certificate));

            $parameters['certificate'] = $inputFile;
        }

        if (true === $climate->arguments->defined('max-connections')) {
            $parameters['max_connections'] = $climate->arguments->get('max-connections');
        }

        if (true === $climate->arguments->defined('allowed-updates')) {
            $parameters['allowed_updates'] = explode(',', $climate->arguments->get('allowed-updates'));
        }

        try {

            $token = $climate->arguments->get('token');

            $tba = new TelegramBotAPI($token);

            $isSet = $tba->setWebhook($parameters);

            $message = 'Set webhook <bold>%s</bold>';

            $message = sprintf($message, $isSet ? '<blue>successfully</blue>' : '<red>unsuccessfully</red>');

            $climate->yellow($message);

        } catch (TelegramBotAPIRuntimeException $exception) {
            $this->printException($exception);
        }
    }


    /**
     * @return string
     */
    public static function getDescription() {
        return 'Use this method to specify a url and receive incoming updates via an outgoing webhook.';
    }
}
