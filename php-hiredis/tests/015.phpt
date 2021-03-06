--TEST--
phpiredis reader resetting
--SKIPIF--
<?php include 'skipif.inc'; ?>
--FILE--
<?php
$type = -1;
$reader = phpiredis_reader_create();
phpiredis_reader_feed($reader, "+OK\r\n");
var_dump(phpiredis_reader_get_reply($reader, $type) == 'OK');
var_dump($type == PHPIREDIS_REPLY_STATUS);
$reader = phpiredis_reader_create();
phpiredis_reader_feed($reader, "-ERR\r\n");
var_dump(phpiredis_reader_get_reply($reader, $type) == 'ERR');
var_dump($type == PHPIREDIS_REPLY_ERROR);
?>
--EXPECTF--
bool(true)
bool(true)
bool(true)
bool(true)
