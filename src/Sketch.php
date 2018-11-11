<?php
namespace Nubs\RandomNameGenerator;

use Cinam\Randomizer\Randomizer;

/**
 * Defines an Sketch name generator.
 * Based on, and lists come from - https://github.com/defaultnamehere/verylegit.link
 */
class Sketch extends AbstractGenerator implements Generator
{
    /** @type array The definition of the potential scary words. */
    protected $_scary_words;

    /** @type array The definition of the potential file types. */
    protected $_file_types;

    /** @type array The definition of the potential wired strings. */
    protected $_weird_strings;

    /** @type array The definition of the potential domains. */
    protected $_domains;

    /** @type Cinam\Randomizer\Randomizer The random number generator. */
    protected $_randomizer;

    /**
     * Initializes the Alliteration Generator with the default word lists.
     *
     * @api
     * @param \Cinam\Randomizer\Randomizer $randomizer The random number generator.
     */
    public function __construct(Randomizer $randomizer = null)
    {
        $this->_randomizer = $randomizer;
        $this->_scary_words = file(__DIR__ . '/scary_words.txt', FILE_IGNORE_NEW_LINES);
        $this->_file_types = file(__DIR__ . '/file_types.txt', FILE_IGNORE_NEW_LINES);
        $this->_weird_strings = file(__DIR__ . '/weird_strings.txt', FILE_IGNORE_NEW_LINES);
        $this->_domains = file(__DIR__ . '/domains.txt', FILE_IGNORE_NEW_LINES);
    }

    /**
     * Gets a randomly generated alliterative name.
     *
     * @api
     * @return string A random alliterative name.
     */
    public function getName($len = 1)
    {
        $domain = $this->_getRandomWord($this->_domains);
        $string = $this->_getRandomWord($this->_weird_strings);
        $filename = $this->_getRandomWord($this->_scary_words);
        $filetype = $this->_getRandomWord($this->_file_types);
        $queryKey = $this->_getRandomWord($this->_scary_words);
        $queryValue = $this->_getRandomWord($this->_scary_words);

        return ucwords("{$domain}2F{$filename}.{$filetype}3F{$queryKey}={$queryValue}");
    }

    /**
     * Get a random word from the list of words, optionally filtering by starting letter.
     *
     * @param array $words An array of words to choose from.
     * @param string $startingLetter The desired starting letter of the word.
     * @return string The random word.
     */
    protected function _getRandomWord(array $words, $startingLetter = null)
    {
        $wordsToSearch = $startingLetter === null ? $words : preg_grep("/^{$startingLetter}/", $words);
        return $this->_randomizer ? $this->_randomizer->getArrayValue($wordsToSearch) : $wordsToSearch[array_rand($wordsToSearch)];
    }
}
