<?php
/**
 * This file is part of the TelegramBot package.
 *
 * (c) Avtandil Kikabidze aka LONGMAN <akalongman@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Longman\TelegramBot\Commands\UserCommands;

use Longman\TelegramBot\Commands\UserCommand;
use Longman\TelegramBot\Request;
use Longman\TelegramBot\Entities\ReplyKeyboardMarkup;

/**
 * User "/keyboard" command
 */
class KeyboardCommand extends UserCommand
{
    /**#@+
     * {@inheritdoc}
     */
    protected $name = 'keyboard';
    protected $description = 'Show a custom keybord with reply markup';
    protected $usage = '/keyboard';
    protected $version = '0.0.6';
    /**#@-*/

    /**
     * {@inheritdoc}
     */
    public function execute()
    {
        $message = $this->getMessage();
        $chat_id = $message->getChat()->getId();
        $text = $message->getText(true);

        $data = array();
        $data['chat_id'] = $chat_id;
        $data['text'] = 'Press a Button:';

        //Keyboard examples
        $keyboards = array();

        //0

        $keyboard[] = array('7','8','9');
        $keyboard[] = array('4','5','6');
        $keyboard[] = array('1','2','3');
        $keyboard[] = array(' ','0',' ');
       

        $keyboards[] = $keyboard;
        unset($keyboard);

        //1
        $keyboard[] = array('7','8','9','+');
        $keyboard[] = array('4','5','6','-');
        $keyboard[] = array('1','2','3','*');
        $keyboard[] = array(' ','0',' ','/');

        $keyboards[] = $keyboard;
        unset($keyboard);

        //2
        $keyboard[] = array('A');
        $keyboard[] = array('B');
        $keyboard[] = array('C');

        $keyboards[] = $keyboard;
        unset($keyboard);

        //3
        $keyboard[] = array('A');
        $keyboard[] = array('B');
        $keyboard[] = array('C','D');

        $keyboards[] = $keyboard;
        unset($keyboard);

        //4  (bots 2.0)
        $keyboard[] = array(
            array(
                'text' => 'request_contact',
                'request_contact' => true
            ),
            array(
                'text' => 'request_location',
                'request_location' => true
            )
        );

        $keyboards[] = $keyboard;
        unset($keyboard);

        $data['reply_markup'] = new ReplyKeyboardMarkup(
            array(
                'keyboard' => $keyboards[1],
                'resize_keyboard' => true,
                'one_time_keyboard' => false,
                'selective' => false
            )
        );

        return Request::sendMessage($data);
    }
}
