<?php
/**
 * Created by PhpStorm.
 * Team: jungle
 * User: Roma Baranenko
 * Contacts: <jungle.romabb8@gmail.com>
 * Date: 05.12.17
 * Time: 15:06
 */

if (!ini_get('date.timezone')) date_default_timezone_set('UTC');

require_once(__DIR__ . '/../vendor/autoload.php');

$tbc = new \TelegramBotCLI\TelegramBotCLI();

$tbc->run($argv);
