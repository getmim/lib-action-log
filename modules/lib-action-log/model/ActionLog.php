<?php
/**
 * ActionLog
 * @package lib-action-log
 * @version 0.0.1
 */

namespace LibActionLog\Model;

class ActionLog extends \Mim\Model
{

    protected static $table = 'action_log';

    protected static $chains = [];

    protected static $q = [];
}