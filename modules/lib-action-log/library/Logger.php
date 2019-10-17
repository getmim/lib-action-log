<?php
/**
 * Logger
 * @package lib-action-log
 * @version 0.0.1
 */

namespace LibActionLog\Library;

use LibActionLog\Model\ActionLog as ALog;

class Logger
{

    private static $_error;

    static function lastError(): ?string{
        return self::$_error;
    }

    static function create(array $data): bool {
        $req_fields = ['user','object','method','type','original','changes'];
        foreach($req_fields as $field){
            if(!array_key_exists($field, $data))
                return !(self::$_error = 'Field `' . $field . '` is required');
        }

        $req_objects = ['original', 'changes'];
        foreach($req_objects as $field){
            if(is_null($data[$field]))
                continue;
            if(!is_object($data[$field]))
                return !(self::$_error = 'Field `' . $field . '` expecting an object');
        }

        if(!in_array($data['method'], [1,2,3]))
            return !(self::$_error = 'Field `method` value is out of range');

        $row = [
            'user'      => $data['user'],
            'object'    => $data['object'],
            'parent'    => $data['parent'] ?? null,
            'method'    => $data['method'],
            'type'      => $data['type'],
            'original'  => $data['original'],
            'changes'   => $data['changes']
        ];

        if(is_object($data['original']) && is_object($data['changes'])){
            $changes = (object)[];
            $new_original = (object)[];

            foreach($data['original'] as $key => $value){
                if(in_array($key, ['id','updated','created']))
                    continue;

                if(!property_exists($data['changes'], $key))
                    continue;
                
                if($data['changes']->$key != $value){
                    $changes->$key = $data['changes']->$key;
                    $new_original->$key = $value;
                }
            }
            $row['changes']  = $changes;
            $row['original'] = $new_original;
        }

        foreach($req_objects as $field){
            if(!is_null($row[$field]))
                $row[$field] = json_encode($row[$field]);
        }

        if(!ALog::create($row))
            return !(self::$_error = ALog::lastError());
        return true;
    }
}