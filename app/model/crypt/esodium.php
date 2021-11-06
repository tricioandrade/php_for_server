<?php


namespace app\model\crypt;

use Exception;
use SodiumException;

class esodium
{
    /**
     * Get a secret key for encrypt/decrypt
     * @return string
     * @see encrypt(), decrypt()
     */
    public static function generateSecretKey(): string
    {
        return sodium_crypto_aead_aes256gcm_keygen();
    }

    public static function encrypt($message, $secret_key, $block_size = 1)
    {
        # create a nonce for this operation. it will be stored and recovered in the message itself
        $nonce = random_bytes(SODIUM_CRYPTO_SECRETBOX_NONCEBYTES);
        # pad to $block_size byte chunks (enforce 512 byte limit)
        $padded_message = sodium_pad($message, $block_size <= 512 ? $block_size : 512);
        # encrypt message and combine with nonce
        $cipher = base64_encode($nonce . sodium_crypto_secretbox($padded_message, $nonce, $secret_key));

        # cleanup
        try {
            sodium_memzero($message);
        }

        catch (SodiumException $e) {
            print_r($e->getMessage());
        }

        try {
            sodium_memzero($secret_key);
        }
        catch (SodiumException $e) {
            print_r($e->getMessage());
        }

        return $cipher;
    }
    public static function decrypt($encrypted, $secret_key, $block_size = 1)
    {
        # unpack base64 message
        $decoded = base64_decode($encrypted);
        # check for general failures

        if ($decoded === false) throw new Exception('The encoding failed');

        # check for incomplete message. CRYPTO_SECRETBOX_MACBYTES doesn't seem to exist in this version...

        if (!defined('CRYPTO_SECRETBOX_MACBYTES')) define('CRYPTO_SECRETBOX_MACBYTES', 16);

        if (mb_strlen($decoded, '8bit') < (SODIUM_CRYPTO_SECRETBOX_NONCEBYTES + CRYPTO_SECRETBOX_MACBYTES)) {
            throw new Exception('The message was truncated');
        }

        // pull nonce and ciphertext out of unpacked message
        $nonce = mb_substr($decoded, 0, SODIUM_CRYPTO_SECRETBOX_NONCEBYTES, '8bit');
        $ciphertext = mb_substr($decoded, SODIUM_CRYPTO_SECRETBOX_NONCEBYTES, null, '8bit');

        // decrypt it and account for extra padding from $block_size (enforce 512 byte limit)
        $decrypted_padded_message = sodium_crypto_secretbox_open($ciphertext, $nonce, $secret_key);
        $message = sodium_unpad($decrypted_padded_message, $block_size <= 512 ? $block_size : 512);

        // check for encrpytion failures
        if ($message === false) {
            throw new Exception('The message was tampered with in transit');
        }
        // cleanup
        sodium_memzero($ciphertext);
        sodium_memzero($secret_key);
        return $message;
    }

    public function base64StringEncode($data, $exclude = null) {
        $data = str_replace(array('+', '/'), array('-', '_'), base64_encode($data));
        if (!$exclude)
            $data = rtrim($data, '=');
        return $data;
    }

    public function base64StringDecode($data) {
        return base64_decode(str_replace(array('-', '_'), array('+', '/'), $data));
    }
}