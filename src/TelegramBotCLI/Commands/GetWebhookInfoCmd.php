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
 * Class GetWebhookInfoCmd
 * @package TelegramBotCLI\Commands
 * @author Roma Baranenko <jungle.romabb8@gmail.com>
 */
class GetWebhookInfoCmd extends Command {

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

        $climate->info('Get webhook info')->br();

        try {

            $token = $climate->arguments->get('token');

            $tba = new TelegramBotAPI($token);

            $webhookInfo = $tba->getWebhookInfo();

            $padding = $climate->padding(55, ' ');

            $padding->label('<yellow>URL</yellow>')->result(var_export($webhookInfo->getUrl()));
            $padding->label('<yellow>Has custom certificate</yellow>')->result(var_export($webhookInfo->getHasCustomCertificate()));
            $padding->label('<yellow>Pending update count</yellow>')->result(var_export($webhookInfo->getPendingUpdateCount()));

            if (null !== $webhookInfo->getLastErrorDate()) {
                $padding->label('<yellow>Last error date</yellow>')->result(var_export($webhookInfo->getLastErrorDate()));
            }

            if (null !== $webhookInfo->getLastErrorMessage()) {
                $padding->label('<yellow>Last error message</yellow>')->result(var_export($webhookInfo->getLastErrorMessage()));
            }

            if (null !== $webhookInfo->getMaxConnections()) {
                $padding->label('<yellow>Max connections</yellow>')->result(var_export($webhookInfo->getMaxConnections()));
            }

            if (null !== $webhookInfo->getAllowedUpdates()) {
                $padding->label('<yellow>Allowed updates</yellow>')->result(var_export(implode(' , ', $webhookInfo->getAllowedUpdates())));
            }

        } catch (TelegramBotAPIRuntimeException $exception) {
            $this->printException($exception);
        }
    }


    /**
     * @return string
     */
    public static function getDescription() {
        return 'Use this method to get current webhook status.';
    }
}
