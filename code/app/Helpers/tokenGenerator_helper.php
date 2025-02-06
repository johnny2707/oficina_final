<?php 

/**
 * Generates a cryptographically secure token
 * 
 * @param bool $includeUppercase Include uppercase letters
 * @param bool $includeLowercase Include lowercase letters
 * @param bool $includeNumbers Include numbers
 * @param bool $includeSpecial Include special characters
 * @param string $prefix Token prefix
 * @param string $suffix Token suffix
 * @return string Generated token
 * @throws Exception If no character types are selected or invalid length
 * 
 */

function generateToken(
    string $tokenType = '',
    int $length = 32,
    bool $includeUppercase = true,
    bool $includeLowercase = true,
    bool $includeNumbers = true,
    bool $includeSpecial = false,
): string {

    $uppercaseChars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $lowercaseChars = 'abcdefghijklmnopqrstuvwxyz';
    $numbers = '0123456789';
    $specialChars = '!@#$%^&*()_+-=[]{}|;:,.<>?';
   
    if ($length < 1) {
        throw new Exception('Token length must be at least 1');
    }

    $charPool = '';
    $token = '';

    // Build character pool and ensure at least one of each type
    if ($includeUppercase) {
        $charPool .= $uppercaseChars;
        $token .= getRandomChar($uppercaseChars);
    }
    if ($includeLowercase) {
        $charPool .= $lowercaseChars;
        $token .= getRandomChar($lowercaseChars);
    }
    if ($includeNumbers) {
        $charPool .= $numbers;
        $token .= getRandomChar($numbers);
    }
    if ($includeSpecial) {
        $charPool .= $specialChars;
        $token .= getRandomChar($specialChars);
    }

    if (empty($charPool)) {
        throw new Exception('At least one character type must be included');
    }

    // Fill remaining length with random characters
    $remainingLength = $length - strlen($token);
    for ($i = 0; $i < $remainingLength; $i++) {
        $token .= getRandomChar($charPool);
    }

    // Shuffle the token to avoid predictable character positions
    $token = str_shuffle($token);

    return $tokenType . $token;
}

/**
 * Gets a random character from a string
 * 
 * @param string $str Source string
 * @return string Random character
 *
 */

function getRandomChar(string $str): string {
    $length = strlen($str);
    return $str[random_int(0, $length - 1)];
}

/**
 * Verifies if a token timestamp is valid
 * 
 * @param string $token Time-based token
 * @param int $maxAge Maximum age in seconds
 * @return bool Whether token is valid
 * 
 */

function verifyTimeBasedToken(string $tokenExpireDate, string $maxAge = "604800"): bool {
    return (time() - $tokenExpireDate) <= $maxAge;
}

?>