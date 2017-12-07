<?php
/**
 * Created by PhpStorm.
 * Team: jungle
 * User: Roma Baranenko
 * Contacts: <jungle.romabb8@gmail.com>
 * Date: 07.12.17
 * Time: 1:06
 */

namespace TelegramBotCLI\Tests;


use PHPUnit\Framework\TestCase;
use TelegramBotCLI\TelegramBotCLI;

/**
 * Class TelegramBotCLITest
 * @package TelegramBotCLI\Tests
 * @author Roma Baranenko <jungle.romabb8@gmail.com>
 */
class TelegramBotCLITest extends TestCase {

    /**
     * @return array
     */
    public function dataProvider() {

        global $argv;

        unset($argv);

        $argv[0] = __DIR__ . '/../../../bin/telegram-bot-cli';
        $argv[2] = '-t';
        $argv[3] = '479218867:AAGjGTwl0F-prMPIC6-AkNuLD1Bb2tRsYbc';

        $tbc = new TelegramBotCLI();

        return array(
            array(
                $argv,
                $tbc
            )
        );
    }


    /**
     * @param array $argv
     * @param TelegramBotCLI $tbc
     * @dataProvider dataProvider
     */
    public function testSetWebhook(array $argv, TelegramBotCLI $tbc) {

        $argv[1] = 'setWebhook';

        $argv[4] = '-u';
        $argv[5] = 'https://example.com/bot';

        $tbc->run($argv);
    }

    /**
     * @param array $argv
     * @param TelegramBotCLI $tbc
     * @dataProvider dataProvider
     */
    public function testGetWebhookInfo(array $argv, TelegramBotCLI $tbc) {

        $argv[1] = 'getWebhookInfo';

        $tbc->run($argv);
    }

    /**
     * @param array $argv
     * @param TelegramBotCLI $tbc
     * @dataProvider dataProvider
     */
    public function testDeleteWebhook(array $argv, TelegramBotCLI $tbc) {

        $argv[1] = 'deleteWebhook';

        $tbc->run($argv);
    }

    /**
     * @param array $argv
     * @param TelegramBotCLI $tbc
     * @dataProvider dataProvider
     */
    public function testGetUpdates(array $argv, TelegramBotCLI $tbc) {

        $argv[1] = 'getUpdates -n';

        $tbc->run($argv);
    }
}
