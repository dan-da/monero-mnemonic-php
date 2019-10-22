<?php

namespace tester;

require_once __DIR__  . '/../vendor/autoload.php';

use tester;

abstract class tests_common extends tester\test_base {
    protected $last_cmd = null;
    
    protected function exec_args($params, $expect_rc=0, $label) {
        $args = $this->gen_args($params);
        return $this->exec($args, $expect_rc, $label);
    }

    protected function gen_args($params) {
        $args = [];
        foreach( $params as $k => $v ) {
            $args[] = escapeshellarg($v);
        }
        $argbuf = implode(' ', $args);
        return $argbuf;
    }
    
    protected function exec_cmd($cmd, $expect_rc=0, $label) {
        $this->last_cmd = $cmd;
        exec($cmd, $output, $rc);
        
        if( $rc != $expect_rc) {
            $this->eq($rc, $expect_rc, $label . ' : unexpected command exit code.');
        }
        
        return trim(implode("\n", $output));
    }

    protected function exec($args, $expect_rc=0, $label) {
        $path = realpath(__DIR__ . '/../src/mnemonic.php');
        $cmd = sprintf('php %s %s', escapeshellarg($path), $args);
//        echo $cmd . "\n";
        return $this->exec_cmd($cmd, $expect_rc, $label);
    }
    
    protected function add_failnotes() {
        $cmd_note = "--- command was: ---\n  {$this->last_cmd}\n---";
        return [$cmd_note];
    }    
    
    
}
