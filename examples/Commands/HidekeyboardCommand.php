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
<<<<<<< HEAD
=======
use Longman\TelegramBot\Entities\ReplyKeyboardHide;
use Longman\TelegramBot\Entities\ReplyKeyboardMarkup;
>>>>>>> b1661047c183280846012566f20c5060f3920f32
use Longman\TelegramBot\Request;

/**
 * User "/hidekeyboard" command
 */
class HidekeyboardCommand extends UserCommand
{
    /**#@+
     * {@inheritdoc}
     */
    protected $name = 'hidekeyboard';
    protected $description = 'Hide the custom keyboard';
    protected $usage = '/hidekeyboard';
    protected $version = '0.0.6';
    /**#@-*/

    /**
     * {@inheritdoc}
     */
    public function execute()
    {
        $message = $this->getMessage();
        $chat_id = $message->getChat()->getId();

<<<<<<< HEAD
        $data = array();
        $data['chat_id'] = $chat_id;
        $data['text'] = 'Keyboard Hided';
        $data['reply_markup'] = new ReplyKeyboardHide(array('selective' => false));
=======
        $data = [
            'chat_id'      => $chat_id,
            'text'         => 'Keyboard Hidden',
            'reply_markup' => new ReplyKeyboardHide(['selective' => false]),
        ];
>>>>>>> b1661047c183280846012566f20c5060f3920f32

        return Request::sendMessage($data);
    }
}
