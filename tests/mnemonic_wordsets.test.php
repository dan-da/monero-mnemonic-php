<?php

namespace tester;

require_once __DIR__  . '/tests_common.php';

class mnemonic_wordsets extends tests_common {
    
    static $map = [
        'english' =>    ['seed'     => '202c3b67726c8611ddd2ac22314b32852e94a1d37750898480bee8d2158bb772',
                         'mnemonic' => 'gained huddle software lively reef sieve seismic somewhere vessel different intended village pelican oars inquest language luggage agreed tufts either arrow befit aplomb long intended'],
    ];
    
    public function runtests() {
        $this->test_all_wordsets();
    }
    
    protected function test_all_wordsets() {
        
        // obtain wordset list
        $output = $this->exec_args(['wordsets'], 0, 'list wordsets');
        $wordsets = explode("\n", trim($output));

        foreach($wordsets as $ws) {
            // generate mnemonic from seed for this wordset
            $params = [ self::$map['english']['seed'],
                        $ws
            ];
            $result1 = $this->exec_args( $params, 0, "encode seed to mnemonic ($ws)" );
            $result2 = $this->exec_args( explode(' ', trim($result1)), 0, "decode mnemonic to seed ($ws)" );
            
            $this->eq(trim($result2), self::$map['english']['seed'], "verify decode(encode(seed)) == seed for $ws");
        }
    }
    
}
