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


use League\CLImate\CLImate;
use TelegramBotAPI\Types\Update;
use TelegramBotAPI\TelegramBotAPI;
use TelegramBotAPI\Exception\TelegramBotAPIException;
use TelegramBotAPI\Exception\TelegramBotAPIRuntimeException;

/**
 * Class GetUpdatesCmd
 * @package TelegramBotCLI\Commands
 * @author Roma Baranenko <jungle.romabb8@gmail.com>
 */
class GetUpdatesCmd extends Command {

    /**
     * @param CLImate $climate
     * @param TelegramBotAPI $tba
     * @throws TelegramBotAPIException
     * @throws TelegramBotAPIRuntimeException
     */
    private function deleteWebHook(CLImate $climate, TelegramBotAPI $tba) {

        $delete = $climate->confirm('Delete current webhook if they set ?');

        if ($delete->confirmed()) {

            $tba->deleteWebhook();

            $climate->red('Webhook was removed.');

        } else {

            $msg = 'You will not be able to receive updates using getUpdates for as long as an outgoing webhook is set up.';

            $climate->bold()->red()->flank($msg, '!', 5);
        }
    }

    /**
     * @param string $host
     * @param string|integer $port
     * @param string $url
     * @param Update $update
     * @throws TelegramBotAPIException
     */
    private function sendUpdate($host, $port, $url, $update) {

        $ch = curl_init("{$host}:{$port}{$url}");
        $content = json_encode($update);

        curl_setopt_array($ch, array(
            CURLOPT_HEADER         => false,
            CURLOPT_POST           => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CONNECTTIMEOUT => 5,
            CURLOPT_TIMEOUT        => 60,
            CURLOPT_HTTPHEADER     => array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($content)
            ),
            CURLOPT_POSTFIELDS     => $content
        ));

        curl_exec($ch);
        $codeError = curl_errno($ch);

        if (0 !== $codeError) throw new TelegramBotAPIRuntimeException(curl_error($ch), $codeError);

        curl_close($ch);
    }


    /**
     * @return array
     */
    protected function getArgs() {
        return array(
            'host'            => array(
                'prefix'       => 'h',
                'longPrefix'   => 'host',
                'description'  => 'Your host.',
                'defaultValue' => '127.0.0.1'
            ),
            'port'            => array(
                'prefix'       => 'p',
                'longPrefix'   => 'port',
                'description'  => 'Your port.',
                'defaultValue' => 8080
            ),
            'url'             => array(
                'prefix'      => 'u',
                'longPrefix'  => 'url',
                'description' => 'Your url for bot.',
                'required'    => true
            ),
            'token'           => array(
                'prefix'      => 't',
                'longPrefix'  => 'token',
                'description' => 'Your token for bot.',
                'required'    => true
            ),
            'offset'          => array(
                'prefix'      => 'o',
                'longPrefix'  => 'offset',
                'description' => 'Offset update.'
            ),
            'limit'           => array(
                'prefix'       => 'l',
                'longPrefix'   => 'limit',
                'description'  => 'Limit update message 1-100.',
                'defaultValue' => 100
            ),
            'timeout'         => array(
                'prefix'       => 'to',
                'longPrefix'   => 'timeout',
                'description'  => 'Timeout updates.',
                'defaultValue' => 0
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

        try {

            $token = $climate->arguments->get('token');

            $tba = new TelegramBotAPI($token);

            $parameters = array();

            if (true === $climate->arguments->defined('offset')) {
                $parameters['offset'] = $climate->arguments->get('offset');
            }

            if (true === $climate->arguments->defined('limit')) {
                $parameters['limit'] = $climate->arguments->get('limit');
            }

            if (true === $climate->arguments->defined('timeout')) {
                $parameters['timeout'] = $climate->arguments->get('timeout');
            }

            if (true === $climate->arguments->defined('allowed-updates')) {
                $parameters['allowed_updates'] = explode(',', $climate->arguments->get('allowed-updates'));
            }

            $host = $climate->arguments->get('host');
            $port = $climate->arguments->get('port');
            $url = $climate->arguments->get('url');

            $this->deleteWebHook($climate, $tba);

            while (true) {

                $updates = $tba->getUpdates($parameters);

                foreach ($updates as $update) $this->sendUpdate($host, $port, $url, $update);

                if (count($updates) >= 1) {

                    $update = array_pop($updates);

                    $parameters['offset'] = ($update->getUpdateId() + 1);

                    unset($update);
                }

                unset($updates);

                $climate->out('Get update : <yellow>' . date('H:i:s') . '</yellow>');
            }

        } catch (TelegramBotAPIRuntimeException $exception) {
            $this->printException($exception);
        }
    }


    /**
     * @return string
     */
    public static function getDescription() {
        return 'Get array updates and send one update to local server. <yellow>Simulate webhook for localhost.</yellow>';
    }
}
